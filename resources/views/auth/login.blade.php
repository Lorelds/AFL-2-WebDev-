{{-- Menggunakan layout 'layouts.auth' (dari Canvas), BUKAN <x-guest-layout> --}}
@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    {{-- Logo --}}
    <div class="text-center mb-4">
        <a href="/">
            {{-- Menggunakan logo dari theme Agency Anda --}}
            <img src="{{ asset('assets/img/navb-logo.png') }}" alt="Site Logo" style="height: 50px;" />
        </a>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            
            {{-- Menampilkan error validasi Bootstrap --}}
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror" 
                   type="password" 
                   name="password" 
                   required autocomplete="current-password" />
            
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>


        <div class="d-flex align-items-center justify-content-between mt-4">
            <div class="small">
                <span class="text-muted">{{ __("Don't have an account yet?") }}</span>
                <a href="{{ route('register') }}" class="ms-1 text-decoration-none">{{ __("Register now") }}</a>
            </div>

            <button type="submit" class="btn btn-primary ms-3">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
@endsection
