<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bookshop</title>
    <link rel="icon" href="{{ asset('assets/images/books-stack-of-three.png') }}" type="image/png">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-liberty-market.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        .about-section {
            padding: 60px 0 40px 0;
        }
        .about-title {
            color: #1e90ff;
            font-weight: bold;
            letter-spacing: 1px;
            font-size: 1rem;
        }
        .about-heading {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }
        .about-list {
            list-style: none;
            padding-left: 0;
        }
        .about-list li {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
        }
        .about-list li .arrow {
            color: #8dc63f;
            font-size: 1.5rem;
            margin-right: 0.7rem;
        }
        .about-carousel img {
            border-radius: 10px;
            object-fit: cover;
            width: 100%;
            height: 340px;
        }
        @media (max-width: 991px) {
            .about-carousel img {
                height: 220px;
            }
        }
    </style>
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <nav class="main-nav d-flex align-items-center justify-content-between">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('assets/images/books-stack-of-three.png') }}" alt="Bookshop Logo" style="height:32px; width:auto;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav mx-auto">
                            <li><a href="{{ route('resources') }}"><strong>Resources</strong></a></li>
                            <li><a href="{{ route('about') }}"><strong>About</strong></a></li>
                            <li><a href="{{ route('contact') }}"><strong>Contact Us</strong></a></li>
                        </ul>
                        <!-- Profile/Logout (Right) -->
                        <ul class="nav ms-auto">
                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endauth
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** About Section Start ***** -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Carousel/Images -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div id="aboutCarousel" class="carousel slide about-carousel" data-bs-ride="carousel" data-bs-interval="3500">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/kca-library.png') }}" class="d-block w-100" alt="KCA Library">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/library.jpg') }}" class="d-block w-100" alt="Library">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Text Content -->
                <div class="col-lg-7">
                    <span class="about-title">ABOUT KCA BOOKSHOP</span>
                    <div class="about-heading mt-2 mb-3">
                        A comprehensive bookshop management solution
                    </div>
                    <p style="font-size:1.1rem;">
                        To develop an efficient, secure, and user-friendly Bookshop Management System for KCA University that enhances operational efficiency and customer satisfaction.
                    </p>
                    <ul class="about-list">
                        <li>To automate inventory management and reduce manual record-keeping errors.</li>
                        <li>To enable real-time tracking of stock levels and sales transactions.</li>
                        <li>To provide an online platform for students and staff to place orders conveniently.</li>
                    </ul>
                    <p style="font-size:1.1rem; margin-top:1.5rem; color:black;">
                        The Bookshop Management System will transform KCA University's bookshop operations by digitizing processes, reducing errors, and enhancing service delivery.<br> This system will improve efficiency, support data-driven decisions, and provide a superior experience for students and staff. By adopting this solution, KCA University will position itself as a leader in leveraging technology for academic resource management.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Section End ***** -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2025 <a href="#"> All rights reserved.
                        &nbsp;&nbsp;
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>