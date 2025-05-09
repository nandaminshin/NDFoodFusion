@extends('layouts.app')

@section('title', 'Community Cookbook')

@section('content')
<div class="container-fluid py-4">
    <!-- Mobile Menu Button - Only visible on mobile -->
    <div class="d-md-none mb-3">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="row">
        <!-- Left Sidebar - Hidden on mobile -->
        <div class="col-md-3 d-none d-md-block border-end" style="height: auto">
            <div class="pe-3">
                <!-- Replace the search bar and filter buttons section with this code -->
                <form action="{{ route('cookbook') }}" method="GET" id="searchFilterForm">
                    <!-- Search Bar -->
                    <div class="mb-4 position-relative">
                        <input type="text" class="form-control" placeholder="Search posts..." id="searchPosts"
                            name="search" value="{{ request('search') }}">
                        <button type="submit" class="btn position-absolute top-50 end-0 translate-middle-y me-2"
                            style="background: none; border: none;">
                            <i class="fas fa-search text-muted"></i>
                        </button>
                    </div>

                    <!-- Filter Buttons as Search Forms -->
                    <div class="d-grid gap-2">
                        <form action="{{ route('cookbook') }}" method="GET" class="filter-form w-100">
                            <input type="hidden" name="filter" value="all">
                            <button type="submit"
                                class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2 w-100 {{ request('filter', 'all') === 'all' ? 'active' : '' }}">
                                <i class="fas fa-globe"></i> All Posts
                            </button>
                        </form>

                        <form action="{{ route('cookbook') }}" method="GET" class="filter-form w-100">
                            <input type="hidden" name="filter" value="recent">
                            <button type="submit"
                                class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2 w-100 {{ request('filter') === 'recent' ? 'active' : '' }}">
                                <i class="fas fa-clock"></i> Recent (24h)
                            </button>
                        </form>

                        <form action="{{ route('cookbook') }}" method="GET" class="filter-form w-100">
                            <input type="hidden" name="filter" value="older">
                            <button type="submit"
                                class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2 w-100 {{ request('filter') === 'older' ? 'active' : '' }}">
                                <i class="fas fa-history"></i> Older Posts
                            </button>
                        </form>
                    </div>
                </form>

                <!-- Update the scripts section -->
                @section('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchForm = document.getElementById('searchFilterForm');
                        const searchInput = document.getElementById('searchPosts');

                        // Search functionality with debounce
                        let searchTimeout;
                        searchInput.addEventListener('input', function(e) {
                            clearTimeout(searchTimeout);
                            searchTimeout = setTimeout(() => {
                                searchForm.submit();
                            }, 500); // Wait for 500ms after user stops typing
                        });
                    });
                </script>
                @endsection
            </div>
        </div>

        <!-- Middle Content - News Feed -->
        <div class="col-12 col-md-6">
            <div class="posts-container"
                style="max-height: 90vh; overflow-y: auto; scrollbar-width: none; -ms-overflow-style: none;">
                @if($posts->isEmpty())
                <div class="card border border-info shadow-sm"
                    style="background: linear-gradient(45deg, #ff6b6b, #ff9f43); color: white;">
                    <div class="card-body text-center">
                        <i class="fas fa-utensils fa-3x mb-3"></i>
                        <h5 class="card-title">No Posts Yet</h5>
                        <p class="card-text">Be the first to share your cooking experience!</p>
                        <a href="{{ route('cookbook.posts.create') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-plus-circle"></i> Create First Post
                        </a>
                    </div>
                </div>
                @else
                @foreach($posts as $post)
                <div class="card mb-3 post-card border border-info shadow-sm"
                    style="transition: transform 0.3s ease; background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                    <a href="{{ route('cookbook.posts.show', $post->id) }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->description, 200) }}</p>
                            @if($post->image)
                            <div class="text-center" style="height: 150px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-100 h-100 rounded mb-2"
                                    style="object-fit: cover;" alt="Post image">
                            </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle me-2"></i>
                                    <small class="text-muted">Posted by {{ $post->user->name }} - {{
                                        $post->created_at->diffForHumans() }}</small>
                                </div>
                                <button class="btn btn-sm"
                                    style="background: linear-gradient(45deg, #10052b, #0e00d6); color: white;">
                                    <i class="fas fa-comments"></i> {{ $post->comments_count }}
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
        </div>

        <!-- Right Sidebar - Hidden on mobile -->
        <div class="col-md-3 d-none d-md-block">
            <div class="d-grid gap-3">
                <a href="{{ route('cookbook.posts.create') }}"
                    class="btn btn-lg position-relative overflow-hidden text-white"
                    style="background: linear-gradient(45deg, #ff6b6b, #ff9f43); transition: all 0.3s ease;">
                    <i class="fas fa-plus-circle me-2"></i> Create Post
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(45deg, #ff9f43, #ff6b6b); opacity: 0; transition: opacity 0.3s ease; z-index: 0;">
                    </div>
                </a>
                <a href="{{ route('cookbook.my-posts') }}"
                    class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center gap-2">
                    <i class="fas fa-book"></i> My Cookbook
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu - Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Search and Filters -->
        <form action="{{ route('cookbook') }}" method="GET" id="mobileSearchForm">
            <div class="mb-4">
                <input type="text" class="form-control" placeholder="Search posts..." name="search"
                    value="{{ request('search') }}">
            </div>
            <div class="d-grid gap-2 mb-4">
                <button type="submit" name="filter" value="all"
                    class="btn btn-outline-primary {{ request('filter', 'all') === 'all' ? 'active' : '' }}">
                    <i class="fas fa-globe"></i> All Posts
                </button>
                <button type="submit" name="filter" value="recent"
                    class="btn btn-outline-primary {{ request('filter') === 'recent' ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Recent (24h)
                </button>
                <button type="submit" name="filter" value="older"
                    class="btn btn-outline-primary {{ request('filter') === 'older' ? 'active' : '' }}">
                    <i class="fas fa-history"></i> Older Posts
                </button>
            </div>
        </form>

        <!-- Create and Manage Buttons -->
        <div class="d-grid gap-3">
            <a href="{{ route('cookbook.posts.create') }}" class="btn btn-lg text-white"
                style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                <i class="fas fa-plus-circle me-2"></i> Create Post
            </a>
            <a href="{{ route('cookbook.my-posts') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-book me-2"></i> My Cookbook
            </a>
        </div>
    </div>
</div>

<style>
    .posts-container::-webkit-scrollbar {
        display: none;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn:hover .position-absolute {
        opacity: 1;
    }

    .btn:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .post-card:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }
</style>

@endsection