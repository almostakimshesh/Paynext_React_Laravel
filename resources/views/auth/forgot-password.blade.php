@extends('layouts.auth')
@section('title', 'Forgot password?')
@section('subtitle', 'Enter your email and we will send you a reset link.')
@section('content')
<form method="POST" action="{{ route('password.email') }}" novalidate>
    @csrf
    <div class="pn_field"><label for="email">Email</label>
        <input class="pn_input" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus></div>
    <button class="pn_btn">Send Reset Link</button>
</form>
@endsection
@section('footer')<a href="{{ route('login') }}"><i class="fa-solid fa-arrow-left"></i> Back to login</a>@endsection
