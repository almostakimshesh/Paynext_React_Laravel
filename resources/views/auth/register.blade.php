@extends('layouts.auth')
@section('title', 'Create your account')
@section('subtitle', 'Start earning with Paynext in minutes.')
@section('content')
<form method="POST" action="{{ url('/register') }}" novalidate>
    @csrf
    <input type="hidden" name="ref" value="{{ old('ref', $ref ?? '') }}">
    <div class="pn_field"><label for="name">Full name</label>
        <input class="pn_input" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="John Doe" autocomplete="name" required autofocus></div>
    <div class="pn_field"><label for="email">Email</label>
        <input class="pn_input" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required></div>
    <div class="pn_field"><label for="password">Password</label>
        <input class="pn_input" id="password" name="password" type="password" placeholder="At least 8 characters" autocomplete="new-password" required></div>
    <div class="pn_field"><label for="password_confirmation">Confirm password</label>
        <input class="pn_input" id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat password" autocomplete="new-password" required></div>
    @if (old('ref', $ref ?? ''))<p style="font-size:13px">You were invited with referral code <b>{{ old('ref', $ref) }}</b>.</p>@endif
    <button class="pn_btn">Create Account</button>
</form>
@endsection
@section('footer')Already have an account? <a href="{{ route('login') }}">Log in</a>@endsection
