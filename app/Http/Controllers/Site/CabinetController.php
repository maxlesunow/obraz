<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

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
