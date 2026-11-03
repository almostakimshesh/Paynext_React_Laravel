@extends('layouts.app')
@section('title', 'Referrals')
@section('subtitle', 'Invite friends and earn commission')
@section('content')
<div class="pn_card mb-4">
    <h4>Your Referral Link</h4>
    <div class="pn_copybox">
        <code id="reflink">{{ $link }}</code>
        <button class="pn_btn ghost sm" type="button" aria-label="Copy" onclick="navigator.clipboard.writeText(document.getElementById('reflink').textContent).then(()=>{this.innerHTML='<i class=&quot;fa-solid fa-check&quot;></i>';setTimeout(()=>this.innerHTML='<i class=&quot;fa-regular fa-copy&quot;></i>',1500)})"><i class="fa-regular fa-copy"></i></button>
    </div>
    <p class="mt-3 mb-0" style="font-size:14px">You earn {{ number_format(config('earning.signup_bonus')) }} points per signup and {{ config('earning.referral_percent') }}% of the points your referrals earn.</p>
</div>
<div class="pn_grid g2">
    <div class="pn_card text-center"><div class="pn_ico mx-auto"><i class="fa-solid fa-user-group"></i></div><b class="d-block" style="font-size:26px;color:var(--dk)">{{ number_format($count) }}</b>Total Referrals</div>
    <div class="pn_card text-center"><div class="pn_ico mx-auto"><i class="fa-solid fa-user-group"></i></div><b class="d-block" style="font-size:26px;color:var(--dk)">{{ number_format($points) }}</b>Commission Earned (pts)</div>
</div>
@if ($referrals->isNotEmpty())
    <div class="pn_card"><h4>Your Referrals</h4>
        <ul class="pn_list">@foreach ($referrals as $r)<li><span>{{ $r->name }}</span><em>{{ $r->created_at->format('M d, Y') }}</em></li>@endforeach</ul>
    </div>
@endif
@endsection
