@extends('admin.layouts.app')

@section('title', 'Тип курса:  '.$course_type->name)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Тип курса:  {{$course_type->name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($course_type, ['method' => 'PATCH', 'action' => ['CourseTypeController@update', $course_type->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.course_type.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Курсы<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>
                <div class="panel-body">
                    Здесь пока пусто
                    {{--{!! Form::model($subscriber, ['method' => 'PATCH', 'action' => ['SubscriberController@update', $subscriber->id], 'class' => 'form-horizontal']) !!}--}}
                    {{--@include('subscriber.form')--}}
                    {{--{!! Form::close() !!}--}}
                </div>
            </div>

        </div>
    </div>
@endsection