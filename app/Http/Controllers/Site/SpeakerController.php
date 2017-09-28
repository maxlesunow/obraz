<?php

namespace App\Http\Controllers\Site;

use App\Speaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpeakerController extends Controller
{
    public function show($id, $slug = '')
    {
        $speaker = Speaker::findOrFail($id);

        if ($slug !== $speaker->slug) {
            return redirect()->to($speaker->url);
        }

        return view('site.speaker', compact('speaker'));
    }
}
