<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="Auth::user()">

    <title>@yield('title')</title>

    @yield('script')
    <!-- Styles -->
    @yield('style')
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
</head>
<body class="skin-blue layout-top-nav">
    <div id="app">
        {{--@include('inc.navbar')--}}
        <div class="container">
            <div id="flash-msg">
                @include('flash::message')
            </div>
        </div>
        @include('inc.msg')
        @yield('content')
    </div>

    


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bigslide.js') }}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <!-- search -->
    <script src="{{ asset('search/js/search.js') }}"></script>
    <!-- search end -->

    <script>
    $(document).ready(function() {
        $('.menu-link').bigSlide();
    });
</script>
</body>
</html>