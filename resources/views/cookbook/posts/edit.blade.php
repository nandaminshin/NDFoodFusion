@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-info shadow-sm"
                 style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">Edit Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cookbook.posts.update', $post->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label text-white">Title</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $post->title) }}" 
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-white">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="5" 
                                      required>{{ old('description', $post->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label text-white">Image</label>
                            @if($post->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" 
                                         class="img-thumbnail" 
                                         alt="Current post image" 
                                         style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            <div class="form-text text-white">Leave empty to keep the current image</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cookbook.my-posts') }}" 
                               class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-light">
                                <i class="fas fa-save"></i> Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-light {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background-color: rgba(255, 255, 255, 1);
        transform: translateY(-2px);
    }

    .form-control {
        border: 1px solid rgba(255, 255, 255, 0.2);
        background-color: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus {
        background-color: rgba(255, 255, 255, 1);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
    }
</style>
@endsection