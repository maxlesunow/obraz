<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CourseTypeRequest;

use App\CourseType;

class CourseTypeController extends Controller
{
    //

    public function show()
    {
        $course_types = CourseType::paginate(10);
        return view('admin.course_type.index', compact('course_types'));
    }

    public function index()
    {
        $course_types = CourseType::paginate(10);
        return view('admin.course_type.index', compact('course_types'));
    }

    public function edit($id)
    {
        $course_type = CourseType::findOrFail($id);
        return view('admin.course_type.edit', compact('course_type'));
    }

    public function update($id, CourseTypeRequest $request)
    {
        $course_type = CourseType::findOrFail($id);

        $course_type->update($request->all());


        \Session::flash('success_message', 'Тип курса "' . $course_type->name . '" успешно обновлен');
        return redirect('admin/course/type/'.$id.'/edit');
    }

    public function create()
    {

        return view('admin.course_type.create', compact('speaker'));
    }

    public function store(CourseTypeRequest $request)
    {
        $course_type = new CourseType($request->all());
        $course_type->save();

        \Session::flash('success_message', 'Тип курса "' . $course_type->name. '" успешно добавлен');
        return redirect('admin/course/type');
    }
}
