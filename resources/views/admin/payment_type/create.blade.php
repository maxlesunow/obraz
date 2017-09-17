@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Добавить тип оплаты<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'action' => 'PaymentTypeController@store', 'class' => 'form-horizontal']) !!}
            @include('admin.payment_type.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection