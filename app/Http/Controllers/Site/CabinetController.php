<?php

namespace App\Http\Controllers\Site;

use Auth;
use App\Http\Controllers\Controller;

class CabinetController extends Controller
{
    public function showDetails()
    {

        return view('site.cabinet.details');
    }


    public function showPayments()
    {
        $payments = Auth::user()->payments;
        
        return view('site.cabinet.payments', compact('payments'));
    }

    public function showReservations()
    {
        $reservations = Auth::user()->reservations;

        return view('site.cabinet.reservations', compact('reservations'));
    }
}
