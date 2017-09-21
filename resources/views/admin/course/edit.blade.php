@extends('admin.layouts.app')

@section('title', 'Курс:  '.$course->name)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Курс:  {{$course->name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($course, ['method' => 'PATCH', 'action' => ['CourseController@update', $course->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.course.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Список участников<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>
                <reservations-table-course course-id="{{$course->id}}"></reservations-table-course>
            </div>

        </div>
    </div>
@endsection
