@extends('layouts.app')

@section('title', 'Recipe Collection')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12 text-center">
            @if(Auth::check())
            <a href="{{ route('recipes.create-new-recipe') }}" class="btn btn-lg btn-gradient position-relative overflow-hidden">
                <span class="d-flex align-items-center">
                    <i class="fas fa-utensils me-2"></i>
                    Share Your Recipe
                </span>
                <div class="position-absolute top-0 start-0 w-100 h-100 shine"></div>
            </a>
            @endif
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('recipes.index', ['category' => 'all']) }}"
            class="btn btn-sm btn-md-normal {{ !request('category') || request('category') == 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
            All
        </a>
        @foreach($categories as $category)
        <a href="{{ route('recipes.index', ['category' => $category->id]) }}"
            class="btn btn-sm btn-md-normal {{ request('category') == $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    <div class="row g-4">
        @foreach($recipes as $recipe)
        <div class="col-md-4 p-4">
            <a href="{{ route('recipes.detail', $recipe) }}" class="text-decoration-none">
                <div class="card recipe-card h-100 shadow-sm text-white">
                    <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('images/homeDesign.jpg') }}"
                        class="card-img-top" alt="{{ $recipe->name }}">
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

    <div class="d-flex justify-content-center mt-4">
        {{ $recipes->links() }}
    </div>
</div>

<style>
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    @media (min-width: 768px) {
        .w-md-auto {
            width: auto !important;
        }

        .btn-md-normal {
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
        }
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

    .btn-gradient {
        background: linear-gradient(45deg, #FF512F, #DD2476);
        color: white;
        border: none;
        padding: 1rem 2rem;
        font-size: 1.25rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        color: white;
    }

    .shine {
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: skewX(-20deg);
        top: -100%;
        left: -100%;
        transition: all 0.6s ease;
        pointer-events: none;
    }

    .btn-gradient:hover .shine {
        top: 100%;
        left: 100%;
    }
</style>
@endsection