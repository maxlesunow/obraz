<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CourseGroupRequest;

use App\CourseGroup;

class CourseGroupController extends Controller
{
    //

    public function show()
    {
        $course_groups = CourseGroup::paginate(10);
        return view('admin.course_group.index', compact('course_groups'));
    }

    public function index()
    {
        $course_groups = CourseGroup::paginate(10);
        return view('admin.course_group.index', compact('course_groups'));
    }

    public function edit($id)
    {
        $course_group = CourseGroup::findOrFail($id);
        return view('admin.course_group.edit', compact('course_group'));
    }

    public function update($id, CourseGroupRequest $request)
    {
        $course_group = CourseGroup::findOrFail($id);

        $course_group->update($request->all());


        \Session::flash('success_message', 'Группа курса "' . $course_group->name . '" успешно обновлен');
        return redirect('admin/course/group/'.$id.'/edit');
    }

    public function create()
    {

        return view('admin.course_group.create', compact('speaker'));
    }

    public function store(CourseGroupRequest $request)
    {
        $course_group = new CourseGroup($request->all());
        $course_group->save();

        \Session::flash('success_message', 'Группа курса "' . $course_group->name. '" успешно добавлен');
        return redirect('admin/course/group');
    }
}
