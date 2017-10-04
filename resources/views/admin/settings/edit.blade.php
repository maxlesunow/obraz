@extends('admin.layouts.app')

@section('title', 'Параметры системы')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Параметры системы<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($settings, ['method' => 'PATCH', 'action' => ['SettingController@update'], 'class' => 'form-horizontal']) !!}
                    @include('admin.settings.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection