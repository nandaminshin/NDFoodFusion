@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<!-- Hero Section -->
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="display-4 fw-bold mb-4 text-white">Our Story</h1>
            <div class="p-4 bg-white bg-opacity-10 rounded-3 mb-4">
                <p class="lead text-white mb-0">
                    FoodFusion began as a passion project by a group of culinary enthusiasts who believed in the power
                    of food to bring people together. Founded in 2020, our platform has grown into a vibrant community
                    where creativity meets traditional cooking techniques, celebrating the diverse flavors that make our
                    culinary world so rich.
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="position-relative">
                <img src="{{ asset('images/homeDesign.jpg') }}" alt="FoodFusion team"
                    class="img-fluid rounded-3 shadow-lg" style="object-fit: cover; width: 100%; height: 400px;">
                <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-gradient-dark">
                    <p class="text-white mb-0 small">The FoodFusion founding team</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mission Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2 class="text-white mb-4">Our Mission</h2>
            <div class="p-5 bg-white bg-opacity-10 rounded-3 mx-auto" style="max-width: 800px;">
                <p class="lead text-white mb-0">
                    FoodFusion exists to democratize culinary knowledge and inspire home cooks worldwide. We believe
                    that cooking should be accessible to everyone, regardless of skill level or background. Our platform
                    aims to preserve cultural cooking traditions while encouraging innovation and experimentation in the
                    kitchen.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Values Section -->
<div class="container py-5">
    <h2 class="text-white mb-4 text-center">Our Values</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 rounded-3 shadow-lg"
                style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                <div class="card-body text-white text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-heart fa-3x"></i>
                    </div>
                    <h3 class="h4 mb-3">Passion</h3>
                    <p>We're deeply passionate about food and believe that cooking with love creates the most memorable
                        meals. Our community thrives on shared enthusiasm for culinary arts.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 rounded-3 shadow-lg"
                style="background: linear-gradient(45deg, #ff9f43, #ff6b6b);">
                <div class="card-body text-white text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <h3 class="h4 mb-3">Community</h3>
                    <p>Food brings people together. We foster an inclusive space where cooks of all backgrounds can
                        connect, share, and learn from one another.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 rounded-3 shadow-lg"
                style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                <div class="card-body text-white text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-lightbulb fa-3x"></i>
                    </div>
                    <h3 class="h4 mb-3">Innovation</h3>
                    <p>We celebrate creativity in the kitchen. From fusion cuisines to reinvented classics, we encourage
                        experimentation while respecting culinary traditions.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- What We Offer Section -->
<div class="container py-5">
    <h2 class="text-white mb-5 text-center">What We Offer</h2>
    <div class="row g-4 align-items-center">
        <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
            <img src="{{ asset('images/homeDesign.jpg') }}" alt="Recipe collection"
                class="img-fluid rounded-3 shadow-lg" style="object-fit: cover; width: 100%; height: 400px;">
        </div>
        <div class="col-lg-6 order-lg-1">
            <div class="accordion" id="offeringsAccordion">
                <div class="accordion-item bg-transparent border-0 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                            Diverse Recipe Collection
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#offeringsAccordion">
                        <div class="accordion-body bg-white bg-opacity-10 text-white">
                            Access thousands of curated recipes spanning global cuisines, dietary preferences, and skill
                            levels. Our collection grows daily with contributions from our community and professional
                            chefs alike.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent border-0 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" style="background: linear-gradient(45deg, #ff9f43, #ff6b6b);">
                            Interactive Cooking Community
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#offeringsAccordion">
                        <div class="accordion-body bg-white bg-opacity-10 text-white">
                            Connect with fellow food enthusiasts, share your culinary creations, and learn from a
                            diverse community of home cooks and professional chefs from around the world.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent border-0 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree"
                            style="background: linear-gradient(45deg, #ff6b6b, #ff9f43);">
                            Educational Resources
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#offeringsAccordion">
                        <div class="accordion-body bg-white bg-opacity-10 text-white">
                            Enhance your culinary skills with our extensive collection of tutorials, cooking techniques,
                            ingredient guides, and expert tips designed for cooks at every level.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Join Us CTA Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="p-5 rounded-3 text-center"
                style="background: linear-gradient(45deg, rgba(255, 107, 107, 0.3), rgba(255, 159, 67, 0.3));">
                <h2 class="text-white mb-4">Join Our Culinary Journey</h2>
                <p class="lead text-white mb-4">
                    Whether you're looking to expand your recipe collection, improve your cooking skills, or connect
                    with like-minded food enthusiasts, FoodFusion is your home for culinary exploration.
                </p>
                @if (!Auth::check())
                <a href="{{ route('register') }}"
                    class="btn btn-lg px-5 py-3 position-relative overflow-hidden text-white border-2 border-white"
                    style="background: linear-gradient(45deg, #ff6b6b, #ff9f43); transition: all 0.3s ease;">
                    <span class="position-relative z-1">Become a Member</span>
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(45deg, #ff9f43, #ff6b6b); opacity: 0; transition: opacity 0.3s ease; z-index: 0;">
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .accordion-button:not(.collapsed) {
        color: white;
        background: linear-gradient(45deg, #ff6b6b, #ff9f43);
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(255, 255, 255, 0.2);
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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }

        .accordion-button {
            font-size: 1rem;
        }
    }
</style>
@endsection