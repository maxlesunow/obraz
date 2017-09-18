@extends('admin.layouts.app')

@section('title', 'Добавить группу курсов')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Добавить группу курса<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'action' => 'CourseGroupController@store', 'class' => 'form-horizontal']) !!}
            @include('admin.course_group.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection