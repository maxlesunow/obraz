@extends('admin.layouts.app')

@section('title', 'Заявка:  '.$reservation->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Заявка:  {{$reservation->name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($reservation, ['method' => 'PATCH', 'action' => ['ReservationController@update', $reservation->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.reservation.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection