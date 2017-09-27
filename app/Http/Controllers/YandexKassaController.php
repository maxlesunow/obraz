<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YandexKassaController extends Controller
{
    public function success()
    {

        return view('site.payment.success');
    }

    public function error()
    {

        return view('site.payment.error');
    }

    public function aviso()
    {

        return 'aviso';
    }

    public function check()
    {

        return 'check';
    }
}
