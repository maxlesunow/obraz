<?php

namespace App\Http\Controllers\Site;

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
        $page
        return view('site.home');
    }

    public function about()
    {
        return view('site.about');
    }

    public function schedule()
    {
        return view('site.schedule');
    }

    public function contact()
    {
        return view('site.contact');
    }

}
