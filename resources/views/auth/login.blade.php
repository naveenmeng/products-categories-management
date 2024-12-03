@extends('layouts.default')

{{-- Title and Content --}}
@section('title', 'Login')
@section('content')

<div class="container vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="card p-4 shadow-lg rounded" style="width: 28rem;">
        {{-- Success Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Error Message --}}
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h3 class="text-center mb-4">Welcome Back</h3>
        <p class="text-center text-muted mb-4">Please log in to access your account.</p>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">
                <a href="#" class="text-decoration-none">Forgot password?</a>
            </p>
        </form>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-0">Don't have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-primary mt-2 w-100">Sign Up</a>
        </div>
    </div>
</div>

@endsection
