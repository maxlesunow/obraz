<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
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


        if($user->verification->code == $request->input('code')){

            $user->is_verification = true;
            $user->save();

            Auth::guard()->login($user);

           return redirect('/home');
        }
        else{
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('code', 'СМС код не верный');
            return view('site.auth.verification', compact('user', 'errors'));
        }

        //Добавить проверку на срок действия

        return view('site.auth.verification', compact('user'));
    }
}
