<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function showDetails(){

        return view('site.cabinet.details');
    }


    public function showPayments(){
        return view('site.cabinet.payments');
    }

    public function showReservations(){
        return view('site.cabinet.reservations');
    }
}
