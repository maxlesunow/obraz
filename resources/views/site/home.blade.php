@extends('site.layouts.app')

@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('slider')
    @include('site.layouts.slider')
@endsection

@section('content')

    @include('site.partials.description-icons',
        [
            'name'=> 'Скидка 15% на первый заказ курса',
            'description'=> 'Товарищи! рамки и место обучения кадров способствует подготовки и реализации форм развития. С другой стороны сложившаяся структура организации позволяет выполнять важные задания по разработке направлений прогрессивного развития.',
        ])

    @include('site.partials.text',
        [
            'name'=> $page->title,
            'description'=> $page->text,
        ])

    @include('site.partials.discount',
        [
            'name'=> 'Скидка 15% на первый заказ курса',
            'description'=> 'Товарищи! рамки и место обучения кадров способствует подготовки и реализации форм развития. С другой стороны сложившаяся структура организации позволяет выполнять важные задания по разработке направлений прогрессивного развития.',
        ])

    @include('site.partials.courses',
        [
            'name'=> 'Ближайшие события',
            'button_name' => 'Посмотреть все события',
            'button_url' => '/shedule',
            'courses' => $courses
        ])

    @include('site.partials.speakers',
        [
            'name'=> 'Наши докладчики',
            'description'=> 'У нас самая лучшая команда',
            'button_name' => 'Посмотреть всех докладчиков',
            'button_url' => '/speakers',
            'speakers' => $speakers
        ])

    @include('site.partials.reviews',
          [
            'name'=> 'Что говорят клиенты?',
            'description'=> 'У нас самые достоверные отзывы',
            'button_name' => 'Посмотреть все отзывы',
            'button_url' => '/reviews',
            'reviews' => $reviews
          ])

    @include('site.partials.partners',
          [
              'name'=> 'Наши партнеры',
              'description'=> 'Не следует, однако забывать, что постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании модели развития. Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности требуют от нас анализа существенных финансовых и административных условий.',
          ])

@endsection