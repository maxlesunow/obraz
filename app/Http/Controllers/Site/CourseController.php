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

        $query->with([

            'course_type' => function($q) {
                $q-> select('id','name');
            },

            'course_group' => function($q) {
                $q-> select('id','name');
            },

            'speakers' => function($q) {
                $q-> select('id','first_name', 'last_name', 'middle_name');
            }
        ]);

        $query->select(
            'id',
            'courses.course_type_id',
            'courses.course_group_id',
            'courses.name',
            'courses.address',
            'courses.cost',
            'courses.time_register',
            'courses.time_start',
            'courses.description',
            'courses.image'
        );

        $query->orderBy('time_start', 'asc');


        //Фильтрация
        if ($request->exists('filter')) {
            $filters = explode(',', request()->filter);
            foreach ($filters as $filter) {
                if($filter) {
                    list($filterBy, $filterValues) = explode('|', $filter);
                    $values = explode(':', $filterValues);

                    $query->where(function ($q) use ($filterBy, $values) {
                        foreach ($values as $value) {
                            $q->orWhere($filterBy, $value);
                        }
                    });
                }
            }
        }

        //Берем только будущие курсы, либо фильтруем по дате
        if ($request->exists('date_start') && $request->exists('date_stop')) {

            if(Carbon::now() > Carbon::parse($request->date_start)){

                $query->whereBetween('time_start', [Carbon::now(), Carbon::parse($request->date_stop)]);
            }
            else{

                $query->whereBetween('time_start', [Carbon::parse($request->date_start), Carbon::parse($request->date_stop)]);
            }
        }
        elseif ($request->exists('date_start') && !$request->exists('date_stop')){

            if(Carbon::now() > Carbon::parse($request->date_start)){

                $query->where('time_start', '>', Carbon::now());
            }
            else{

                $query->where('time_start', '>', Carbon::parse($request->date_start));
            }

            $query->where('time_start', '>', Carbon::parse($request->date_start));
        }
        elseif (!$request->exists('date_start') && $request->exists('date_stop')){

            $query->whereBetween('time_start', [Carbon::now(), Carbon::parse($request->date_stop)]);
        }
        else{
            $query->where('time_start', '>', Carbon::now());
        }


        //Пагинация
        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $pagination = $query->paginate($perPage);


//        Скрываем лишние поля
        $set_hidden_course = [
            'id',
            'reservations_count',
            'course_group_id',
            'course_type_id',
        ];
        $set_hidden_speaker = ['courses_count', 'pivot', 'id'];
        $set_hidden_course_group = ['id'];
        $set_hidden_course_type = ['id'];

        $pagination->each(function($row) use ($set_hidden_course, $set_hidden_speaker, $set_hidden_course_group, $set_hidden_course_type) {

            $row->setHidden($set_hidden_course);
            $row->speakers->each(function($row) use ($set_hidden_speaker) {
                $row->setHidden($set_hidden_speaker);
            });
            $row->course_group->setHidden($set_hidden_course_group);
            $row->course_type->setHidden($set_hidden_course_type);
        });

//        Добавляем пагинацию
        $pagination->appends([
            'sort' => request()->sort,
            'filter' => request()->filter,
            'per_page' => request()->per_page
        ]);

        return response()->json($pagination);
    }
}
