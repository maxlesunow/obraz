<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCode;
use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //

    public function sendVerificationCode(){

        $code ='1234';
        Mail::to('maxlesunow@gmail.com')->queue(new VerificationCode(compact('code')));
    }
}
