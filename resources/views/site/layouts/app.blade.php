<!DOCTYPE html>
<html class="wide wow-animation scrollTo smoothscroll" lang="{{ app()->getLocale() }}">
    <head>

        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="UTF-8">

        <title>@yield('title', 'Консалтинговое пространство образ - Курсы, Семинары, Лекции')</title>
        <meta name="description" content="@yield('description', 'Сегодня в рамках консалтингового пространства «ОБРАЗ» активно стартуют проекты в индустрии красоты, косметологии, лингвистики, клинической психологии, но это только начало.')"/>
        <meta name="keywords" content="@yield('keywords', 'Курсы, Семинары, Лекции, Консалтинг, Стоматология')"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        {{--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,700%7CLato:300,300italic,400,700,900%7CYesteryear">--}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @yield('css')

        @yield('js')

        {{--fix modal--}}
        <style>
            .modal-backdrop {
                z-index: 99;
            }
        </style>

    </head>
    <body>
        <!-- Page-->
        <div id="app" class="page text-center">
            <!-- Page Header-->
            @include('site.layouts.header')
            <!-- Classic Breadcrumbs-->
            @yield('breadcrumbs')
            <!-- Page Contents-->
            <main class="page-content">
                @yield('content')
            </main>
            <!-- Page Footer-->
            <!-- Default footer-->
            @include('site.layouts.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/core.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        @yield('scripts')
    </body>
</html>
