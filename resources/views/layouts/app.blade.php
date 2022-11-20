<!DOCTYPE html>
<html lang="en">

    <head>
        <title>{{ $pageTitle ?? '' }}</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset ('import/assets/img/favicon.png') }}" rel="icon">
        <link href="{{asset ('import/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset ('import/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{asset ('import/assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{asset ('import/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{asset ('import/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{asset ('import/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{asset ('import/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{asset ('import/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Template Main CSS File -->
        <link href="{{asset ('import/assets/css/style.css') }}" rel="stylesheet">
        @stack('css')
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">

                <h1 class="logo me-auto"><a href="{{ asset('home') }}">MOVY</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="{{asset ('import/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a href="{{asset ('home') }}">Home</a></li>
                        <li class="dropdown"><a href="#"><span>Movies</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{asset ('showtimes') }}">Showtimes</a></li>
                                <li><a href="{{asset ('f&b') }}">F & B</a></li>
                            </ul>
                        </li>
                        <li><a href="{{asset ('membership') }}">Membership</a></li>
                        <li><a href="{{asset ('forum') }}">Forum</a></li>
                        <!--                                                <li><a href="{{asset ('about') }}">About</a></li>
                                                                        <li><a href="{{asset ('contact') }}">Contact</a></li>-->

<!--                                  <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
  <ul>
    <li><a href="#">Drop Down 1</a></li>
    <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
      <ul>
        <li><a href="#">Deep Drop Down 1</a></li>
        <li><a href="#">Deep Drop Down 2</a></li>
        <li><a href="#">Deep Drop Down 3</a></li>
        <li><a href="#">Deep Drop Down 4</a></li>
        <li><a href="#">Deep Drop Down 5</a></li>
      </ul>
    </li>
    <li><a href="#">Drop Down 2</a></li>
    <li><a href="#">Drop Down 3</a></li>
    <li><a href="#">Drop Down 4</a></li>
  </ul>
</li>-->

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

                <a href="" class="orange-btn">Login</a>

            </div>
        </header><!-- End Header -->

        <main id="main">
            @if(!Request::is('home'))
            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    <h2>{{ $title ?? '' }}</h2>
                </div>
            </div>
            <!-- End Breadcrumbs -->
            @endif

            @yield('content')
        </main>

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="logo col-lg-3 col-md-6">
                            <h3>MOVY</h3>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Site Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('home') }}">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('about') }}">About us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('showtimes') }}">Showtimes</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('f&b') }}">Food & Beverages</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('forum') }}">Forum</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Join Us Now</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('membership') }}">Member Specials</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </footer>

        <!--<div id="preloader"></div>-->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        @stack('scripts')
        <script src="{{asset ('import/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{asset ('import/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{asset ('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset ('import/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{asset ('import/assets/vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset ('import/assets/js/main.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    </body>

</html>