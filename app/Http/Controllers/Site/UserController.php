<?php

namespace App\Http\Controllers\Site;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUser(){

        $user = Auth::user();
        return $user;
    }

    public function updateUser(UserRequest $request){

        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    public function updatePassword(Request $request){

        $user = Auth::user();

        if($user->password == bcrypt($request->password)){
            $user->password = $request->new_password;
            $user->save();
        }
        else{

        }

        return $user;
    }
}
