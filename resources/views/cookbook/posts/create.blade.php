@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-info shadow-sm">
                <div class="card-header text-white" style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                    <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Create New Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('cookbook.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" placeholder="Enter your post title">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="6"
                                placeholder="Share your cooking experience...">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">Image (Optional)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Max file size: 30MB. Supported formats: JPG, PNG, GIF</div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-lg text-white"
                                style="background: linear-gradient(45deg, #ff6b6b, #ff9f43); transition: all 0.3s ease;">
                                <i class="fas fa-paper-plane me-2"></i>Share Post
                            </button>
                            <a href="{{ route('cookbook') }}" class="btn btn-lg btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection