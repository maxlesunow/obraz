<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class VerificationController extends Controller
{
    public function index($id){

        $user = User::findOrFail($id);
        return view('site.auth.verification', compact('user'));
    }

    public function update($id, Request $request){

        $user = User::findOrFail($id);

        //Добавляем попытку к верифицации
        $user->verification->wrong_pass++;
        $user->verification->save();

        if ($user->verification->wrong_pass > 3){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Слишком много попыток. Попробуйте позже');

            return response(view('site.auth.verification', compact('user', 'errors')), 400);

        }
        elseif($user->verification->code != $request->input('code')) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'СМС код не верный');
            return view('site.auth.verification', compact('user', 'errors'));
        }
        elseif ($user->verification->date_expire < Carbon::now()){

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'Срок действия кода истек');

            return view('site.auth.verification', compact('user', 'errors'));
        }
        else{

            $user->is_verification = true;
            $user->save();

            Auth::guard()->login($user);

            return redirect('/home');
        }

        return view('site.auth.verification', compact('user'));
    }
}
