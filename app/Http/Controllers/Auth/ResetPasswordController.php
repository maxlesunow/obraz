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

        $user = User::where('phone', $request->phone)->first();

        if($user) {

            $verification = Verification::where('user_id', $user->id)
                ->where('type', 'reset_password')->first();
        }
        else{
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('phone', "Номер телефона не найден");

            return response()->json($errors, 422);
        }

        if($verification){

            if(Carbon::now()->diffInSeconds(Carbon::parse($verification->date_send)) < 60 ){

                $diff = 60 - Carbon::now()->diffInSeconds(Carbon::parse($verification->date_send));

                $errors = new MessageBag();

                // add your error messages:
                $errors->add('phone', "Повторная отправка кода возможна через $diff сек");

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
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('phone', "Номер телефона не найден");

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
            $errors = new MessageBag();
            $errors->add('code', 'Сначала запросите восстановление пароля');

            return response()->json($errors, 422);
        }
    }


}
