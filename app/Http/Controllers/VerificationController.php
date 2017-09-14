<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class VerificationController extends Controller
{
    public function update($id, Request $request){

//        dd($request);

        $user = User::findOrFail($id);

        if($user->is_verification){
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Номер телефона уже подтвержден!');

            return response()->json($errors, 422);
        }

        //Добавляем попытку к верифицации
        $user->verification->wrong_pass++;
        $user->verification->save();

        if ($user->verification->wrong_pass > 3){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Слишком много попыток. Попробуйте позже');

            return response()->json($errors, 422);

        }
        elseif($user->verification->code != $request->input('code')) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'СМС код не верный');

            return response()->json($errors, 422);
        }
        elseif ($user->verification->date_expire < Carbon::now()){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Срок действия кода истек');

            return response()->json($errors, 422);

        }
        else{

            $user->is_verification = true;
            $user->save();

            Auth::guard()->login($user);

            return response()->json($user, 200);
        }
    }

    public function sendVerificationCode($id, Request $request)
    {
        $user = User::findOrFail($id);

        if($user->is_verification){
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Номер телефона уже подтвержден!');

            return response()->json($errors, 422);
        }

        $verification = $user->verification;

        if(Carbon::now()->diffInSeconds($verification->updated_at) < 60 ){

            $diff = 60 - Carbon::now()->diffInSeconds($verification->updated_at);

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', "Повторная отправка кода возможна через $diff секунд");

            return response()->json($errors, 422);

        }
        $verification->reGenerateCode();
        $verification->save();

        //Добавить отправку кода

        return response()->json($user, 200);
    }
}
