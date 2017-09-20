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

        $query = Course::query()->select('courses.*');

        $query->join('course_types', 'courses.course_type_id', '=', 'course_types.id');
        $query->join('course_groups', 'courses.course_group_id', '=', 'course_groups.id');

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
            $query = $query->orderBy('courses.id', 'asc');
        }

        //Поиск
        if ($request->exists('search')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->search}%";
                $q->where('courses.name', 'ilike', $value)
                    ->orWhere('course_types.name', 'ilike', $value)
                    ->orWhere('course_groups.name', 'ilike', $value);

                if (is_numeric($request->search))
                    {
                        $q->orWhere('courses.cost', $request->search);
                    }
            });

        }

        //Фильтр
        if ($request->exists('filters')) {

            $filters = explode(',', request()->filters);
            foreach ($filters as $filter) {
                if($filter){
                    list($filterBy, $filterValue) = explode('|', $filter);
                    if($filterBy == 'speakers.id'){
                        $query->whereHas('speakers', function($q) use($filterValue){
                            $q->where('id', $filterValue);
                        });
                    }
                    else{
                        $query->where($filterBy, $filterValue);
                    }
                }
            }
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

        $courses = Course::find(explode(',', $ids));

        if(count($courses) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Курсы не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        Course::destroy(explode(',', $ids));

        return  response()->json($courses);
    }
}
