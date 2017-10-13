<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\NewPassword;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Notifications\VerificationCode;

use App\User;
use App\Verification;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendVerificationCode(Request $request){


        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/(7)[0-9]{10}/',
        ]);

        $validator->validate();

        $user = User::where('phone', $request->phone)->first();

        if($user) {

            $verification = Verification::where('user_id', $user->id)
                ->where('type', 'reset_password')->first();
        }
        else{

            $messages = [
                'errors' => [
                    'phone' => ['Номер телефона не найден']
                ]
            ];
            $errors = new \Illuminate\Support\MessageBag($messages);

            return response()->json($errors, 422);
        }

        if($verification){

            if(Carbon::now()->diffInSeconds(Carbon::parse($verification->date_send)) < 60 ){

                $diff = 60 - Carbon::now()->diffInSeconds(Carbon::parse($verification->date_send));

                $messages = [
                    'errors' => [
                        'code' => ["Повторная отправка кода возможна через $diff сек"]
                    ]
                ];
                $errors = new \Illuminate\Support\MessageBag($messages);

                return response()->json($errors, 422);
            }

            $verification->reGenerateCode();
            $verification->date_send = Carbon::now();
            $verification->save();
        }
        else{
            $verification = new Verification('reset_password');
            $verification->user()->associate($user);
            $verification->date_send = Carbon::now();
            $verification->save();
        }

        //Отправляем пользователю код верификации
        $user->notify(new VerificationCode($verification));

        $data = new MessageBag();
        $data->add('data', "Код успешно отправлен");

        return response()->json($data, 200);

    }

    public function checkVerificationCode(Request $request){

        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/(7)[0-9]{10}/',
            'code' => 'required|regex:/[0-9]{4}/',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if($user) {

            $verification = Verification::where('user_id', $user->id)
                ->where('type', 'reset_password')->first();
        }
        else{

            $messages = [
                'errors' => [
                    'phone' => ["Номер телефона не найден"]
                ]
            ];
            $errors = new \Illuminate\Support\MessageBag($messages);

            return response()->json($errors, 422);
        }

        if($verification){

            $check = $verification->checkCode($request->code);

            if($check === true){

                $password = str_random(6);

                $user->password = bcrypt($password);
                $user->save();

                Auth::guard()->login($user);

                //Отправка нового пароля
                $user->notify(new NewPassword($password));

                return redirect('/');
            }
            else{

                return $check;
            }

        }
        else{

            $messages = [
                'errors' => [
                    'code' => ["Сначала запросите восстановление пароля"]
                ]
            ];
            $errors = new \Illuminate\Support\MessageBag($messages);

            return response()->json($errors, 422);
        }
    }


}
