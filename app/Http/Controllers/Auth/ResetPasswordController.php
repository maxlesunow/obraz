<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendVerificationCode(Request $request){

        $validator = Validator::make($request, [
            'phone' => 'required|regex:/(7)[0-9]{10}/',
        ]);

        $user = User::where('phone', $request->phone)->first();

        return 'Код отправлен';

    }

    public function checkVerificationCode(){

    }


}
