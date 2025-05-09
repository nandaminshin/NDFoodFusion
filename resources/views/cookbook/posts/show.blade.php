@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container py-4">
    <!-- Back Button -->
    <a href="{{ route('cookbook') }}" class="btn btn-outline-primary mb-4">
        <i class="fas fa-arrow-left me-2"></i>Back to Cookbook
    </a>

    <!-- Post Content -->
    <div class="card border border-info shadow-sm mb-4">
        <div class="card-body">
            <h1 class="card-title h2 mb-3">{{ $post->title }}</h1>

            <!-- Author Info -->
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-user-circle fs-4 me-2"></i>
                <div>
                    <div class="fw-bold">{{ $post->user->name }}</div>
                    <small class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <!-- Post Image -->
            @if($post->image)
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded"
                    style="max-height: 400px; width: auto;" alt="Post image">
            </div>
            @endif

            <!-- Post Description -->
            <p class="card-text fs-5">{{ $post->description }}</p>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="comments-section">
        <h3 class="mb-4 text-light">Comments</h3>

        <!-- Comment Form -->
        <div class="card border-info mb-4">
            <div class="card-body">
                <form action="{{ route('cookbook.posts.comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="content" rows="3"
                            placeholder="Share your thoughts..."></textarea>
                    </div>
                    <button type="submit" class="btn text-white"
                        style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                        <i class="fas fa-paper-plane me-2"></i>Post Comment
                    </button>
                </form>
            </div>
        </div>

        <!-- Comments List -->
        <div class="comments-list">
            @foreach($post->comments()->whereNull('parent_id')->latest()->get() as $comment)
            @include('cookbook.partials.comment', ['comment' => $comment])
            @endforeach
        </div>
    </div>
</div>

<style>
    .comment-card {
        border-left: 2px solid #dee2e6;
        margin-left: 2rem;
        padding-left: 1rem;
        margin-bottom: 1rem;
    }

    .comment-actions button {
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
    }

    .reply-form {
        display: none;
        margin-top: 1rem;
    }

    .reply-form.active {
        display: block;
    }
</style>

@push('scripts')
<script>
    function toggleReplyForm(commentId) {
        const replyForm = document.getElementById(`reply-form-${commentId}`);
        if (replyForm) {
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        }
    }

    // Hide all reply forms initially
    document.addEventListener('DOMContentLoaded', function() {
        const replyForms = document.querySelectorAll('.reply-form');
        replyForms.forEach(form => form.style.display = 'none');
    });
</script>
@endpush
@endsection