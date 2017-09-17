<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CourseRequest;

use App\Course;
use App\CourseType;
use App\CourseGroup;
use App\Speaker;

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

        $course_types = CourseType::pluck('name', 'id');
        $course_type = $course->course_type()->pluck('id');

        $course_groups = CourseGroup::pluck('name', 'id');
        $course_group = $course->course_group()->pluck('id');

        $speakers = Speaker::get()->pluck('full_name', 'id');
        $course_speakers = $course->speakers()->pluck('id');

        return view('admin.course.edit', compact('course', 'speakers', 'course_type', 'course_group', 'course_types', 'course_groups', 'course_speakers'));
    }

    public function update($id, CourseRequest $request)
    {
        $course = Course::findOrFail($id);

        $course->update($request->all());

        $course->course_type()->associate(CourseType::findOrFail($request->input('course_type')));
        $course->course_group()->associate(CourseGroup::findOrFail($request->input('course_group')));
        $course->save();

        $course->speakers()->sync($request->input('speakers'));


        \Session::flash('success_message', 'Курс "' . $course->name . '" успешно обновлен');
        return redirect('admin/course/'.$id.'/edit');
    }

    public function create()
    {

        $course_types = CourseType::pluck('name', 'id');
        $course_type = null;

        $course_groups = CourseGroup::pluck('name', 'id');
        $course_group = null;

        $speakers = Speaker::get()->pluck('full_name', 'id');
        $course_speakers = null;

        return view('admin.course.create', compact('course', 'speakers', 'course_type', 'course_group', 'course_types', 'course_groups', 'course_speakers'));
    }

    public function store(CourseRequest $request)
    {
        $course = new Course($request->all());

        $course->course_type()->associate(CourseType::findOrFail($request->input('course_type')));
        $course->course_group()->associate(CourseGroup::findOrFail($request->input('course_group')));
        $course->save();

        $course->speakers()->sync($request->input('speakers'));


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
                $q->where('first_name', 'ilike', $value)
                    ->orWhere('last_name', 'ilike', $value)
                    ->orWhere('middle_name', 'ilike', $value);
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
