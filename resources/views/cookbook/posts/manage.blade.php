@extends('layouts.app')

@section('title', 'My Cookbook')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light pb-4">My Cookbook</h2>
        <a href="{{ route('cookbook.posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Create New Post
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($posts->isEmpty())
    <div class="card border border-info shadow-sm text-center">
        <div class="card-body">
            <i class="fas fa-book fa-3x mb-3 text-muted"></i>
            <h5 class="card-title">No Posts Yet</h5>
            <p class="card-text">Start sharing your cooking experiences with the community!</p>
            <a href="{{ route('cookbook.posts.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Create Your First Post
            </a>
        </div>
    </div>
    @else
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-6 mb-4">
            <div class="card h-100 border border-info shadow-sm"
                style="background: linear-gradient(45deg, #ff6b6b, #ff9f43); transition: transform 0.3s ease;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->description, 150) }}</p>

                    @if($post->image)
                    <div class="text-center mb-3" style="height: 150px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-100 h-100 rounded"
                            style="object-fit: cover;" alt="Post image">
                    </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Posted {{ $post->created_at->diffForHumans() }}
                        </small>
                        <span class="badge bg-primary rounded-pill">
                            <i class="fas fa-comments"></i> {{ $post->all_comments_count }}
                        </span>
                    </div>
                </div>

                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('cookbook.posts.show', $post->id) }}" class="btn btn-light">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <div class="btn-group gap-2">
                        <a href="{{ route('cookbook.posts.edit', $post->id) }}" class="btn btn-light">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('cookbook.posts.destroy', $post->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light text-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
    @endif
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
    }

    .btn-light {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
    }

    .btn-light:hover {
        background-color: rgba(255, 255, 255, 1);
        transform: translateY(-2px);
    }
</style>
@endsection