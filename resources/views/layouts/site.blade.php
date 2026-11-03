<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('description', 'Paynext - secure, smart and seamless financial solutions')">
<link rel="icon" href="{{ asset('assets/img/favicon.webp') }}">
<title>@yield('title', config('app.name'))</title>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
@include('partials.site-header')
@yield('content')
@include('partials.site-footer')
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slick.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
