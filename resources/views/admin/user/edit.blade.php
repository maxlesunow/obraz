@extends('admin.layouts.app')

@section('title', 'Пользователь:  '.$user->full_name)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Пользователь:  {{$user->full_name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.user.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Курсы пользователя<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>
                <reservations-table-user user-id="{{$user->id}}"></reservations-table-user>
            </div>

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Отзывы пользователя<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>
                <reviews-table-user user-id="{{$user->id}}"></reviews-table-user>
            </div>
        </div>
    </div>
@endsection