@extends('site.layouts.app')


@section('title', "Мои курсы")

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Мои курсы',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Мои курсы'),
        )])
@endsection

@section('content')
<section class="section-66">
    <div class="shell">
        <div class="content">
            <div class="cell-xs-8">
                <h3>Мои курсы</h3>
                <table class="table table-custom" data-responsive="true">
                    <tr>
                        <th>Название</th>
                        <th>Время начала</th>
                        <th>Стоимость</th>
                        <th>Способ оплаты</th>
                        <th>Статус оплаты</th>
                        <th>Билет</th>
                    </tr>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->course->name }}</td>
                        <td>{{ Carbon\Carbon::parse($reservation->course->time_start)->formatLocalized('%d.%m.%Y %H:%M')}}</td>
                        <td>{{ $reservation->cost }}</td>
                        <td>{{ $reservation->payment_type->name }}</td>
                        @if($reservation->payment_status)
                            <td>Оплачено</td>
                        @else
                            <td>Не оплачено</td>
                        @endif
                        @if($reservation->status)
                            <td>Ссылка на билет</td>
                        @else
                            <td>Ожидает подтверждения</td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection