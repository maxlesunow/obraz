<?php

namespace App\Http\Controllers\Site;

use App\Course;
use App\Page;
use App\Review;
use App\Speaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $courses = Course::where('time_start', '>', Carbon::now())->where('show_home', true)->orderBy('time_start', 'asc')->paginate(8);
        $reviews = Review::where('id', '<', 9)->paginate(8);
        $speakers = Speaker::where('show_home', true)->get();
        $page = Page::where('type', 'home')->first();
        return view('site.home', compact('page', 'courses', 'speakers', 'reviews'));
    }

    public function about()
    {
        $page = Page::where('type', 'about')->first();
        return view('site.about', compact('page'));
    }

    public function schedule()
    {
        $upcoming_courses = Course::where('time_start', '>', Carbon::now())->orderBy('time_start', 'asc')->paginate(4);
        $page = Page::where('type', 'schedule')->first();
        return view('site.schedule', compact('page', 'upcoming_courses'));
    }

    public function contact()
    {
        $page = Page::where('type', 'contact')->first();
        return view('site.contact', compact('page'));
    }

}
