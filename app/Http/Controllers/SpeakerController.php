<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SpeakerRequest;

use App\Speaker;
use App\Course;


class SpeakerController extends Controller
{
    //

    public function index()
    {
        $speakers = Speaker::paginate(10);
        return view('admin.speaker.index', compact('speakers'));
    }

    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('admin.speaker.edit', compact('speaker'));
    }

    public function update($id, SpeakerRequest $request)
    {
        $speaker = Speaker::findOrFail($id);

        $speaker->update($request->all());

        \Session::flash('success_message', 'Докладчик "' . $speaker->full_name. '" успешно обновлен');
        return redirect('admin/speaker/'.$id.'/edit');
    }

    public function create()
    {

        return view('admin.speaker.create', compact('speaker'));
    }

    public function store(SpeakerRequest $request)
    {
        $speaker = new Speaker($request->all());
        $speaker->save();


        \Session::flash('success_message', 'Докладчик "' . $speaker->full_name. '" успешно добавлен');
        return redirect('admin/speaker');
    }

    public function getSpeakers(Request $request)
    {

        $query = Speaker::query();

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
                $q->where('name', 'ilike', $value)
                    ->orWhere('cost', 'ilike', $value);
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

        $speakers = Speaker::find(explode(',', $ids));

        if(count($speakers) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Курсы не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        foreach ($speakers as $speaker) {

            //Получить курсы докладчика
            $courses = $speaker->courses()->get();

            foreach ($courses as $course) {

                //Если докладчик в курсе один - удалить курс
                if(count($course->speakers()) == 1){
                    Course::destroy($course->id);
                }
            }
        }

        Speaker::destroy(explode(',', $ids));

        return  response()->json($speakers);
    }
    
}
