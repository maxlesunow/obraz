@extends('site.layouts.app')


@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'О компании',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'О компании'),
        )])
@endsection

@section('content')
    @include('site.partials.text',
        [
            'name'=> $page->title,
            'description'=> $page->text,
        ])
@endsection