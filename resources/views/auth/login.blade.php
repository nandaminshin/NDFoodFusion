@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card" style="background-color: #000000; border: none; border-radius: 10px;">
                <div class="card-body p-5">
                    <h2 class="text-center mb-5" style="color: #fff;">Sign In</h2>

                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label" style="color: #a8b3cf;">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}"
                                style="background-color: #2d3548; border: none; color: #fff; padding: 12px;" 
                                required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label" style="color: #a8b3cf;">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" name="password"
                                style="background-color: #2d3548; border: none; color: #fff; padding: 12px;" 
                                required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                    style="background-color: #2d3548; border-color: #a8b3cf;">
                                <label class="form-check-label" for="remember" style="color: #a8b3cf;">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="background-color: #6366f1; border: none; padding: 12px;">
                                Sign In
                            </button>
                        </div>

                        <div class="text-center mt-4" style="color: #a8b3cf;">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-info" style="text-decoration: none;">
                                Sign Up
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection