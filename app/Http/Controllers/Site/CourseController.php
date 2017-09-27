<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;

class CourseController extends Controller
{
    //
    public function show($id, $slug = '')
    {
        $course = Course::findOrFail($id);

        if ($slug !== $course->slug) {
            return redirect()->to($course->url);
        }

        return view('site.course', compact('course'));
    }
}
