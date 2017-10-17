<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\SiteReservationRequest;
use App\PaymentType;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(SiteReservationRequest $request)
    {

        return response()->json("пока не работает", 200);
    }

    public function getPaymentTypes()
    {

        $payment_types = PaymentType::select('id', 'name', 'is_online')->get();

        return response()->json($payment_types, 200);
    }
}
