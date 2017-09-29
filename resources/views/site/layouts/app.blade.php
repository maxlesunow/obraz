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
    <body class="home">
        <main id="app" class="page text-center">
            @include('site.layouts.header')

            <!-- Classic Breadcrumbs-->
                <section class="breadcrumb-classic">
                    <div class="shell section-34 section-sm-50">
                        <div class="range range-lg-middle">
                            <div class="cell-lg-2 veil reveal-sm-block cell-lg-push-2"><span class="mdi mdi-account-box-outline icon icon-white"></span></div>
                            <div class="cell-lg-5 veil reveal-lg-block cell-lg-push-1 text-lg-left">
                                <h2><span class="big">Докладчик</span></h2>
                            </div>
                            <div class="offset-top-0 offset-sm-top-10 cell-lg-5 offset-lg-top-0 small cell-lg-push-3 text-lg-right">
                                <ul class="list-inline list-inline-dashed p">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li>Team Member v2
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <svg class="svg-triangle-bottom" xmlns="https://www.w3.org/2000/svg" version="1.1">
                        <defs>
                            <lineargradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color:rgb(110,192,161);stop-opacity:1;"></stop>
                                <stop offset="100%" style="stop-color:rgb(111,193,156);stop-opacity:1;"></stop>
                            </lineargradient>
                        </defs>
                        <polyline points="0,0 60,0 29,29" fill="url(#grad1)"></polyline>
                    </svg>
                </section>
            <main class="page-content">
                @yield('content')
            </main>
            @include('site.layouts.footer')
        </div>

        <!-- Scripts -->
{{--        <script src="{{ mix('js/app.js') }}"></script>--}}
        <script src="{{ asset('js/core.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <!-- <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> -->
        @yield('scripts')
    </body>
</html>
