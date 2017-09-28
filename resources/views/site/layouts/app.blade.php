<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <title>@yield('title', 'Консалтинговое пространство образ - Курсы, Семинары, Лекции')</title>
        <meta name="description" content="@yield('description', 'Сегодня в рамках консалтингового пространства «ОБРАЗ» активно стартуют проекты в индустрии красоты, косметологии, лингвистики, клинической психологии, но это только начало.')"/>
        <meta name="keywords" content="@yield('keywords', 'Курсы, Семинары, Лекции, Консалтинг, Стоматология')"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        @yield('css')

        @yield('js')

        {{--fix modal--}}
        <style>
            .modal-backdrop {
                z-index: 0;
            }
        </style>

    </head>
    <body class="home">
        <div id="app">
            @include('site.layouts.header')
            <div class="container">
                @yield('content')
            </div>
            @include('site.layouts.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>

        @yield('scripts')
    </body>
</html>
