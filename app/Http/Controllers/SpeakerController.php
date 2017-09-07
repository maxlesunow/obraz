<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SpeakerRequest;

use App\Speaker;


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

        \Session::flash('success_message', 'Докладчик "' . $speaker->full_name(). '" успешно обновлен');
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


        \Session::flash('success_message', 'Докладчик "' . $speaker->full_name(). '" успешно добавлен');
        return redirect('admin/speaker');
    }
    
}
