@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Оплата:  {{$payment->number_document}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($payment, ['method' => 'PATCH', 'action' => ['PaymentTypeController@update', $payment->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.payment.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection