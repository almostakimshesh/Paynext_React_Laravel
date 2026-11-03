<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') - {{ config('app.name') }}</title>
<link rel="icon" href="{{ asset('assets/img/favicon.webp') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body class="pn_app">
<div class="pn_auth">
    <div class="pn_auth_side">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.svg') }}" alt="Paynext" height="36"></a>
        <div><h2>Effortless financial solutions for a digital world</h2><p>Secure, smart and seamless payments, all in one place.</p></div>
        <p class="mb-0">&copy; {{ date('Y') }} Paynext</p>
    </div>
    <div class="pn_auth_main">
        <div class="pn_auth_box">
            <h1>@yield('title')</h1>
            <p class="mb-4">@yield('subtitle')</p>
            @include('partials.flash')
            @yield('content')
            <p class="text-center mb-0 mt-4">@yield('footer')</p>
        </div>
    </div>
</div>
</body>
</html>
