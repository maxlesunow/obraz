@extends('site.layouts.app')


@section('title', "Мои данные")

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Мои данные',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Мои данные'),
        )])
@endsection

@section('content')
    <h1>Мои данные</h1>
@endsection