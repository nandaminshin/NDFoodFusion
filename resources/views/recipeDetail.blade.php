@extends('layouts.app')

@section('title', $recipe->name)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card recipe-detail-card shadow-lg">
                <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('images/homeDesign.jpg') }}"
                    class="card-img-top recipe-detail-img" alt="{{ $recipe->name }}">
                <div class="card-body">
                    <h2 class="card-title mb-3">{{ $recipe->name }}</h2>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user me-2"></i>
                            <span>By {{ $recipe->user->full_name }}</span>
                        </div>
                        <span class="badge bg-primary px-3 py-2">{{ $recipe->category->name }}</span>
                    </div>
                    <p class="card-text">{{ $recipe->description }}</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('recipes.download', $recipe) }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-download me-2"></i>Download Recipe Card
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .recipe-detail-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        background: linear-gradient(45deg, #ff6b6b, #ff9f43);
        color: white;
    }

    .recipe-detail-img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .recipe-detail-img {
            height: 250px;
        }
    }

    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .btn-lg:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection