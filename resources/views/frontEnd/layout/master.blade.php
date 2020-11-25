<!doctype html>
<html class="no-js" lang="zxx">


<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> Project - A Gateway to Universities </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontEnd/assets/img/logo/favicon.png') }}">
	<!-- ========== Start Stylesheet ========== -->
	<link href="{{ asset('frontEnd/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/fontawesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/magnific-popup.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/animate.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/bsnav.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/flaticon-set.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/site-animation.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/slick.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/themify-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/swiper.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontEnd/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontEnd/assets/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontEnd/assets/css/demomodal.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('frontEnd/assets/css/resetmodal.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontEnd/assets/css/stylemodal.css') }}" rel="stylesheet" /> --}}


<style>
/*
        .modal-dialog {
          width: 350px;  New width for default modal
        height: 10px;
        } */

body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}
</style>

    @yield('per_page_style')
	<!-- ========== End Stylesheet ========== -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="assets/js/html5/html5shiv.min.js"></script>
	  <script src="assets/js/html5/respond.min.js"></script>
	<![endif]-->

</head>
<body class="demo-1" id="bdy">
    <div class="se-pre-con"></div>
    <div class="clearfix"></div>
@include('frontEnd.layout.modals.loginModal')
@include('frontEnd.layout.modals.registrationModal')
	<main class="main">

        @yield('content')

    </main>
<div class="clearfix"></div>
<!--  data-background=" {{ asset('frontEnd/assets/img/footer/ftr-2-bg.jpg')}}" -->
<footer class="footer-2 footer-shape">
    <div class="footer-circle">
        <img src="{{ asset('frontEnd/assets/img/header/header-shape-2.png') }}" class="hero-circle-1" alt="thumb">
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="footer-widget-wrapper grid-4 de-padding">
                <div class="footer-widget-box ab-us">
                    <h4 class="foo-widget-title">About Us</h4>
                    <p>
                        Consequuntur posuere sint blandit, suscipit nascetur sociis wisi quam repellendus! perspiciatis  iste tempore rutrum.
                    </p>
                    <div class="footer-hours">
                        <ul>
                            <li><i class="fas fa-clock"></i> Opening Hours</li>
                            <li><span>9 am - 5pm</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget-box footer-sub">
                    <h4 class="foo-widget-title">Subscribe</h4>
                    <p>
                        Lorem ipsum dolor sit  consectetur adipisicing elit, sed eiusmotempor incididunt ut labore et
                    </p>
                    <div class="subscribe">
                        <form>
                            <input type="text" placeholder="Type Your Email">
                            <button type="submit"><i class="fas fa-location-arrow"></i></button>
                        </form>
                    </div>
                </div>
                <!-- <div class="footer-widget-box footer-cat">
                    <h4 class="foo-widget-title">Popular Categories</h4>
                    <ul class="foo-list">
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Programming language</a></li>
                        <li><a href="#">History learning online</a></li>
                        <li><a href="#">Shop Page</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                </div> -->
                <div class="footer-widget-box footer-link">
                    <h4 class="foo-widget-title">Useful links</h4>
                    <ul class="foo-list">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <!-- <li><a href="#">Release Status</a></li>
                        <li><a href="#">WordPress</a></li>
                        <li><a href="#">Feedback</a></li> -->
                    </ul>
                </div>
                <div class="footer-widget-box footer-link">
                    <h4 class="foo-widget-title">Gallery</h4>
                    <div class="footer-gallery grid-3">
                        <img src="{{ asset('frontEnd/assets/img/partner/brand-5.jpg') }}" alt="thumb">
                        <img src="{{ asset('frontEnd/assets/img/partner/brand-5.jpg') }}" alt="thumb">
                        <img src="{{ asset('frontEnd/assets/img/partner/brand-5.jpg') }}" alt="thumb">
                        <img src="{{ asset('frontEnd/assets/img/partner/brand-5.jpg') }}" alt="thumb">
                        <img src="{{ asset('frontEnd/assets/img/partner/brand-5.jpg') }}" alt="thumb">
                        <img src="{{ asset('frontEnd/assets/img/partner/brand-5.jpg') }}" alt="thumb">
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>Copyright © 2020. All Rights Reserved.</p>
                <ul class="footer-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer-->


<!-- Start Scroll top
============================================= -->
<a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
<!-- End Scroll top-->


  <!-- jQuery Frameworks
============================================= -->

<script src="{{ asset('frontEnd/assets/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/popper.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.appear.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/html5/html5shiv.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/html5/respond.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.easing.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/progress-bar.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/modernizr.custom.13711.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/wow.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/count-to.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/fontawesome.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/swiper.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/text.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/YTPlayer.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/slick.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/bsnav.min.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.easypiechart.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/main.js')}}"></script>
{{-- <script src="{{ asset('frontEnd/assets/js/mainmodal.js')}}"></script>
<script src="{{ asset('frontEnd/assets/js/placeholdersmodal.min.js')}}"></script> --}}

@yield('per_page_script')

</body>



</html>
