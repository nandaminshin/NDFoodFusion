@extends('layouts.app')

@section('title', 'Culinary Resources')

@section('content')
<div class="container">
    <h1 class="display-4 fw-bold text-light mb-4 pb-4">Culinary Resources</h1>

    <!-- Navigation Buttons -->
    <div class="d-flex gap-3 mb-4">
        <a href="#videoSection" class="btn btn-primary btn-lg">Video Tutorials</a>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary btn-lg">Recipe Cards</a>
    </div>

    <!-- Video Section -->
    <div id="videoSection" class="mb-5">
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls class="object-fit-cover">
                            <source src="{{ asset('storage/videos/plating.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title fw-bold mb-3">Basic Plating</h5>
                        <a href="{{ asset('storage/videos/plating.mp4') }}" class="btn btn-sm w-100 text-white"
                            style="background-color: #FF6B6B;" download>
                            <i class="bi bi-download me-2"></i>Download Video
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls class="object-fit-cover">
                            <source src="{{ asset('storage/videos/mashpotato.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title fw-bold mb-3">Making Mashed Potato Easy Way</h5>
                        <a href="{{ asset('storage/videos/mashpotato.mp4') }}" class="btn btn-sm w-100 text-white"
                            style="background-color: #FF6B6B;" download>
                            <i class="bi bi-download me-2"></i>Download Video
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls class="object-fit-cover">
                            <source src="{{ asset('storage/videos/sanjiTrueBlueFinSaute.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title fw-bold mb-3">Sanji's True Blue Fin Saute</h5>
                        <a href="{{ asset('storage/videos/sanjiTrueBlueFinSaute.mp4') }}"
                            class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                            <i class="bi bi-download me-2"></i>Download Video
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls class="object-fit-cover">
                            <source src="{{ asset('storage/videos/mashpotato.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title fw-bold mb-3">Making Mashed Potato Easy Way</h5>
                        <a href="{{ asset('storage/videos/mashpotato.mp4') }}" class="btn btn-sm w-100 text-white"
                            style="background-color: #FF6B6B;" download>
                            <i class="bi bi-download me-2"></i>Download Video
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls class="object-fit-cover">
                            <source src="{{ asset('storage/videos/sanjiTrueBlueFinSaute.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title fw-bold mb-3">Sanji's True Blue Fin Saute</h5>
                        <a href="{{ asset('storage/videos/sanjiTrueBlueFinSaute.mp4') }}"
                            class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                            <i class="bi bi-download me-2"></i>Download Video
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls class="object-fit-cover">
                            <source src="{{ asset('storage/videos/plating.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title fw-bold mb-3">Basic Plating</h5>
                        <a href="{{ asset('storage/videos/plating.mp4') }}" class="btn btn-sm w-100 text-white"
                            style="background-color: #FF6B6B;" download>
                            <i class="bi bi-download me-2"></i>Download Video
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection