<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  @yield('title') </title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">









    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/style.css') }}">
    <style>.cssload-thecube {
        width: 73px;
        height: 73px;
        margin: 0 auto;
        margin-top: 49px;
        position: relative;
        transform: rotateZ(45deg);
    }
    .cssload-thecube .cssload-cube {
        position: relative;
        transform: rotateZ(45deg);
    }
    .cssload-thecube .cssload-cube {
        float: left;
        width: 50%;
        height: 50%;
        position: relative;
        transform: scale(1.1);
    }
    .cssload-thecube .cssload-cube:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(43,160,199);
        animation: cssload-fold-thecube 2.76s infinite linear both;
        transform-origin: 100% 100%;
    }
    .cssload-thecube .cssload-c2 {
        transform: scale(1.1) rotateZ(90deg);
    }
    .cssload-thecube .cssload-c3 {
        transform: scale(1.1) rotateZ(180deg);
    }
    .cssload-thecube .cssload-c4 {
        transform: scale(1.1) rotateZ(270deg);
    }
    .cssload-thecube .cssload-c2:before {
        animation-delay: 0.35s;
    }
    .cssload-thecube .cssload-c3:before {
        animation-delay: 0.69s;
    }
    .cssload-thecube .cssload-c4:before {
        animation-delay: 1.04s;
    }



    @keyframes cssload-fold-thecube {
        0%, 10% {
            transform: perspective(136px) rotateX(-180deg);
            opacity: 0;
        }
        25%,
                    75% {
            transform: perspective(136px) rotateX(0deg);
            opacity: 1;
        }
        90%,
                    100% {
            transform: perspective(136px) rotateY(180deg);
            opacity: 0;
        }
    }</style>
    @yield('per_page_style')
    {{-- <script src="https://kit.fontawesome.com/d8864c88b6.js" crossorigin="anonymous"></script> --}}
</head>
<body>
<!-- start cssload-loader -->
<div class="preloader" id="preloader">
    <div class="loader">
        {{-- <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg> --}}
        <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
        </div>
    </div>
</div>
<!-- end cssload-loader -->

<!-- ================================
            START HEADER AREA
================================= -->
@include('frontEnd.layout.header')


@yield('content')



<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px">
                        <a href="index.html" class="foot__logo"><img src="{{ asset('frontEnd/assets/images/education-portal.png') }}" alt="logo"></a>
                    </div><!-- end logo -->
                    <p class="footer__desc">Morbi convallis bibendum urna ut viverra. Maecenas consequat</p>
                    <ul class="list-items pt-3">
                        <li>3015 Grand Ave, Coconut Grove,<br> Cerrick Way, FL 12345</li>
                        <li>+123-456-789</li>
                        <li><a href="#">educationportal@yourwebsite.com</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 --> --}}
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Popular Country</h4>
                    <ul class="list-items list--items">
                        <li><a href="about.html">China</a></li>
                        <li><a href="services.html">Germany</a></li>
                        <li><a href="#">USA</a></li>
                        <li><a href="blog-grid.html">Canada</a></li>
                        <li><a href="contact.html">Spain</a></li>
                        <li><a href="#">Algeria</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Blogs</h4>
                    <ul class="list-items list--items">
                        <li><a href="#">PR/ Migration</a></li>
                        <li><a href="#">Loans</a></li>
                        <li><a href="#">sdfssdfss</a></li>
                        <li><a href="#">sdfsdfsdf</a></li>
                        <li><a href="#">sdfsdfsdfs</a></li>
                        <li><a href="#">sdfsdfsdfsdf</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Get in touch</h4>
                    <ul class="list-items list--items">
                        <li><a href="#">Book a consultant</a></li>
                        <li><a href="#">Track Application</a></li>
                        <li>Download App</li>
                        <li><a href="#" ><img style="    width: 105px;" src="{{ asset('frontEnd/assets/images/app-store.png') }}" alt=""></a>
                        <a href="#"><img style="    width: 105px;" src="{{ asset('frontEnd/assets/images/google-play.png') }}" alt="">
                        </a></li>

                    </ul>
                </div><!-- end footer-item -->
            </div>

            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">About us</h4>
                    <ul class="list-items list--items">
                        <li><a href="#">Why C.I</a></li>
                        <li><a href="#">Vision & Goals</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">User Agreement</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="term-box footer-item">
                    <ul class="list-items list--items d-flex align-items-center">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-8 -->
             <div class="col-lg-4">
                <div class="footer-social-box text-right">
                    <ul class="social-profile">
                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                        <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        &copy; Copyright &#169; 2020. Made with  <span class="la la-heart"></span>
                        {{-- <span class="la la-heart"></span> by <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a> --}}
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-7 -->
            {{-- <div class="col-lg-5">
                <div class="copy-right-content d-flex align-items-center justify-content-end padding-top-30px">
                    <h3 class="title font-size-15 pr-2">We Accept</h3>
                    <img src="{{ asset('frontEnd/assets/images/payment-img.png') }}" alt="">
                </div><!-- end copy-right-content -->
            </div><!-- end col-lg-5 --> --}}

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- end modal-shared -->

<!-- end modal-popup -->

<!-- end modal-shared -->
@include('frontEnd.modals.loginModal')
@include('frontEnd.modals.registerModal')

{{-- <script src="{{ asset('frontEnd/assets/font_awesome/js/v4-shimss.min.js') }}"></script> --}}

<!-- Template JS Files -->
<script src="{{ asset('frontEnd/assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/daterangepicker.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/animated-headline.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.ripples-min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/quantity-input.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/main.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/installing-software-to-device.json') }}"></script>

@yield('per_page_script')
</body>

</html>

