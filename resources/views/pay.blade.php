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
    <!-- ***** Pay Section Start ***** -->
    <div class="container mt-5 pt-5" style="margin-top: 120px !important; padding-top: 60px !important;">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow rounded">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span>ORDER OVERVIEW</span>
                    </div>
                    <div class="card-body">
                        <form id="paymentForm">
                            <div class="mb-3">
                                <label class="form-label">PLEASE SELECT A PAYMENT METHOD</label>
                                <select class="form-select" id="paymentMethod" name="payment_method" required>
                                    <option value="card" selected>Card</option>
                                    <option value="mpesa">Mpesa</option>
                                </select>
                            </div>
                            <!-- Card Payment Fields -->
                            <div id="cardFields">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label">First name</label>
                                        <input type="text" class="form-control" placeholder="John" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Last name</label>
                                        <input type="text" class="form-control" placeholder="Doe" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <label class="form-label">Card number</label>
                                        <input type="text" class="form-control" placeholder="•••• •••• •••• ••••" maxlength="19" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">CVV</label>
                                        <input type="text" class="form-control" placeholder="•••" maxlength="4" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset('assets/images/cards/visa.png') }}" alt="Visa" style="height:32px; width:auto; margin-right:8px;">
                                    <img src="{{ asset('assets/images/cards/mastercard.png') }}" alt="Mastercard" style="height:32px; width:auto; margin-right:8px;">
                                    <img src="{{ asset('assets/images/cards/amex.png') }}" alt="Amex" style="height:32px; width:auto; margin-right:8px;">
                                    <img src="{{ asset('assets/images/cards/discover.png') }}" alt="Discover" style="height:32px; width:auto; margin-right:8px;">
                                    <img src="{{ asset('assets/images/cards/maestro.png') }}" alt="Maestro" style="height:32px; width:auto; margin-right:8px;">
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label class="form-label">Valid until</label>
                                        <select class="form-select" required>
                                            <option value="">Month</option>
                                            @for($m=1;$m<=12;$m++)
                                                <option>{{ sprintf('%02d', $m) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">&nbsp;</label>
                                        <select class="form-select" required>
                                            <option value="">Year</option>
                                            @for($y=date('Y');$y<=date('Y')+12;$y++)
                                                <option>{{ $y }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Mpesa Payment Fields -->
                            <div id="mpesaFields" style="display:none;">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label class="form-label">Country Code</label>
                                        <input type="text" class="form-control" placeholder="+254" maxlength="5" required>
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="7XXXXXXXX" maxlength="12" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-dark px-5">Cancel</button>
                                <button type="submit" class="btn btn-success px-5" id="submitBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Mpesa Modal -->
            <div class="modal fade" id="mpesaModal" tabindex="-1" aria-labelledby="mpesaModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark" style="color: #fff;">
                  <div class="modal-body text-center py-5">
                    <h5 class="modal-title mb-3" id="mpesaModalLabel" style="color: #fff;">Payment in process, check confirmation...</h5>
                    <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">OK</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <!-- ***** Pay Section End ***** -->

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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentMethod = document.getElementById('paymentMethod');
    const cardFields = document.getElementById('cardFields');
    const mpesaFields = document.getElementById('mpesaFields');
    const paymentForm = document.getElementById('paymentForm');
    const submitBtn = document.getElementById('submitBtn');

    function setRequiredOnFields(container, required) {
        Array.from(container.querySelectorAll('input, select')).forEach(el => {
            if (required) {
                el.setAttribute('required', 'required');
            } else {
                el.removeAttribute('required');
            }
        });
    }

    function toggleFields() {
        if (paymentMethod.value === 'mpesa') {
            cardFields.style.display = 'none';
            mpesaFields.style.display = '';
            setRequiredOnFields(cardFields, false);
            setRequiredOnFields(mpesaFields, true);
        } else {
            cardFields.style.display = '';
            mpesaFields.style.display = 'none';
            setRequiredOnFields(cardFields, true);
            setRequiredOnFields(mpesaFields, false);
        }
    }

    paymentMethod.addEventListener('change', toggleFields);
    toggleFields(); // Set initial state

    paymentForm.addEventListener('submit', function(e) {
        if (paymentMethod.value === 'mpesa') {
            e.preventDefault();
            var mpesaModal = new bootstrap.Modal(document.getElementById('mpesaModal'));
            mpesaModal.show();
        }
        // For card, allow normal submit (or handle as needed)
    });
});
</script>

</body>

</html>