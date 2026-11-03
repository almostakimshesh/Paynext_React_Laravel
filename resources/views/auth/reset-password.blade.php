@extends('layouts.auth')
@section('title', 'Reset password')
@section('subtitle', 'Choose a new password for your account.')
@section('content')
<form method="POST" action="{{ route('password.update') }}" novalidate>
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="pn_field"><label for="email">Email</label>
        <input class="pn_input" id="email" name="email" type="email" value="{{ old('email', $email) }}" required></div>
    <div class="pn_field"><label for="password">New password</label>
        <input class="pn_input" id="password" name="password" type="password" autocomplete="new-password" required></div>
    <div class="pn_field"><label for="password_confirmation">Confirm new password</label>
        <input class="pn_input" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required></div>
    <button class="pn_btn">Reset Password</button>
</form>
@endsection
@section('footer')<a href="{{ route('login') }}">Back to login</a>@endsection
