@extends('layouts.auth')
@section('title', 'Welcome back')
@section('subtitle', 'Log in to your Paynext account.')
@section('content')
<form method="POST" action="{{ url('/login') }}" novalidate>
    @csrf
    <div class="pn_field"><label for="email">Email</label>
        <input class="pn_input" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required autofocus></div>
    <div class="pn_field"><label for="password">Password</label>
        <input class="pn_input" id="password" name="password" type="password" placeholder="Your password" autocomplete="current-password" required></div>
    <div class="pn_row">
        <label class="mb-0"><input type="checkbox" name="remember" value="1"> Remember me</label>
        <a href="{{ route('password.request') }}">Forgot password?</a>
    </div>
    <button class="pn_btn">Log In</button>
</form>
@endsection
@section('footer')New to Paynext? <a href="{{ route('register') }}">Create an account</a>@endsection
