<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $review = new Review($request->all());

        $review->date = Carbon::now();
        $review->user()->associate(Auth::user());
        $review->save();

        return response()->json($review, 200);
    }

    public function test()
    {

        $user = Auth::user();

        $password = str_random(6);

        $user->password = bcrypt($password);

        return $password;
    }
}
