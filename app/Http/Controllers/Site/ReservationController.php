<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\SiteReservationRequest;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(SiteReservationRequest $request)
    {

        return response()->json("OK", 200);
    }

    public function test()
    {

        $user = Auth::user();

        $password = str_random(6);

        $user->password = bcrypt($password);

        return $password;
    }
}
