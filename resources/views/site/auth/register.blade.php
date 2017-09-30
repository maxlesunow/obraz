@extends('site.layouts.app')

@section('title', 'Регистрация')

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Войти',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Авторизация | Регистрация'),
        )])
@endsection

@section('content')
    <auth></auth>
@endsection