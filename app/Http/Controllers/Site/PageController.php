<?php

namespace App\Http\Controllers\Site;

use App\Page;
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
        $page = Page::where('type', 'home')->first();
        return view('site.home', compact('page'));
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
