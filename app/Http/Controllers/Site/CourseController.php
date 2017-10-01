<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Course;
use App\CourseType;
use App\CourseGroup;

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


    public function getTypes(Request $request)
    {
        $course_types = CourseType::pluck('name', 'id');

        return response()->json($course_types);
    }

    public function getGroups(Request $request)
    {
        $course_groups = CourseGroup::pluck('name', 'id');

        return response()->json($course_groups);
    }

    public function getCourses(Request $request)
    {

        $query = Course::query();

        $query->with(['speakers' => function($q) {
            $q-> select('first_name', 'last_name', 'middle_name');
        }]);

        $query->join('course_types', 'courses.course_type_id', '=', 'course_types.id');
        $query->join('course_groups', 'courses.course_group_id', '=', 'course_groups.id');


//        $query->select(
//            'courses.name',
//            'courses.address',
//            'courses.cost',
//            'courses.time_register',
//            'courses.time_start',
//            'courses.description',
//            'courses.image',
//            'course_types.name as course_type_name',
//            'course_groups.name as course_group_name',
//        );

        $query->orderBy('time_start', 'desc');

        //Берем только будущие курсы
        $query->where('time_start', '>', Carbon::now());

//        //Фильтрация
//        if ($request->exists('filter')) {
//            $query->where(function($q) use($request) {
//                $value = "%{$request->filter}%";
//                $q->where('name', 'ilike', $value);
//            });
//        }
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
