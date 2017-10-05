<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    }
}
