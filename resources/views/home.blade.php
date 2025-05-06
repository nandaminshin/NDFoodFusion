@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="container py-5">
    <div class="row align-items-center">
        <!-- Text Content Column -->
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="display-4 fw-bold mb-4 text-white">Discover Culinary Creativity</h1>
            <div class="p-4 bg-white bg-opacity-10 rounded-3 mb-4">
                <p class="lead text-white mb-0">
                    Welcome to FoodFusion – where home cooking meets inspiration! Our platform celebrates the joy of
                    creating delicious meals while connecting food enthusiasts worldwide. Whether you're a beginner or
                    seasoned chef, explore diverse recipes, share your creations, and grow your skills in our vibrant
                    community.
                </p>
            </div>
            <h2 class="h3 fw-bold text-white mb-3">Our Mission</h2>
            <div class="p-4 bg-white bg-opacity-10 rounded-3">
                <p class="lead text-white mb-0">
                    FoodFusion empowers home cooks to explore global flavors, preserve culinary traditions, and innovate
                    in their kitchens. We believe everyone deserves access to quality recipes, practical cooking
                    knowledge, and a supportive network that makes cooking enjoyable. Join us in building a world where
                    every meal tells a story!
                </p>
            </div>
            <div class="mt-4">
                @if (Auth::check())
                <span></span>
                @else
                <a href="{{ route('login') }}"
                    class="btn btn-lg px-5 py-3 position-relative overflow-hidden text-white border-2 border-white"
                    style="background: linear-gradient(45deg, #ff6b6b, #ff9f43); transition: all 0.3s ease;">
                    <span class="position-relative z-1">Join Us</span>
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(45deg, #ff9f43, #ff6b6b); opacity: 0; transition: opacity 0.3s ease; z-index: 0;">
                    </div>
                </a>
                @endif
            </div>
        </div>
        <!-- Image Column -->
        <div class="col-lg-6">
            <div class="position-relative">
                <img src="{{ asset('images/homeDesign.jpg') }}" alt="Cooking inspiration"
                    class="img-fluid rounded-3 shadow-lg" style="object-fit: cover; width: 100%; height: 500px;">
                <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-gradient-dark">
                    <p class="text-white mb-0 small">Join our community of food enthusiasts</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Recipes Section -->
<div class="container py-5">
    <h2 class="text-white mb-4">Featured Recipes</h2>
    <div class="row g-4">
        @foreach($featured_recipes as $recipe)
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('recipes.detail', $recipe) }}" class="text-decoration-none">
                <div class="card recipe-card h-100 text-white">
                    <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('images/homeDesign.jpg') }}" 
                         class="card-img-top" 
                         alt="{{ $recipe->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->name }}</h5>
                        <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small>By {{ $recipe->user->full_name }}</small>
                            <span class="badge bg-primary">{{ $recipe->category->name }}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<!-- Culinary Trends Carousel -->
<div class="container py-5">
    <h2 class="text-white mb-4">Culinary Trends</h2>
    <div id="culinaryTrends" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#culinaryTrends" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#culinaryTrends" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#culinaryTrends" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner rounded-3 shadow-lg">
            <div class="carousel-item active">
                <img src="{{ asset('images/homeDesign.jpg') }}" class="d-block w-100" alt="Trend 1"
                    style="height: 400px; object-fit: cover;">
                <div class="carousel-caption">
                    <h3>Plant-Based Revolution</h3>
                    <p>Discover the latest in plant-based cooking</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/homeDesign.jpg') }}" class="d-block w-100" alt="Trend 2"
                    style="height: 400px; object-fit: cover;">
                <div class="carousel-caption">
                    <h3>Global Fusion</h3>
                    <p>Blending culinary traditions from around the world</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/homeDesign.jpg') }}" class="d-block w-100" alt="Trend 3"
                    style="height: 400px; object-fit: cover;">
                <div class="carousel-caption">
                    <h3>Sustainable Cooking</h3>
                    <p>Eco-friendly cooking methods and ingredients</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#culinaryTrends" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#culinaryTrends" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<style>
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

    .carousel-caption {
        background: rgba(0, 0, 0, 0.6);
        border-radius: 10px;
        padding: 20px;
    }

    .card {
        background: linear-gradient(45deg, #ff6b6b, #ff9f43);
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }
</style>


@endsection