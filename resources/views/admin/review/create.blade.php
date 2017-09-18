@extends('admin.layouts.app')

@section('title', 'Добавить отзыв')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Добавить отзыв<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'action' => 'ReviewController@store', 'class' => 'form-horizontal']) !!}
            @include('admin.review.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection