<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class WhoamiController extends Controller
{
    function whoami(){

        $user = Auth::user();
        return $user;
    }
}
