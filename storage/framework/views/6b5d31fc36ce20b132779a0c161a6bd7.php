<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Bookshop</title>
    <link rel="icon" href="<?php echo e(asset('assets/images/books-stack-of-three.png')); ?>" type="image/png">

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
                        <a href="<?php echo e(route('home')); ?>" class="logo">
                            <img src="<?php echo e(asset('assets/images/books-stack-of-three.png')); ?>" alt="Bookshop Logo" style="height:32px; width:auto;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav mx-auto">
                            <li><a href="<?php echo e(route('resources')); ?>"><strong>Resources</strong></a></li>
                            <li><a href="<?php echo e(route('about')); ?>"><strong>About</strong></a></li>
                            <li><a href="<?php echo e(route('contact')); ?>"><strong>Contact Us</strong></a></li>
                        </ul>
                        <!-- Profile/Logout (Right) -->
                        <ul class="nav ms-auto">
                            <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                            <?php endif; ?>
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
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="list-group" id="resource-tabs" role="tablist">
                        <a class="list-group-item list-group-item-action active py-4 mb-3 text-white" style="background:#292b3a; border-radius:12px; font-size:1.2rem;" id="tab-apartments" data-bs-toggle="list" href="#apartments" role="tab">
                            <span class="me-3"><img src="<?php echo e(asset('assets/images/terminal.png')); ?>" alt="Apartments" style="width:48px;"></span>
                            Programming/Coding
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-food" data-bs-toggle="list" href="#food" role="tab">
                            <span class="me-3"><img src="<?php echo e(asset('assets/images/exam.png')); ?>" alt="Food & Life" style="width:48px;"></span>
                            Past Papers
                        </a>
                        <a class="list-group-item list-group-item-action py-4 mb-3" style="background:#8d99ae; border-radius:12px; font-size:1.2rem; color:#fff;" id="tab-cars" data-bs-toggle="list" href="#cars" role="tab">
                            <span class="me-3"><img src="<?php echo e(asset('assets/images/philosophy.png')); ?>" alt="Cars" style="width:48px;"></span>
                            Philosophy
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
                                                <img src="<?php echo e(asset('assets/images/code1.jfif')); ?>" class="img-fluid rounded-start" alt="Apartment">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2" style="color: black;">Learn to Code</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Real Edmond</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh600 / month included tax</div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="<?php echo e(asset('assets/images/code2.jpg')); ?>" class="img-fluid rounded-start" alt="Apartment 2">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2"  style="color: black;">Simply Coding</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Mark Zuck</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh750 / month included tax</div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="<?php echo e(asset('assets/images/code3.jpg')); ?>" class="img-fluid rounded-start" alt="Apartment 3">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2"  style="color: black;">Programming for enthusiasts</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Enola D.</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh900 / month included tax</div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
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
                                                <img src="<?php echo e(asset('assets/images/exam1.jpg')); ?>" class="img-fluid rounded-start" alt="Food & Life">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2"  style="color: black;">BSD 2304 ADVANCED JAVA</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: KCA University</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh200 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="<?php echo e(asset('assets/images/exam1.jpg')); ?>" class="img-fluid rounded-start" alt="Food & Life 2">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2"  style="color: black;">BSD 2201 NETWORK SCIENCE THEORY</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: KCA University</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh120 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border-radius:16px; position:relative;">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <img src="<?php echo e(asset('assets/images/exam1.jpg')); ?>" class="img-fluid rounded-start" alt="Food & Life 3">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2"  style="color: black;">BISF 3101 MACHINE LEARNING</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: KCA University</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh150 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
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
                                                <img src="<?php echo e(asset('assets/images/lib.jpg')); ?>" class="img-fluid rounded-start" alt="Car">
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center p-4" style="position:relative;">
                                                <h4 class="fw-bold mb-2"  style="color: black;">Navigating through Your Career</h4>
                                                <div class="mb-2" style="color:#8d99ae;">by: Carson James</div>
                                                <div class="mb-2"><i class="fa fa-tag me-2"></i> Ksh750 </div>
                                                <div class="d-flex justify-content-end align-items-end flex-grow-1" style="position:absolute; bottom:1.5rem; right:1.5rem;">
                                                    <a href="<?php echo e(url('/pay')); ?>" class="btn btn-primary rounded-pill px-4">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!-- Add more tabs/content as needed -->
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

</body>

</html><?php /**PATH C:\xampp\htdocs\bookshop-app\resources\views\resources.blade.php ENDPATH**/ ?>