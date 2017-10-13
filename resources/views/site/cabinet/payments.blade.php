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
<section class="section-124">
    <div class="shell">
        <div class="content">
            <div class="cell-xs-8">
                <h3>Мои оплаты</h3>

                <table class="table table-custom" data-responsive="true">
                    <tr>
                        <th>Название</th>
                        <th>Время начала</th>
                        <th>Стоимость</th>
                        <th>Способ оплаты</th>
                        <th>Статус оплаты</th>
                        <th>Билет</th>
                    </tr>
                    <tr>
                        <td>Sergey Gaponov</td>
                        <td>Gap0n</td>
                        <td>**********</td>
                        <td>haponov.serhii@gmail.com</td>
                        <td>**********</td>
                        <td>**********</td>
                    </tr>
                    <tr>
                        <td>Eugene Gusarov</td>
                        <td>Diversant</td>
                        <td>*******</td>
                        <td>stmechanus@gmail.com</td>
                        <td>**********</td>
                        <td>**********</td>
                    </tr>
                    <tr>
                        <td>Vladislav Gnatovsky</td>
                        <td>Mason</td>
                        <td>*********</td>
                        <td>vgtsky@gmail.com</td>
                        <td>**********</td>
                        <td>**********</td>
                    </tr>
                    <tr>
                        <td>Rafael Shayvolodyan</td>
                        <td>Raffa</td>
                        <td>********</td>
                        <td>mnatis.rafael@gmail.com</td>
                        <td>**********</td>
                        <td>**********</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection