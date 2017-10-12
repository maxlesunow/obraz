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
<section class="section-124">
    <div class="shell">
        <div class="range range-xs-center">
            <div class="cell-xs-8">
                <cabinet-detatils></cabinet-detatils>
            </div>
        </div>
    </div>
</section>
@endsection