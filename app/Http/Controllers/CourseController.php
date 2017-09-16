<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CourseRequest;

use App\Course;

class CourseController extends Controller
{
    //

    public function index()
    {
        $courses = Course::paginate(10);

        return view('admin.course.index', compact('courses'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.edit', compact('course'));
    }

    public function update($id, CourseRequest $request)
    {
        $course = Course::findOrFail($id);

        $course->update($request->all());


        \Session::flash('success_message', 'Курса "' . $course->name . '" успешно обновлен');
        return redirect('admin/course/'.$id.'/edit');
    }

    public function create()
    {

        return view('admin.course.create', compact('speaker'));
    }

    public function store(CourseRequest $request)
    {
        $course = new Course($request->all());
        $course->save();

        \Session::flash('success_message', 'Курс "' . $course->name. '" успешно добавлен');
        return redirect('admin/course');
    }
}
