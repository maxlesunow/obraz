@extends('admin.layouts.app')

@section('title', 'Группа курса:  '.$course_group->name)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Группа курса:  {{$course_group->name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($course_group, ['method' => 'PATCH', 'action' => ['CourseGroupController@update', $course_group->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.course_group.form')
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