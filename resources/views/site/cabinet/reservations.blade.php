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
    <h1>Мои курсы</h1>
@endsection