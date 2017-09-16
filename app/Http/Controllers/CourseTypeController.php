<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CourseTypeRequest;

use App\CourseType;

class CourseTypeController extends Controller
{
    //

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

    public function getCourseTypes(Request $request)
    {

        $query = CourseType::query();

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
                $q->where('name', 'like', $value);
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
}
