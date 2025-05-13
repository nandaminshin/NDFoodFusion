@extends('layouts.app')

@section('title', 'Educational Resources')

@section('content')
<div class="container">
    <h1 class="display-4 fw-bold mb-4 text-light pb-4">Educational Resources</h1>

    <!-- Resource Navigation -->
    <ul class="nav nav-tabs mb-4" id="resourceTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents"
                type="button" role="tab">Downloadable Resources</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="infographics-tab" data-bs-toggle="tab" data-bs-target="#infographics"
                type="button" role="tab">Infographics</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button"
                role="tab">Video Resources</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="resourceTabContent">
        <!-- Downloadable Resources Tab -->
        <div class="tab-pane fade show active" id="documents" role="tabpanel">
            <div class="row g-4">
                <!-- PDF Resource Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-light">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-file-pdf text-danger fs-2 me-3"></i>
                                <h5 class="card-title mb-0">Solar Energy Basics</h5>
                            </div>
                            <p class="card-text">Comprehensive guide about solar energy fundamentals and applications.
                            </p>
                            <a href="{{ asset('storage/resources/solar_basics.pdf') }}"
                                class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                                <i class="bi bi-download me-2"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>

                <!-- PDF Resource Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-light">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-file-pdf text-danger fs-2 me-3"></i>
                                <h5 class="card-title mb-0">Wind Power Guide</h5>
                            </div>
                            <p class="card-text">Detailed overview of wind energy technology and implementation.</p>
                            <a href="{{ asset('storage/resources/wind_energy.pdf') }}"
                                class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                                <i class="bi bi-download me-2"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infographics Tab -->
        <div class="tab-pane fade" id="infographics" role="tabpanel">
            <div class="row g-4">
                <!-- Infographic Card 1 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0 bg-light">
                        <img src="{{ asset('storage/resources/solar-vs-wind.jpg') }}" class="card-img-top p-3"
                            alt="Solar vs Wind Energy Comparison">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Solar vs Wind Energy</h5>
                            <p class="card-text">Comparative analysis of solar and wind energy systems.</p>
                            <a href="{{ asset('storage/resources/solar-vs-wind.jpg') }}"
                                class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                                <i class="bi bi-download me-2"></i>Download Infographic
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Infographic Card 2 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0 bg-light">
                        <img src="{{ asset('storage/resources/energy-efficiency.jpg') }}" class="card-img-top p-3"
                            alt="Energy Efficiency Tips">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Energy Efficiency Tips</h5>
                            <p class="card-text">Visual guide to improving energy efficiency at home.</p>
                            <a href="{{ asset('storage/resources/energy-efficiency.jpg') }}"
                                class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                                <i class="bi bi-download me-2"></i>Download Infographic
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Videos Tab -->
        <div class="tab-pane fade" id="videos" role="tabpanel">
            <div class="row g-4">
                <!-- Video Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-light">
                        <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                            <video controls class="object-fit-cover">
                                <source src="{{ asset('storage/videos/solar.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="card-body bg-white rounded-bottom">
                            <h5 class="card-title fw-bold">Solar Panel Installation</h5>
                            <p class="card-text">Step-by-step guide to installing solar panels.</p>
                            <a href="{{ asset('storage/videos/solar.mp4') }}" class="btn btn-sm w-100 text-white"
                                style="background-color: #FF6B6B;" download>
                                <i class="bi bi-download me-2"></i>Download Video
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Video Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-light">
                        <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                            <video controls class="object-fit-cover">
                                <source src="{{ asset('storage/videos/windmillVillage.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="card-body bg-white rounded-bottom">
                            <h5 class="card-title fw-bold">Wind Turbine Mechanics</h5>
                            <p class="card-text">Understanding how wind turbines generate power.</p>
                            <a href="{{ asset('storage/videos/windmillVillage.mp4') }}"
                                class="btn btn-sm w-100 text-white" style="background-color: #FF6B6B;" download>
                                <i class="bi bi-download me-2"></i>Download Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection