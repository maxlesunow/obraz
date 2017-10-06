<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Verification;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class VerificationController extends Controller
{
    public function update($id, Request $request){

        $user = User::findOrFail($id);

        if($user->is_verification){
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Номер телефона уже подтвержден!');

            return response()->json($errors, 422);
        }

        $verification = Verification::where('user_id', $user->id)
            ->where('type', 'registration')->first();

        //Добавляем попытку к верифицации
        $verification->wrong_pass++;
        $verification->save();

        if ($verification->wrong_pass > 3){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Слишком много попыток. Попробуйте позже');

            return response()->json($errors, 422);

        }
        elseif($verification->code != $request->input('code')) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'СМС код не верный');

            return response()->json($errors, 422);
        }
        elseif ($verification->date_expire < Carbon::now()){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Срок действия кода истек');

            return response()->json($errors, 422);

        }
        else{
            $verification->delete();

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

        $verification = Verification::where('user_id', $user->id)
            ->where('type', 'registration')->first();


        if(Carbon::now()->diffInSeconds(Carbon::parse($verification->date_send)) < 60 ){

            $diff = 60 - Carbon::now()->diffInSeconds(Carbon::parse($verification->date_send));

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', "Повторная отправка кода возможна через $diff сек");

            return response()->json($errors, 422);

        }

        $verification->reGenerateCode();
        $verification->date_send = Carbon::now();
        $verification->save();

        //Добавить отправку кода

        return response()->json($user, 200);
    }
}
