<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layouts.meta')

    @yield('title')

    @include('admin.layouts.css')

    @yield('css')

    @include('admin.layouts.js')

    @yield('js')

</head>
<body>
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

                @if (Session::has('error_message'))
                        <div class="alert alert-error">{{ Session::get('error_message') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                    @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </div>
                @endif
            @yield('content')
        </div>
        @include('admin.layouts.footer')

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
