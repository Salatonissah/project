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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text" style="color: black;">
                        <h6>KCA Bookshop</h6>
                        <h2>Search, &amp; Get Empowered</h2>
                        <h3>With the increasing adoption of digital solutions in educational institutions, there is a pressing need for an automated Bookshop Management System to streamline operations, enhance accuracy, and improve customer service.</h3>
                        <div class="buttons">
                            <div class="border-button">
                                <a href="{{ route('resources') }}"><strong>Explore</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <div class="categories-collections">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Explore Some of Our <em>Books</em> In Store.</h2>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="owl-collection owl-carousel">
                                    <div class="item">
                                        <img src="assets/images/book4.jpg" alt="">
                                        <div class="down-content">
                                            <h4>How to Program for Beginners</h4>
                                            <span class="collection">Items In Collection:<br><strong>310/340</strong></span>
                                            <span class="category">Category:<br><strong>Programming</strong></span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/book1.jpg" alt="">
                                        <div class="down-content">
                                            <h4>Journey to the End of the World</h4>
                                            <span class="collection">Items In Collection:<br><strong>324/324</strong></span>
                                            <span class="category">Category:<br><strong>Philosophy</strong></span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/book5.jpg" alt="">
                                        <div class="down-content">
                                            <h4>Harry Porter</h4>
                                            <span class="collection">Items In Collection:<br><strong>380/394</strong></span>
                                            <span class="category">Category:<br><strong>Novels</strong></span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/book3.jpg" alt="">
                                        <div class="down-content">
                                            <h4>The Obstacle is the Way</h4>
                                            <span class="collection">Items In Collection:<br><strong>426/468</strong></span>
                                            <span class="category">Category:<br><strong>Critical Thinking</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="create-nft">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>What we Have to offer at KCA Bookshop</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-button">
                        <a href="#">Back to top</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item first-item">
                        <div class="number">
                            <h6>1</h6>
                        </div>
                        <div class="icon">
                            <img src="assets/images/icon-02.png" alt="">
                        </div>
                        <h4>Set Up Your Profile</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item second-item">
                        <div class="number">
                            <h6>2</h6>
                        </div>
                        <div class="icon">
                            <img src="assets/images/icon-04.png" alt="">
                        </div>
                        <h4>Choose a book of your liking</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="icon">
                            <img src="assets/images/icon-06.png" alt="">
                        </div>
                        <h4>Purchase Your Book &amp; Read</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>