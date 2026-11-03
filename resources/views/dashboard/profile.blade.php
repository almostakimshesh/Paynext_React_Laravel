@extends('layouts.app')
@section('title', 'Profile')
@section('subtitle', 'Manage your account')
@section('content')
@php $u = auth()->user(); @endphp
<div class="pn_card">
    <h4>Account Info</h4>
    <form method="POST" action="{{ route('profile.update') }}" novalidate>
        @csrf @method('PUT')
        <div class="pn_field"><label>Email</label><input class="pn_input" value="{{ $u->email }}" readonly></div>
        <div class="pn_field"><label>Full Name</label><input class="pn_input" name="name" value="{{ old('name', $u->name) }}" required></div>
        <div class="pn_field"><label for="referral_code">Referral Code</label>
            <div class="pn_copybox">
                <input class="pn_input" id="referral_code" name="referral_code" value="{{ old('referral_code', $u->referral_code) }}" maxlength="16" required>
                <button type="submit" form="pn_gen" class="pn_btn ghost sm" style="white-space:nowrap" onclick="return confirm('Generate a new random code? Your old referral link will stop working.')"><i class="fa-solid fa-rotate"></i> Generate new</button>
            </div>
            <small>4-16 letters, numbers, dashes or underscores. Changing it changes your referral link.</small>
        </div>
        <div class="pn_field"><label>Your Referral Link</label>
            <div class="pn_copybox"><code id="reflink">{{ $link }}</code>
                <button class="pn_btn ghost sm" type="button" aria-label="Copy" onclick="navigator.clipboard.writeText(document.getElementById('reflink').textContent).then(()=>{this.innerHTML='<i class=&quot;fa-solid fa-check&quot;></i>';setTimeout(()=>this.innerHTML='<i class=&quot;fa-regular fa-copy&quot;></i>',1500)})"><i class="fa-regular fa-copy"></i></button></div></div>
        <div class="pn_field"><label>Status</label><input class="pn_input" value="{{ $u->status }}" readonly></div>
        <hr>
        <p class="mb-3"><b style="color:var(--dk)">Change password</b> (leave blank to keep the current one)</p>
        <div class="pn_field"><label>Current password</label><input class="pn_input" type="password" name="current_password" autocomplete="current-password"></div>
        <div class="pn_field"><label>New password</label><input class="pn_input" type="password" name="password" autocomplete="new-password"></div>
        <div class="pn_field"><label>Confirm new password</label><input class="pn_input" type="password" name="password_confirmation" autocomplete="new-password"></div>
        <button class="pn_btn sm">Save Changes</button>
    </form>
    <form id="pn_gen" method="POST" action="{{ route('profile.referral.generate') }}">@csrf</form>
</div>
@endsection
