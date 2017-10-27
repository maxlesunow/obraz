@extends('site.layouts.app')


@section('title', "Мои оплаты")

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Мои оплаты',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Мои оплаты'),
        )])
@endsection

@section('content')
<section class="section-66">
    <div class="shell">
        <div class="content">
            <div class="cell-xs-8">
                <h3>Мои оплаты</h3>

                <table class="table table-custom" data-responsive="true">
                    <tr>
                        <th>Номер документа</th>
                        <th>Сумма платежа</th>
                        <th>Дата оплаты</th>
                        <th>Способ оплаты</th>
                        <th>Заявка</th>
                        <th>Статус оплаты</th>
                    </tr>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->number_document }}</td>
                        <td>{{number_format($payment->total, 2, '.', ' ')}} ₽</td>
                        <td>haponov.serhii@gmail.com</td>
                        <td>{{ $payment->reservation->payment_type->name}}</td>
                        <td>{{ $payment->reservation->name}}</td>
                        @if($payment->reservation->status)
                            <td><span class="label label-success">Подтверждено</span></td>
                        @else
                            <td><span class="label label-danger">Не подтверждено</span></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection