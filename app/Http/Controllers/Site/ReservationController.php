<?php

namespace App\Http\Controllers\Site;

use App\Course;
use App\PaymentType;
use App\Reservation;
use App\Verification;
use App\User;
use App\Role;

use App\Http\Requests\SiteReservationRequest;

use App\Notifications\NewPassword;
use App\Notifications\VerificationCode;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function store(Request $request, $id)
    {
        $course = Course::findorfail($id);


        if($user = Auth::user()){

            $validator = Validator::make($request->all(), [
                'payment_type_id' => 'required|numeric',
                'comment' => 'nullable|string',
            ]);
            $validator->validate();

            $payment_type = PaymentType::findorfail($request->payment_type_id);

            $reservation = new Reservation();
            $reservation->cost=$course->cost;
            $reservation->course()->associate($course);
            $reservation->user()->associate($user);
            $reservation->payment_type()->associate($payment_type);
            $reservation->is_verification = true;
            $reservation ->save();

            return response()->json($reservation, 200);
        }
        else{

            $validator = Validator::make($request->all(), [

                'first_name' => 'required|string|min:2|max:255',
                'last_name' => 'required|string|min:2|max:255',
                'middle_name' => 'nullable|string|min:2|max:255',
                'email' => 'string|max:255|email',
                'phone' => 'required|regex:/(7)[0-9]{10}/',
                'payment_type_id' => 'required|numeric',
                'comment' => 'nullable|string',
            ]);
            $validator->validate();

            //Проверяем является ли гость пользователем
            $user = User::where('phone', $request->phone)->first();

            if($user) {

                $payment_type = PaymentType::findorfail($request->payment_type_id);

                $reservation = new Reservation();
                $reservation->cost=$course->cost;
                $reservation->course()->associate($course);
                $reservation->user()->associate($user);
                $reservation->payment_type()->associate($payment_type);
                $reservation ->save();

                //Создаем верификацию
                $verification = new Verification('reservation');
                $verification->user()->associate($user);
                $verification->date_send = Carbon::now();
                $verification->save();

                $reservation->verification()->associate($verification);
                $reservation ->save();

                //Отправляем верификацию
                $user->notify(new VerificationCode($verification));
                //Отправить уведомление о новой заявке пользователю и админу

                return response()->json($reservation, 200);
            }
            //Регистрируем пользователя и отсылаем смс код
            else{

                $user = new User([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'middle_name' => $request->middle_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'is_verification' => false,
                    'password' => 'null',
                ]);

                //Роль - пользователь
                $user->role()->associate(Role::firstOrCreate(['name' => 'user', 'name_ru' => 'Пользователь']));
                $user->save();

                //Создаем заявку
                $payment_type = PaymentType::findorfail($request->payment_type_id);

                $reservation = new Reservation();
                $reservation->cost=$course->cost;
                $reservation->course()->associate($course);
                $reservation->user()->associate($user);
                $reservation->payment_type()->associate($payment_type);
                $reservation ->save();

                //Создаем верификацию
                $verification = new Verification('registration_and_reservation');
                $verification->user()->associate($user);
                $verification->save();

                //Связываем верификацию с заявкой
                $reservation->verification()->associate($verification);
                $reservation ->save();

                $verification->date_send = Carbon::now();
                $verification->save();

                //Отправляем пользователю код верификации
                $user->notify(new VerificationCode($verification));

                return response()->json($reservation, 200);

            }
        }
    }

    public function checkVerificationCode($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'code' => 'required|regex:/[0-9]{4}/',
        ]);

        $validator->validate();

        $reservation = Reservation::findorfail($id);

        if($reservation->is_verification == true){
            $messages = [
                'errors' => [
                    'code' => ['Заявка уже подтверждена']
                ]
            ];
            $errors = new \Illuminate\Support\MessageBag($messages);

            return response()->json($errors, 422);
        }
        else{
            $verification = $reservation->verification;
            if($verification){
                if($verification->type == 'reservation'){

                    $check = $verification->checkCode($request->code);

                    if($check === true){

                       $verification->is_verifiaction = true;
                       $verification->save();

                        return response()->json($reservation, 200);
                    }
                    else{

                        return $check;
                    }
                }
                elseif ($verification->type == 'registration_and_reservation'){

                    $check = $verification->checkCode($request->code);

                    if($check === true){

                        //Создаем пароль
                        $user = $verification->user;
                        $password = str_random(6);
                        $user->password = bcrypt($password);

                        $user->is_verification = true;
                        $user->save();

                        $reservation->is_verification = true;
                        $reservation->save();

                        Auth::guard()->login($user);

                        //Отправка нового пароля
                        $user->notify(new NewPassword($password));

                        return response()->json($reservation, 200);
                    }
                    else{

                        return $check;
                    }
                }
                else{
                    $messages = [
                        'errors' => [
                            'code' => ['Непредвиденная ошибка. Попробуйте позже']
                        ]
                    ];
                    $errors = new \Illuminate\Support\MessageBag($messages);

                    return response()->json($errors, 422);
                }
            }
            else{
                $messages = [
                    'errors' => [
                        'code' => ['Непредвиденная ошибка. Попробуйте позже']
                    ]
                ];
                $errors = new \Illuminate\Support\MessageBag($messages);

                return response()->json($errors, 422);
            }
        }



        return response()->json($reservation, 200);
    }

    public function getPaymentTypes()
    {

        $payment_types = PaymentType::select('id', 'name', 'is_online')->get();

        return response()->json($payment_types, 200);
    }
}
