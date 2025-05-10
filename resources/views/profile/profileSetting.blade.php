@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <div class="d-flex flex-column nav nav-pills">
                        <button class="nav-link active text-start mb-2" id="manage-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#manage-profile" type="button">Manage Profile</button>
                        <button class="nav-link text-start" id="manage-recipes-tab" data-bs-toggle="pill"
                            data-bs-target="#manage-recipes" type="button">Manage Recipes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="tab-content">
                <!-- Manage Profile Section -->
                <div class="tab-pane fade show active" id="manage-profile">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Profile Settings</h4>
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4 text-center">
                                    <div class="position-relative d-inline-block">
                                        @if(Auth::user()->profile_photo)
                                        <img src="{{ Storage::url(Auth::user()->profile_photo) }}"
                                            class="rounded-circle"
                                            style="width: 150px; height: 150px; object-fit: cover;" alt="Profile Photo">
                                        @else
                                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                                            style="width: 150px; height: 150px;">
                                            <span class="text-white" style="font-size: 48px;">{{
                                                strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</span>
                                        </div>
                                        @endif
                                        <label for="profile_photo"
                                            class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-2 cursor-pointer">
                                            <i class="fas fa-camera text-white" style="cursor: pointer;"></i>
                                            <input type="file" id="profile_photo" name="profile_photo" class="d-none"
                                                accept="image/*">
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ Auth::user()->first_name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ Auth::user()->last_name }}" required>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>

                            <!-- Delete Account Section -->
                            <div class="mt-5">
                                <h5 class="text-danger mb-3">Delete Account</h5>
                                <p class="text-muted">Once your account is deleted, all of its resources and data will
                                    be permanently deleted.</p>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccountModal">
                                    Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manage Recipes Section -->
                <div class="tab-pane fade" id="manage-recipes">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h4 class="card-title mb-4">My Recipes</h4>
                            <div class="row g-4">
                                @foreach(Auth::user()->recipes as $recipe)
                                <div class="col-md-6">
                                    <a href="{{ route('recipes.detail', $recipe) }}" class="text-decoration-none">
                                        <div class="card recipe-card h-100 shadow-sm text-light">
                                            <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('images/homeDesign.jpg') }}"
                                                class="card-img-top" alt="{{ $recipe->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $recipe->name }}</h5>
                                                <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="badge bg-primary">{{ $recipe->category->name }}</span>
                                                    <div>
                                                        <a href="{{ route('recipes.edit', $recipe) }}"
                                                            class="btn btn-sm btn-warning me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Please enter your password to confirm account deletion:</p>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .nav-link {
        color: #fff;
    }

    .nav-link:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .nav-link.active {
        background-color: #0d6efd;
    }

    .recipe-card {
        background: linear-gradient(45deg, #ff6b6b, #ff9f43);
        transition: transform 0.3s ease;
    }

    .recipe-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection