<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/">
{{--<link rel="shortcut icon" href="/img/favicon.ico?v=2" type="image/x-icon"/>--}}
<!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
    <style>
        form label.required:after {
            color: red;
            content: " *";
        }
    </style>
    <!-- end of global styles-->
    @yield('style')
</head>

<body class="sidebar-left-hidden">
<div id="wrap">
    @include('partials.header')
    <div class="wrapper">
        @include('partials.sidebar')
        @yield('content')
    </div>
</div>

<!-- global scripts-->
<script type="text/javascript" src="{{asset('js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<!-- end of global scripts-->
@yield('js')
@include('partials.flash')
</body>
</html>
