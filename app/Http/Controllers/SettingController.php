<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function edit()
    {
        $settings = Setting::first();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(SettingRequest $request)
    {

        $settings =  Setting::first();

        $settings->update($request->all());

        \Session::flash('success_message', 'Параметры успешно обновлены');
        return redirect('admin/settings');
    }
}