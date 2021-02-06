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
    <style>

    .cssload-thecube {
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
    }
    /* ######################################################################## */
    #customsvg{
        background-image:
        url("data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1004.6 757.4"><path fill="#046FC3"><animate attributeName="d" dur="15000ms" repeatCount="indefinite" calcMode="spline" keySplines="0.3 0 0.7 1; 0.3 0 0.7 1" values="M1391 109.7c0 284.2-107.7 405.3-386.4 405.3-91.5 0-146.7 201.6-239 198-103.2-4.1-42.8-259.1-123.2-259.1S551 569 467.6 569 385.8 268.7 219 211 44.6 80.8 44.6 37c0-284.2 562.9-441.8 841.7-441.8S1391-174.5 1391 109.7z;&#10;&#10;                    M1391 109.7c0 284.2-67.7 355.3-346.4 355.3-91.5 0-166.7 201.6-259 198-103.2-4.1-62.8-209.1-143.2-209.1S521 629 437.6 629 345.8 268.7 179 211 4.6 80.8 4.6 37c0-284.2 602.9-441.8 881.7-441.8S1391-174.5 1391 109.7z;&#10;&#10;                    M1391 109.7c0 284.2-107.7 405.3-386.4 405.3-91.5 0-146.7 201.6-239 198-103.2-4.1-42.8-259.1-123.2-259.1S551 569 467.6 569 385.8 268.7 219 211 44.6 80.8 44.6 37c0-284.2 562.9-441.8 841.7-441.8S1391-174.5 1391 109.7z"/></path><path fill="#04C3B8 "><animate attributeName="d" dur="15000ms" repeatCount="indefinite" calcMode="spline" keySplines="0.3 0 0.7 1; 0.3 0 0.7 1" values="M1345.9 78.1c0 242.7-99.4 358.9-352.3 358.9-83 0-132.2 202.8-215.9 199.7-93.6-3.5-43.9-278.6-116.8-278.6s-100.9 144-176.5 144-57.7-266.5-208.9-315.7-173-118.8-173-156.3c0-242.7 532.8-391.5 785.6-391.5s457.8 196.8 457.8 439.5z;&#10;&#10;                    M1345.9 78.1c0 242.7-47 278.9-299.9 278.9-83 0-164.6 232.8-248.3 229.7-93.6-3.5-53.9-228.6-126.8-228.6s-140.9 204-216.5 204-67.7-326.5-218.9-375.7-173-118.8-173-156.3c0-242.7 572.8-391.5 825.6-391.5s457.8 196.8 457.8 439.5z;&#10;&#10;                    M1345.9 78.1c0 242.7-99.4 358.9-352.3 358.9-83 0-132.2 202.8-215.9 199.7-93.6-3.5-43.9-278.6-116.8-278.6s-100.9 144-176.5 144-57.7-266.5-208.9-315.7-173-118.8-173-156.3c0-242.7 532.8-391.5 785.6-391.5s457.8 196.8 457.8 439.5z"/></path><path fill="#fff"><animate attributeName="d" dur="15000ms" repeatCount="indefinite" calcMode="spline" keySplines="0.3 0 0.7 1; 0.3 0 0.7 1" values="M1287.3 50c0 187.2-72.4 275-293.6 275-72.6 0-130.2 158.4-203.4 156-81.8-2.7-36.7-244-100.5-244s-89.9 140.1-156.1 140.1S483.2 159.9 351 121.9 199.7 41.9 199.7 13c0-187.2 466-302 687.1-302s400.5 151.8 400.5 339z;&#10;&#10;                    M1287.3 50c0 187.2-32.4 225-253.6 225-72.6 0-148.5 208.4-221.7 206-81.8-2.7-58.4-214-122.2-214S559.9 464.1 493.7 464.1 443.2 159.9 311 121.9 159.7 41.9 159.7 13c0-187.2 506-302 727.1-302s400.5 151.8 400.5 339z;&#10;&#10;                    M1287.3 50c0 187.2-72.4 275-293.6 275-72.6 0-130.2 158.4-203.4 156-81.8-2.7-36.7-244-100.5-244s-89.9 140.1-156.1 140.1S483.2 159.9 351 121.9 199.7 41.9 199.7 13c0-187.2 466-302 687.1-302s400.5 151.8 400.5 339z"/></path><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="685.2047" y1="338.6351" x2="807.5057" y2="1110.8137" gradientTransform="matrix(1 0 0 -1 0 758)"><stop offset="0" stop-color="#12afa7"/><stop offset=".473" stop-color="#463277"/></linearGradient><path fill="url(#a)"><animate attributeName="d" dur="15000ms" repeatCount="indefinite" calcMode="spline" keySplines="0.3 0 0.7 1; 0.3 0 0.7 1" values="M981.8 281.4c-72.6 0-110 158-183.3 155.6-81.8-2.7-36.7-244-100.5-244s-89.9 140.1-156 140.1-50.5-217.2-182.8-255.2S208-2.1 208-31c0-187.2 466-302 687.1-302s400.4 151.8 400.4 339-113.6 275.7-334.8 275.7;&#10;&#10;                    M1021.8 231.4c-72.6 0-126.5 176-199.8 173.6-81.8-2.7-60.2-212-124-212S578.1 393.1 512 393.1 451.5 115.9 319.2 77.9 208-2.1 208-31c0-187.2 466-302 687.1-302s400.4 151.8 400.4 339-73.6 225.7-294.8 225.7;&#10;&#10;                    M981.8 281.4c-72.6 0-110 158-183.3 155.6-81.8-2.7-36.7-244-100.5-244s-89.9 140.1-156 140.1-50.5-217.2-182.8-255.2S208-2.1 208-31c0-187.2 466-302 687.1-302s400.4 151.8 400.4 339-113.6 275.7-334.8 275.7"/></path></svg>");
    }


    /* ######################################################################## */

    </style>
    <style>

        .buttonDownload {
            display: inline-block;
            position: relative;
            padding: 5px 22px;
            background-color:  #ff811a;
            color: white;
            font-family: sans-serif;
            text-decoration: none;
            font-size: 0.9em;
            text-align: center;
            text-indent: 15px;
            margin-top: 7px;
            border-radius: 4px;
        }

        .buttonDownload:hover {
            background-color:  #073975;
            color: white;
        }

        .buttonDownload:before, .buttonDownload:after {
            content: ' ';
            display: block;
            position: absolute;
            left: 15px;
            top: 52%;
        }

        /* Download box shape  */
        .buttonDownload:before {
            width: 10px;
            height: 2px;
            border-style: solid;
            border-width: 0 2px 2px;
        }

        /* Download arrow shape */
        .buttonDownload:after {
            width: 0;
            height: 0;
            margin-left: 3px;
            margin-top: -7px;

            border-style: solid;
            border-width: 4px 4px 0 4px;
            border-color: transparent;
            border-top-color: inherit;

            animation: downloadArrow 2s linear infinite;
            animation-play-state: paused;
        }

        .buttonDownload:hover:before {
            border-color: #4CC713;
        }

        .buttonDownload:hover:after {
            border-top-color: #4CC713;
            animation-play-state: running;
        }

        /* keyframes for the download icon anim */
        @keyframes downloadArrow {
            /* 0% and 0.001% keyframes used as a hackish way of having the button frozen on a nice looking frame by default */
            0% {
                margin-top: -7px;
                opacity: 1;
            }

            0.001% {
                margin-top: -15px;
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                margin-top: 0;
                opacity: 0;
            }
        }
    </style>
    <style>


        .capload {
		-webkit-animation: rotation 2s infinite linear;
}

@-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(359deg);
		}
}

    </style>
    @yield('per_page_style')
    {{-- <script src="https://kit.fontawesome.com/d8864c88b6.js" crossorigin="anonymous"></script> --}}
</head>
<body id="customsvg" style="background-image: url('{{ asset('frontEnd/assets/images/bg222.png')}}');">
<!-- start cssload-loader -->
<div class="preloader" id="preloader">
    <div class="loader">
        {{-- <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg> --}}
        <div class="capload">
        <img src="{{asset('frontEnd/assets/images/cap.png')}}" width="200px" height="200px">
        {{-- <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
        </div> --}}
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
                    <ul class="list-items list--items" style="margin-left: 17px;">
                        <li>
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="99">
                                @csrf <a><button style="
                                border: none;   color: #5d646d; background-color: transparent;"  type="submit">India</button></a> </form></li>
                        <li>
                            {{-- <a href="services.html">United States</a> --}}
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="223">
                                @csrf<a> <button style="
                                border: none;  color: #5d646d;  background-color: transparent;" type="submit">United States</button> </a></form>
                        </li>
                        <li>
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="222">
                                @csrf <a><button style="
                                border: none;   color: #5d646d;
                                background-color: transparent;"  type="submit">United Kingdom</button></a> </form>
                        </li>
                        <li>
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="13">
                                @csrf<a> <button style="
                                border: none;  color: #5d646d; background-color: transparent;"  type="submit">Australia</button></a> </form>
                            {{-- <a href="blog-grid.html">Australia</a> --}}
                        </li>
                        <li>
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="38">
                                @csrf <a> <button style="
                                border: none;   position: relative; color: #5d646d; background-color: transparent;"  type="submit">Canada</button></a> </form>
                            {{-- <a href="contact.html">Canada</a> --}}
                        </li>
                        <li>
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="103">
                                @csrf <a> <button style="
                                border: none;background-color: transparent; color: #5d646d;"  type="submit">Ireland</button></a> </form>
                            {{-- <a href="#">Ireland</a> --}}
                        </li>
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
    {{-- <i class="la la-angle-up" title="Go top"></i> --}}
    <div>
    <lottie-player src="{{asset('frontEnd/assets/json/34115-rocket-lunch.json')}}"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>
    </div>
</div>
<!-- end back-to-top -->

<!-- end modal-shared -->

<!-- end modal-popup -->

<!-- end modal-shared -->
@include('frontEnd.modals.loginModal')
@include('frontEnd.modals.registerModal')

{{-- <script src="{{ asset('frontEnd/assets/font_awesome/js/v4-shimss.min.js') }}"></script> --}}

<!-- Template JS Files -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
<script>
    $(function () {
        $('#registerForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            $(".invalid-feedback").children("strong").text("");
            $("#registerForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('register') }}",
                data: formData,
                success: () => window.location.assign("{{ route('front') }}"),
                error: (response) => {
                    if(response.status == 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });
    })
    </script>
    @if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginPopupForm').modal({
            show: true
        });
    });


    </script>
  @endif

@yield('per_page_script')
</body>

</html>

