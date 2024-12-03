@extends('layouts.default')

{{-- Title and Content --}}
@section('title', 'Register')
@section('content')

<div class="container vh-100 d-flex justify-content-center align-items-center bg-light">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute top-0 mt-3 w-50 mx-auto" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 mt-3 w-50 mx-auto" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-4 shadow-lg rounded" style="width: 30rem;">
        <h3 class="text-center mb-3 text-success">Create an Account</h3>
        <p class="text-center text-muted mb-4">Sign up to get started with our services.</p>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" name="fullname" required>
                @error('fullname')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Create a password" name="password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">
                    I agree to the <a href="#" class="text-success">terms and conditions</a>.
                </label>
            </div>
            <button type="submit" class="btn btn-success w-100">Sign Up</button>
            <p class="text-center mt-3">
                Already have an account? <a href="{{ route('login') }}" class="text-success">Login here</a>.
            </p>
        </form>
    </div>
</div>

@endsection
