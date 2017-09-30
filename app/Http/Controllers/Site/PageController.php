<?php

namespace App\Http\Controllers\Site;

use App\Course;
use App\Page;
use App\Speaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $courses = Course::paginate(5);
        $speakers = Speaker::where('show_home', true)->get();
        $page = Page::where('type', 'home')->first();
        return view('site.home', compact('page', 'courses', 'speakers'));
    }

    public function about()
    {
        $page = Page::where('type', 'about')->first();
        return view('site.about', compact('page'));
    }

    public function schedule()
    {
        $page = Page::where('type', 'schedule')->first();
        return view('site.schedule', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('type', 'contact')->first();
        return view('site.contact', compact('page'));
    }

}
