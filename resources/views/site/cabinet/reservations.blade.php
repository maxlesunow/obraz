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
<section class="section-124">
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
                        <td>Sergey Gaponov</td>
                        <td>Gap0n</td>
                        <td>**********</td>
                        <td>haponov.serhii@gmail.com</td>
                        <td>**********</td>
                        <td>**********</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection