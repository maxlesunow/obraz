@extends('admin.layouts.app')

@section('title', 'Добавить оплату')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Добавить оплату<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'action' => 'PaymentController@store', 'class' => 'form-horizontal']) !!}
            @include('admin.payment.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection