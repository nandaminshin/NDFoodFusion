@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card" style="background-color: #000000; border: none; border-radius: 10px;">
                <div class="card-body p-5">
                    <h2 class="text-center mb-5" style="color: #fff;">Sign Up</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="first_name" class="form-label" style="color: #a8b3cf;">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                id="first_name" name="first_name" value="{{ old('first_name') }}"
                                style="background-color: #2d3548; border: none; color: #fff; padding: 12px;" 
                                required autofocus>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="form-label" style="color: #a8b3cf;">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                id="last_name" name="last_name" value="{{ old('last_name') }}"
                                style="background-color: #2d3548; border: none; color: #fff; padding: 12px;" 
                                required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label" style="color: #a8b3cf;">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}"
                                style="background-color: #2d3548; border: none; color: #fff; padding: 12px;" 
                                required>
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
                            <label for="password_confirmation" class="form-label" style="color: #a8b3cf;">Confirm Password</label>
                            <input type="password" class="form-control" 
                                id="password_confirmation" name="password_confirmation"
                                style="background-color: #2d3548; border: none; color: #fff; padding: 12px;" 
                                required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="background-color: #6366f1; border: none; padding: 12px;">
                                Sign Up
                            </button>
                        </div>

                        <div class="text-center mt-4" style="color: #a8b3cf;">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-info" style="text-decoration: none;">
                                Sign In
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection