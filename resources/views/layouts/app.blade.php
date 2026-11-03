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
@php
    $me = auth()->user();
    $nav = [
        ['dashboard', 'Overview', 'fa-table-cells-large', 'dashboard'],
        ['offerwalls.index', 'Offerwalls', 'fa-gift', 'offerwalls*'],
        ['tasks.index', 'Tasks', 'fa-list-check', 'tasks*'],
        ['referrals', 'Referrals', 'fa-user-group', 'referrals'],
        ['withdraw', 'Withdraw', 'fa-wallet', 'withdraw*'],
        ['transactions', 'Transactions', 'fa-receipt', 'transactions'],
        ['profile', 'Profile', 'fa-user', 'profile*'],
        ['support', 'Support', 'fa-circle-question', 'support*'],
    ];
    $adminNav = [
        ['admin.withdrawals', 'Withdrawals', 'fa-money-check-dollar', 'admin.withdrawals*'],
        ['admin.users', 'Users', 'fa-users', 'admin.users*'],
        ['admin.tickets', 'Tickets', 'fa-headset', 'admin.tickets*'],
    ];
@endphp
<div class="pn_shell">
    <aside class="pn_sidebar" id="pn_sidebar">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.svg') }}" alt="Paynext"></a>
        @foreach ($nav as [$route, $label, $icon, $match])
            <a class="pn_link {{ request()->routeIs($match) ? 'active' : '' }}" href="{{ route($route) }}"><i class="fa-solid {{ $icon }}"></i>{{ $label }}</a>
        @endforeach
        @if ($me->isAdmin())
            <div class="pn_sec">Admin</div>
            @foreach ($adminNav as [$route, $label, $icon, $match])
                <a class="pn_link {{ request()->routeIs($match) ? 'active' : '' }}" href="{{ route($route) }}"><i class="fa-solid {{ $icon }}"></i>{{ $label }}
                    @if ($route === 'admin.withdrawals' && ($n = \App\Models\Withdrawal::where('status', 'pending')->count()))<span class="pn_count">{{ $n }}</span>@endif
                </a>
            @endforeach
        @endif
        <form method="POST" action="{{ route('logout') }}" class="mt-4">@csrf
            <button class="pn_link" type="submit"><i class="fa-solid fa-right-from-bracket"></i>Sign Out</button>
        </form>
    </aside>
    <div class="pn_main">
        <div class="pn_top">
            <button class="pn_burger" type="button" aria-label="Menu" onclick="document.getElementById('pn_sidebar').classList.toggle('open')"><i class="fa-solid fa-bars"></i></button>
            <h3>@yield('title')</h3>
            <div class="pn_user"><img src="{{ asset('assets/img/avatar_1.webp') }}" alt=""><span>{{ $me->name }}</span></div>
        </div>
        <div class="pn_content">
            <p class="mb-4">@yield('subtitle')</p>
            @include('partials.flash')
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
