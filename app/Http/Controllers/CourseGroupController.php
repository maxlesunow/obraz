<?php

namespace App\Http\Controllers;

use App\CourseType;
use Illuminate\Http\Request;

use App\Http\Requests\CourseGroupRequest;

use App\CourseGroup;

class CourseGroupController extends Controller
{
    //

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

    public function getCourseGroups(Request $request)
    {

        $query = CourseGroup::query();

        //Сортировка
        if (request()->has('sort')) {
            // Мультисортировка
            $sorts = explode(',', request()->sort);
            foreach ($sorts as $sort) {
                if($sort){
                    list($sortCol, $sortDir) = explode('|', $sort);
                    $query = $query->orderBy($sortCol, $sortDir);
                }
            }
        } else {
            $query = $query->orderBy('id', 'asc');
        }

        //Фильтрация
        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('name', 'ilike', $value);
            });
        }
        //Пагинация
        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $pagination = $query->paginate($perPage);
        $pagination->appends([
            'sort' => request()->sort,
            'filter' => request()->filter,
            'per_page' => request()->per_page
        ]);

        return response()->json($pagination);
    }

    public function destroy($ids){

        $course_groups = CourseGroup::find(explode(',', $ids));

        if(count($course_groups) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Группы курсов не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        CourseGroup::destroy(explode(',', $ids));

        return  response()->json($course_groups);
    }
}
