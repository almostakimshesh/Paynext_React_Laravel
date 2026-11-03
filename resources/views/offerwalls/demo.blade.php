@extends('layouts.app')
@section('title', $offerwall->name)
@section('subtitle', 'Demo offers: complete them to earn points instantly')
@section('content')
<div class="pn_alert ok" style="display:block">Demo mode is on: these sample offers credit points immediately so you can test the dashboard. Real offers appear here once an admin adds this offerwall's URL. Turn demo mode off with <code>DEMO_OFFERS=false</code>.</div>
<div class="pn_card">
    @foreach ($offers as $key => [$title, $points])
        @php $isDone = in_array('demo-'.$uid.'-'.$key, $done); @endphp
        <div class="pn_ticket">
            <div><b>{{ $title }}</b><small>{{ number_format($points) }} points</small></div>
            @if ($isDone)
                <span class="pn_badge b_ok"><i class="fa-solid fa-check"></i> Completed</span>
            @else
                <form method="POST" action="{{ route('offerwalls.demo.complete', [$offerwall, $key]) }}">@csrf<button class="pn_btn sm">Complete</button></form>
            @endif
        </div>
    @endforeach
</div>
<a class="pn_btn ghost sm mt-3" href="{{ route('offerwalls.index') }}"><i class="fa-solid fa-arrow-left"></i> Back to offerwalls</a>
@endsection
