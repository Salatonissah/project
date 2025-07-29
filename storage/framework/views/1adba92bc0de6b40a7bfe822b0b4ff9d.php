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

        <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>

<body style="background: url(<?php echo e(asset('assets/images/banner-bg.jpg')); ?>) no-repeat center center fixed; background-size: cover; min-height: 100vh;">

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

    <div class="container py-4" style="min-height: 100vh;">
        <div class="row bg-white rounded shadow mt-5" style="--bs-bg-opacity: 0.95;">
            <!-- Contact Form -->
            <div class="col-lg-7 p-5">
                <form id="contactForm">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label fw-bold">FIRST NAME</label>
                            <input type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col">
                            <label class="form-label fw-bold">LAST NAME</label>
                            <input type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label fw-bold">EMAIL</label>
                            <input type="email" class="form-control" placeholder="" required>
                        </div>
                        <div class="col">
                            <label class="form-label fw-bold">PHONE NUMBER</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">WHAT DO YOU HAVE IN MIND</label>
                        <textarea class="form-control" rows="4" placeholder="Please enter query..." required></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-dark px-5 py-2" style="background:#2d4739; border:none; font-weight:600; font-size:1.2rem;">Submit</button>
                    </div>
                </form>
            </div>
            <!-- Contact Info -->
            <div class="col-lg-5 border-start p-5 d-flex flex-column justify-content-center">
                <h2 class="fw-bold mb-3" style="color: black;">Contact us</h2>
                <div class="mb-3 d-flex align-items-center">
                    <span class="me-3 fs-4"><i class="fa fa-phone"></i></span>
                    <span>+254 7258 5679</span>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <span class="me-3 fs-4"><i class="fa fa-envelope"></i></span>
                    <span>hello@work.com</span>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <span class="me-3 fs-4"><i class="fa fa-map-marker"></i></span>
                    <span>10100, Nairobi Kenya</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark" style="color: #fff;">
          <div class="modal-body text-center py-5">
            <h5 class="modal-title mb-3" id="feedbackModalLabel" style="color: #fff;">We've received your feedback</h5>
            <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">OK</button>
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
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e){
            e.preventDefault();
            var modal = new bootstrap.Modal(document.getElementById('feedbackModal'));
            modal.show();
            this.reset();
        });
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\bookshop-app\resources\views\contact.blade.php ENDPATH**/ ?>