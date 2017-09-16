@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Докладчик:  {{$speaker->full_name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($speaker, ['method' => 'PATCH', 'action' => ['SpeakerController@update', $speaker->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.speaker.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Курсы докладчика<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
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