<?php

namespace App\Http\Controllers\Site;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SiteUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(){

        $user = Auth::user();
        return $user;
    }

    public function updateUser(SiteUserRequest $request){

        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed'
        ]);

        $validator->validate();

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)){

            $user->password = $request->new_password;
            $user->save();
        }
        else{

            $messages = [
                'errors' => [
                    'password' => ["Не верный текущий пароль"]
                ]
            ];
            $errors = new \Illuminate\Support\MessageBag($messages);

            return response()->json($errors, 422);
        }

        return $user;
    }
}
