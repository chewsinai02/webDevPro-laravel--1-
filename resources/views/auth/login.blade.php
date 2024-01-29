@extends('layouts.app')
@section('content')

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<link rel="stylesheet" href="{{asset('css/login.css')}}">

<div align="center">
<div class="wrapper">
    <div class="form-box login">
        @csrf
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label>Email</label>
            </div>
            <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label  class="form-check-label" for="remember"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember me</label>
                
                @if (Route::has('password.request'))
                <a class="link" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                                
            </div>
            <button type="submit" id="btn">Login</button>
            <div class="login-register">
                <p>Dont't have an account?<a href="{{ route('register') }}" class="register-link">Register</a></p>
            </div>
        </form>
    </div>
</div>
</div>
@endsection