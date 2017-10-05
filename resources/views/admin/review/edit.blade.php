@extends('admin.layouts.app')

@section('title', 'Отзыв')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Отзыв<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($review, ['method' => 'PATCH', 'action' => ['ReviewController@update', $review->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.review.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Отзывы пользователя<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>
                <reviews-table-user user-id="{{$review->user_id}}"></reviews-table-user>
            </div>

        </div>
    </div>
@endsection