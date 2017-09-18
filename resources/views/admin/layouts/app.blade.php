<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layouts.meta')

    <title>@yield('title') | Панель администратора</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    @yield('css')

    @yield('js')

</head>
    <body>
        <div id="app">
            <!-- Main navbar -->
            @include('admin.partials.nav')
            <!-- /main navbar -->

            {{--@if(!empty($breadcrumbs))--}}
                    {{--@include('partials.breadcrumb')--}}
            {{--@endif--}}

            <div class="page-container">
                    @if (Session::has('success_message'))
                            <div class="alert alert-success">{{ Session::get('success_message') }}</div>
                    @endif

                    {{--@if (Session::has('error_message'))--}}
                            {{--<div class="alert alert-error">{{ Session::get('error_message') }}</div>--}}
                    {{--@endif--}}

                    {{--@if ($errors->any())--}}
                        {{--<div class="alert alert-danger">--}}
                        {{--@foreach( $errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                        {{--</div>--}}
                    {{--@endif--}}
                @yield('content')
            </div>
            @include('admin.layouts.footer')
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/admin.js') }}"></script>
        @yield('scripts')
    </body>
</html>
