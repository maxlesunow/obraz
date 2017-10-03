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
        $reviews = Review::where('show_home', true)->where('status', true)->orderBy('date', 'desc')->paginate(8);
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
        $calendar_courses = Course::select('id', 'name', 'time_start', 'meta_url')->where('time_start', '>', Carbon::now())->get();
        $page = Page::where('type', 'schedule')->first();

        return view('site.schedule', compact('page', 'upcoming_courses', 'calendar_courses'));
    }

    public function reviews()
    {
        $reviews = Review::where('status', true)->orderBy('date', 'desc')->paginate(10);
        $page = Page::where('type', 'reviews')->first();

        return view('site.reviews', compact('reviews', 'page'));
    }

    public function contact()
    {
        $page = Page::where('type', 'contact')->first();
        return view('site.contact', compact('page'));
    }

}
