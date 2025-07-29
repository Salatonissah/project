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


    <!-- ***** Resources Section Start ***** -->
    <section class="py-5" style="background: transparent;">
        <div class="container">
            <div class="row">
                <!-- Cart Icon -->
                <div class="container mt-3 d-flex justify-content-end">
                    <a href="{{ url('/cart') }}" class="position-relative" style="text-decoration:none;">
                        <img src="{{ asset('assets/images/online-shopping.png') }}" alt="Cart" style="width:40px; height:40px;">
                        <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.9rem;">
                            {{ session('cart_count', 0) }}
                        </span>
                    </a>
                </div>
                <!-- End Cart Icon -->

                <!-- Sidebar -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="list-group" id="resource-tabs" role="tablist">
                        <a class="list-group-item list-group-item-action active py-4 mb-3 text-white" style="background:#292b3a; border-radius:12px; font-size:1.2rem;" id="tab-apartments" data-bs-toggle="list" href="#apartments" role="tab">
                            <span class="me-3"><img src="{{ asset('assets/images/terminal.png') }}" alt="Apartments" style="width:48px;"></span>
                            Programming/Coding
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-food" data-bs-toggle="list" href="#food" role="tab">
                            <span class="me-3"><img src="{{ asset('assets/images/exam.png') }}" alt="Food & Life" style="width:48px;"></span>
                            Past Papers
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-cars" data-bs-toggle="list" href="#cars" role="tab">
                            <span class="me-3"><img src="{{ asset('assets/images/philosophy.png') }}" alt="Cars" style="width:48px;"></span>
                            Philosophy
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-food" data-bs-toggle="list" href="#food" role="tab">
                            <span class="me-3"><img src="{{ asset('assets/images/skill.png') }}" alt="Food & Life" style="width:48px;"></span>
                            Critical Thinking
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-cars" data-bs-toggle="list" href="#cars" role="tab">
                            <span class="me-3"><img src="{{ asset('assets/images/book.png') }}" alt="Cars" style="width:48px;"></span>
                            Novels
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-critical" data-bs-toggle="list" href="#critical" role="tab">
                            <span class="me-3"><img src="{{ asset('assets/images/skill.png') }}" alt="Critical Thinking" style="width:48px;"></span>
                            Critical Thinking
                        </a>
                    </div>
                </div>
                <!-- Content -->
                <div class="col-lg-9">
                    <div class="tab-content" id="resource-tabs-content">
                        <!-- Apartments Tab -->
                        <div class="tab-pane fade show active" id="apartments" role="tabpanel">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/code1.jfif') }}" class="img-fluid rounded-start" alt="Apartment">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">Learn to Code</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Real Edmond</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh600 / month included tax</div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-1',
                                                            title: 'Learn to Code',
                                                            price: 'Ksh600',
                                                            image: '{{ asset('assets/images/code1.jfif') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/code2.jpg') }}" class="img-fluid rounded-start" alt="Apartment 2">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">Simply Coding</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Mark Zuck</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh750 / month included tax</div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-2',
                                                            title: 'Simply Coding',
                                                            price: 'Ksh750',
                                                            image: '{{ asset('assets/images/code2.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/code3.jpg') }}" class="img-fluid rounded-start" alt="Apartment 3">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">Programming for enthusiasts</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Enola D.</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh900 / month included tax</div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-3',
                                                            title: 'Programming for enthusiasts',
                                                            price: 'Ksh900',
                                                            image: '{{ asset('assets/images/code3.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Food & Life Tab -->
                        <div class="tab-pane fade" id="food" role="tabpanel">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/exam1.jpg') }}" class="img-fluid rounded-start" alt="Food & Life">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">BSD 2304 ADVANCED JAVA</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: KCA University</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh200 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-4',
                                                            title: 'BSD 2304 ADVANCED JAVA',
                                                            price: 'Ksh200',
                                                            image: '{{ asset('assets/images/exam1.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/exam1.jpg') }}" class="img-fluid rounded-start" alt="Food & Life 2">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">BSD 2201 NETWORK SCIENCE THEORY</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: KCA University</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh120 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-5',
                                                            title: 'BSD 2201 NETWORK SCIENCE THEORY',
                                                            price: 'Ksh120',
                                                            image: '{{ asset('assets/images/exam1.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/exam1.jpg') }}" class="img-fluid rounded-start" alt="Food & Life 3">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">BISF 3101 MACHINE LEARNING</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: KCA University</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh150 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-6',
                                                            title: 'BISF 3101 MACHINE LEARNING',
                                                            price: 'Ksh150',
                                                            image: '{{ asset('assets/images/exam1.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Cars Tab -->
                        <div class="tab-pane fade" id="cars" role="tabpanel">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/lib.jpg') }}" class="img-fluid rounded-start" alt="Car">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">Navigating through Your Career</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Carson James</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh750 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-7',
                                                            title: 'Navigating through Your Career',
                                                            price: 'Ksh750',
                                                            image: '{{ asset('assets/images/lib.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more tabs/content as needed -->
                            </div>
                        </div>
                        <!-- Critical Thinking Tab -->
                        <div class="tab-pane fade" id="critical" role="tabpanel">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="{{ asset('assets/images/featured-04.jpg') }}" class="img-fluid rounded-start" alt="Critical Thinking">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                                                <h4 class="fw-bold mb-2" style="color: black;">Critical Thinking Skills</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Skills Academy</div>
                                                <div class="mb-2"><i class="fa fa-lightbulb me-2"></i> Enhance your reasoning and logic</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh550 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1">
                                                    <button
                                                        class="btn btn-primary rounded-pill px-4"
                                                        onclick="addToCart({
                                                            id: 'unique-id-8',
                                                            title: 'Critical Thinking Skills',
                                                            price: 'Ksh550',
                                                            image: '{{ asset('assets/images/featured-04.jpg') }}'
                                                        })"
                                                        type="button"
                                                    >Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more cards as needed -->
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- ***** Resources Section End ***** -->

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript (with Popper for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <!-- 
    <script src="assets/js/tabs.js"></script> -->
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Add this JS to your resources page to handle "Add" button clicks -->
    <script>
        function addToCart(item) {
            fetch("{{ route('cart.add') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: new URLSearchParams(item)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cart-count').innerText = data.cart_count;
                    }
                });
        }
    </script>
    <!-- Example usage for Add button -->
    <!--
    <a href="javascript:void(0)" onclick="addToCart({id:1, title:'Book Title', price:'Ksh550', image:'assets/images/book.png'})" class="btn btn-primary rounded-pill px-4">Add</a>
    -->

</body>

</html>