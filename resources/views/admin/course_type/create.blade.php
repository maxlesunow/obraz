@extends('admin.layouts.app')

@section('title', 'Добавить тип курса')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Добавить тип курса<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'action' => 'CourseTypeController@store', 'class' => 'form-horizontal']) !!}
            @include('admin.course_type.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection