<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {

        $review = new Review($request->all());

        $review->user()->associate(Auth::user());
        $review->save();

        return response()->json($review, 200);
    }
}
