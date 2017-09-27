<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>@yield('title') | Образ</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @yield('css')

        @yield('js')

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
        @yield('scripts')
    </body>
</html>
