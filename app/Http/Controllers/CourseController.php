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

    public function getCourses(Request $request)
    {

        $query = Course::query();

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
                $q->where('first_name', 'like', $value)
                    ->orWhere('last_name', 'like', $value)
                    ->orWhere('middle_name', 'like', $value);
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
