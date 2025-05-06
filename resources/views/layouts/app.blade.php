<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - FoodFusion</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Remove Tailwind classes and use only custom CSS classes -->
    <nav class="navbar navbar-expand-lg py-4 navbar-dark" style="background-color: #05070d;">
        <div class="container-fluid">
            <a class="navbar-brand pe-4" href="{{ route('home') }}">FoodFusion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ps-4" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('recipes.index') }}">Recipe Collection</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('cookbook') }}">Community Cookbook</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown px-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Resources
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #131b35c1;">
                            <li>
                                <a class="dropdown-item" href="{{ route('culinary') }}">
                                    Culinary Resources
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('education') }}">
                                    Educational Resources
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    @auth
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;">
                                @if(Auth::user()->profile_photo)
                                <img src="{{ Storage::url(Auth::user()->profile_photo) }}"
                                    class="rounded-circle w-100 h-100" alt="Profile">
                                @else
                                <span class="text-white">{{ strtoupper(substr(Auth::user()->first_name, 0, 1))
                                    }}</span>
                                {{-- <span class="text-white">{{ Auth::user()-> first_name }} {{ Auth::user()->last_name
                                    }}</span> --}}
                                @endif
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark"
                            style="background-color: #131b35c1;">
                            <li><a class="dropdown-item"">Profile Settings</a></li>
                            <li>
                                <hr class=" dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-info text-decoration-none me-3">Sign In</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary"
                        style="background-color: #6366f1; border: none;">Register</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4 min-vh-100" style="background-color: rgb(6, 6, 29)">
        @yield('content')
    </main>

    <footer style="background-color: #05070d;">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">Connect With Us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-pinterest fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <ul class="list-unstyled">
                        <li><button class="btn btn-link text-white-50 p-0" data-bs-toggle="modal"
                                data-bs-target="#privacyModal">Privacy Policy</button></li>
                        <li><button class="btn btn-link text-white-50 p-0" data-bs-toggle="modal"
                                data-bs-target="#termsModal">Terms of Service</button></li>
                        <li><a href="{{ route('contact') }}" class="text-white-50">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                            <button class="btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <p class="text-center text-secondary mb-0">&copy; {{ date('Y') }} FoodFusion. All rights reserved.</p>
        </div>

        <!-- Privacy Policy Modal -->
        <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 class="fw-bold">Information We Collect</h6>
                        <p>We collect information you provide directly to us, including when you create an account, make
                            a
                            purchase, or contact us for support. This may include your name, email address, and payment
                            information.</p>

                        <h6 class="fw-bold mt-4">How We Use Your Information</h6>
                        <p>We use the information we collect to:</p>
                        <ul>
                            <li>Provide and maintain our services</li>
                            <li>Process your transactions</li>
                            <li>Send you updates and marketing communications</li>
                            <li>Improve our services and develop new features</li>
                        </ul>

                        <h6 class="fw-bold mt-4">Cookies and Tracking</h6>
                        <p>We use cookies and similar tracking technologies to track activity on our site and hold
                            certain
                            information to improve your experience.</p>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms of Service Modal -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title" id="termsModalLabel">Terms of Service</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 class="fw-bold">User Agreement</h6>
                        <p>By accessing and using FoodFusion, you agree to these terms and conditions. Our services are
                            provided
                            "as is" and "as available" without warranties of any kind.</p>

                        <h6 class="fw-bold mt-4">User Responsibilities</h6>
                        <p>When using our platform, you agree to:</p>
                        <ul>
                            <li>Provide accurate and complete information</li>
                            <li>Maintain the security of your account</li>
                            <li>Respect intellectual property rights</li>
                            <li>Follow community guidelines</li>
                        </ul>

                        <h6 class="fw-bold mt-4">Content Guidelines</h6>
                        <p>Users are responsible for the content they post. Content must not:</p>
                        <ul>
                            <li>Violate any laws or regulations</li>
                            <li>Infringe on intellectual property rights</li>
                            <li>Contain harmful or malicious code</li>
                            <li>Include inappropriate or offensive material</li>
                        </ul>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cookie Consent -->
        <div class="position-fixed bottom-0 start-0 w-100 bg-dark bg-opacity-90 p-3" id="cookieConsent"
            style="z-index: 1000; display: none;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <p class="text-white mb-md-0">
                            We use cookies to enhance your experience. By continuing to visit this site you agree to our
                            use of
                            cookies.
                            <a href="" class="text-primary">Learn more</a>
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <button class="btn btn-primary me-2" onclick="acceptCookies()">Accept</button>
                        <button class="btn btn-outline-light" onclick="declineCookies()">Decline</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
            if (!localStorage.getItem('cookieConsent')) {
                document.getElementById('cookieConsent').style.display = 'block';
            }
        });
        
        function acceptCookies() {
            localStorage.setItem('cookieConsent', 'accepted');
            document.getElementById('cookieConsent').style.display = 'none';
        }
        
        function declineCookies() {
            localStorage.setItem('cookieConsent', 'declined');
            document.getElementById('cookieConsent').style.display = 'none';
        }
        </script>
    </footer>
</body>

</html>