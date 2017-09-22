<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <title>@yield('title') | Образ</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('css')

        @yield('js')

    </head>
    <body>
        <div id="app">
            @include('site.layouts.header')
            <div class="container">
                @yield('content')
            </div>
            @include('site.layouts.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
