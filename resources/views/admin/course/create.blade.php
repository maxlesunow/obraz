@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Добавить докладчика<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'action' => 'CourseController@store', 'class' => 'form-horizontal']) !!}
            @include('admin.course.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection