<div class="comment-thread">
    <div class="card border-0 mb-3">
        <div class="card-body p-0">
            <!-- Comment Header -->
            <div class="d-flex align-items-center mb-2">
                @if($comment->user && $comment->user->profile_photo)
                <img src="{{ asset('storage/' . $comment->user->profile_photo) }}" class="rounded-circle me-2"
                    alt="{{ $comment->user->first_name }}" width="32" height="32">
                @else
                <i class="fas fa-user-circle me-2"></i>
                @endif
                <div>
                    <div class="fw-bold">{{ $comment->user ? $comment->user->first_name . ' ' .
                        $comment->user->last_name : 'Deleted User' }}</div>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <!-- Comment Content -->
            <p class="mb-2">{{ $comment->content }}</p>

            <!-- Comment Actions -->
            <div class="comment-actions">
                <button onclick="toggleReplyForm({{ $comment->id }})"
                    class="btn btn-sm btn-link text-decoration-none p-0 me-3">
                    <i class="fas fa-reply me-1"></i>Reply
                </button>
            </div>

            <!-- Reply Form -->
            <div class="reply-form" id="reply-form-{{ $comment->id }}">
                <form action="{{ route('cookbook.posts.comments.store', $post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="mb-2">
                        <textarea class="form-control form-control-sm" name="content" rows="2"
                            placeholder="Write a reply..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-paper-plane me-1"></i>Reply
                    </button>
                </form>
            </div>

            <!-- Nested Comments -->
            @if($comment->replies->count() > 0)
            <div class="comment-card">
                @foreach($comment->replies as $reply)
                @include('cookbook.partials.comment', ['comment' => $reply])
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>