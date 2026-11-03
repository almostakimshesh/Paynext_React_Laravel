@extends('layouts.app')
@section('title', 'Dashboard')
@section('subtitle')Welcome back, {{ auth()->user()->name }}! Here's your earning overview.@endsection
@section('content')
@php $u = auth()->user(); @endphp
<div class="pn_grid g4">
    <x-stat icon="fa-coins" label="Total Points" :value="number_format($u->points)" :note="'+'.number_format($todayPoints).' today'" />
    <x-stat icon="fa-dollar-sign" label="USD Balance" :value="'$'.number_format($u->balance, 2)" note="Available" />
    <x-stat icon="fa-clock" label="Pending" :value="'$'.number_format($u->pending_balance, 2)" note="Processing" />
    <x-stat icon="fa-user-group" label="Referral Earnings" :value="number_format($referralPoints).' pts'" :note="$referralCount.' referrals'" />
</div>
<div class="pn_card">
    <h4>Recent Activity <a href="{{ route('transactions') }}" style="font-size:14px">View all</a></h4>
    @forelse ($recent as $tx)
        @if ($loop->first)<ul class="pn_list">@endif
        <li><span>{{ $tx->description }}</span>
            <em class="{{ $tx->status === 'rejected' ? 'down' : '' }}">{{ $tx->display() }}</em></li>
        @if ($loop->last)</ul>@endif
    @empty
        <p class="mb-0">No activity yet. Start earning!</p>
    @endforelse
</div>
@endsection
