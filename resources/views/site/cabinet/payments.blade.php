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
    <h1>Мои оплаты</h1>
@endsection