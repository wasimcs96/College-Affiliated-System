<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>  @yield('title') </title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">



<!-- PWA -->
<link rel="shortcut icon" href="/assets/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="./src/nav.css">
<!-- /PWA -->
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
    .browsedicipline{
        border-radius: 0px;
         width: 15rem;
         height: 11rem;
          background-color: #edf3f6;
           margin: 1px;
            z-index:0;
             border-radius: inherit
    }
        /* sidebar css */
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #fa7304;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
/* sidebar css */

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .hide-on-desktop{
        display: none !important;
    }
    .display-flex{
        display: flex !important;
    }

}
/* Desktop and large devices (landscape tablets, 768px and up) */
@media only screen and (max-width: 768px) {
    .hide-on-mobile{
        display: none !important;
    }
    .dicipline{
        width:80% !important;

    }
    .diciplineblock{
        width: 7rem !important;
        height: 9rem !important;
    }
    .fontdicipline{
        font-size: 70% !important;
    }
    .milestonewidth{
            width: 50%;
    }
    .setposition{
        position: relative !important;
    }
    .backgroundcolor{
        background-color: #323c4f!important;
    }
    .ullist{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .footer-area:before {
    position: absolute !important;
    content: ''!important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background-size: cover !important;
    background-position: center !important;
    opacity: 1 !important;
}
    .centertext{
        text-align: center!important;
    }
    .pageslinkcolor{
        color: #fa7304 !important;
    }

    .tablefont{
        font-size: 12px !important;
    }
    .paddinganchor{
        padding: 3.90625vw !important;
    }
}

        /* PWA CSS */
        .nav123 {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}
.imran:hover{
        background-color: #10417a !important;
        color:#fa7304;
}
.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 3.5807291666666665vw;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    color: #fa7304;
}

.nav__icon {
    font-size: 18px;
}
/* PWA CSS */


        .tabbe {
        float: left;
        /* border: 1px solid #ccc; */
        background-color: #f1f1f1;
        width: 30%;
        height: 300px;
        }


        .tabbe button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 10px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        font-size: 17px;
        }

        .tabbe button:hover {
        background-color: #ddd;
        }


        .tabbe button.active {
        background-color: #fff;
        border-left-style: solid;
        border-color: #073975;
        }
</style>
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
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1jKOFLhfQoZD3xJISSPnSW9-4SyYPpjY&callback=initAutocomplete&libraries=places&v=weekly"
    defer
  ></script>

  <script>
    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    let placeSearch;
    let autocomplete;
    const componentForm = {
      street_number: "short_name",
      route: "long_name",
      locality: "long_name",
      administrative_area_level_1: "short_name",
      country: "long_name",
      postal_code: "short_name",
    };

    function initAutocomplete() {
      // Create the autocomplete object, restricting the search predictions to
      // geographical location types.
      autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("autocomplete"),
        { types: ["geocode"] }
      );
      // Avoid paying for data that you don't need by restricting the set of
      // place fields that are returned to just the address components.
      autocomplete.setFields(["address_component"]);
      // When the user selects an address from the drop-down, populate the
      // address fields in the form.
      autocomplete.addListener("place_changed", fillInAddress);
    }

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      const place = autocomplete.getPlace();

      for (const component in componentForm) {
        document.getElementById(component).value = "";
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details,
      // and then fill-in the corresponding field on the form.
      for (const component of place.address_components) {
        const addressType = component.types[0];

        if (componentForm[addressType]) {
          const val = component[componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
          const geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          const circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy,
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }
  </script>
    @yield('per_page_style')
    {{-- <script src="https://kit.fontawesome.com/d8864c88b6.js" crossorigin="anonymous"></script> --}}
</head>
<body class="p-0" id="customsvg" style="background-image: url('{{ asset('frontEnd/assets/images/bg222.png')}}');">

<!-- sidebar html -->
<div id="mySidenav" class="sidenav" style="z-index:100;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Demo1</a>
  <a href="#">Demo2</a>
  <a href="#">Demo3</a>
  <a href="#">Demo4</a>
</div>



<!-- /sidebar html -->

<!-- PWA  -->
<nav class="nav123 hide-on-desktop" style="z-index:2;">
        <a href="{{route('front')}}"  class="imran nav__link  {{ (request()->segment(1) == '127.0.0.1:8000') ? 'nav__link--active' : '' }}">
            <i class="material-icons nav__icon">home</i>
            <span class="nav__text">Home</span>
        </a>

        <a href="{{route('consultant_all')}}" class="nav__link {{ (request()->segment(1) == 'consultant') ? 'nav__link--active' : '' }} imran">
            <i class="material-icons nav__icon">supervisor_account</i>
            <span class="nav__text">Consultant</span>
        </a>
        @if(Auth()->user())
        @if(Auth()->user()->isAdmin())
    <a href="{{ route('admin.dashboard') }}" class="nav__link imran">
        <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a>
        @endif

        @if(Auth()->user()->isConsultant())
        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
        @if(auth()->user()->Subscription_expire_date<$mytime || auth()->user()->Subscription_expire_date==NULL)
        <a @if(auth()->user()->add_university == 0)
             href="javascript:void(0);" data-toggle="modal" data-target ="#addUniversityModal"
            @else
             href="{{ route('consultant.subscription') }}"
             @endif
             class="nav__link imran">
             <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a>
        @else
    <a href="{{ route('consultant.dashboard') }}"  class="nav__link imran">
        <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a>
        @endif
       @endif

        @if(Auth()->user()->isClient())
    <a href="{{ route('client.dashboard') }}"  class="nav__link imran">
            <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a></a>
        @endif

        @if(Auth()->user()->isUniversity())
        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
        @if(auth()->user()->Subscription_expire_date<$mytime || auth()->user()->Subscription_expire_date==NULL)
        <a href="{{ route('university.subscription') }}"  class="nav__link imran">
            <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a>
        @else
       <a href="{{ route('university.dashboard') }}"  class="nav__link imran">
        <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a>
        @endif
        @endif

        @if(Auth()->user()->isSubadmin())
        <a href="{{ route('subadmin.dashboard') }}"  class="nav__link imran">
            <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
    </a>
            @endif

        @else
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#loginPopupForm" class="nav__link imran">
            <i class="material-icons nav__icon">login</i>
            <span class="nav__text">Login</span>
        </a>
        @endif

        <a href="{{route('university_all')}}" class="nav__link  {{ (request()->segment(1) == 'university') ? 'nav__link--active' : '' }} imran">
            <i class="material-icons nav__icon">school</i>
            <span class="nav__text">Find university</span>
        </a>

        <!-- <button href="#" type="button" class="nav__link imran" onclick="openNav()" disabled style="border: none;background:none;" >
            <i class="material-icons nav__icon">more</i>
            <span class="nav__text" style="cursor:pointer" >More</span>
        </button> -->
    </nav>
<!-- /PWA -->

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



<section class="footer-area section-bg padding-top-100px padding-bottom-30px backgroundcolor">
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
            <div class="col-lg-3 responsive-column hide-on-mobile">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Popular Country</h4>
                    <ul class="list-items list--items" style="margin-left: 17px;">

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

                        <li>
                            <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                <input type="hidden" name="countries_id" value="99">
                                @csrf <a><button style="
                                border: none;   color: #5d646d; background-color: transparent;"  type="submit">India</button></a> </form>
                                </li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column hide-on-mobile">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Blogs</h4>
                    <ul class="list-items list--items">
                        <?php $footer_blogs=App\Models\Blog::take(6)->orderBy('Updated_at','DESC')->get() ?>
                        @if($footer_blogs->count()>0)
                        @foreach($footer_blogs as $footer_blog)
                        <?php
                        $myfooterblog =$footer_blog->title ?? '';
                        if (strlen($myfooterblog) > 5)
                            {
                                $myfooterblog = substr($myfooterblog, 0, 30);
                                $myfooterblog = explode(' ',$myfooterblog);
                                array_pop($myfooterblog); // remove last word from array
                                $myfooterblog = implode(' ',$myfooterblog);
                                // $myvalue = $myvalue . ' ...';
                            } ?>

                        <li><a href="{{route('blog_detail',['id'=>$footer_blog->id])}}"> <?php echo ($myfooterblog . '...')?></a></li>
                        @endforeach
                        @else
                        Unavailable
@endif
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="hide-on-desktop col-lg-3 responsive-column">
                <div class="footer-item">
                <div class="form-content ">
                        <div class="contact-form-action">
                            <form action="{{route('front.contact.store')}}" method="post" class="row">
                                @csrf
                                <h2 class="sec__title" style="color: white;/* text-align: center; */margin: auto;">Contact us</h2>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="pageslinkcolor label-text">Your Name</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" name="user_name" placeholder="Your name" required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text pageslinkcolor">Your Email</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input class="form-control" type="email" name="email" placeholder="Email address"  required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text pageslinkcolor">Message</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea class="message-control form-control" name="message" placeholder="Write message"  required></textarea>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                {{-- <div class="col-lg-12">
                                    <div class="input-box">
                                        <div class="recapcha-box pb-4 d-flex align-items-center">
                                            <label class="label-text flex-shrink-0 mr-3 mb-0">What is? 3 + 5 =</label>
                                            <input class="form-control" type="text" name="text" placeholder="Type answer">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 --> --}}
                                <div class="col-lg-12">
                                    <div class="btn-box text-center" style="font-size: small;">
                                        <button type="submit" class="theme-btn">Send Message</button>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div><!-- end footer-item -->
            </div>
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px hide-on-mobile" data-text="curvs">Get in touch</h4>
                    <ul class="list-items list--items">
                        {{-- <li><a href="#">Book a consultant</a></li> --}}
                        <li class="hide-on-mobile"><a href="{{route('contact')}}">Contact Us</a></li>

                        <li class="hide-on-mobile"><a href="{{route('Prmigration')}}">PR/ Migration</a></li>
                        {{-- <li><a href="#">Track Application</a></li> --}}
                        <li class="hide-on-mobile">Download App</li>
                        <li class="centertext"><a href="#" ><img style="    width: 105px;" src="{{ asset('frontEnd/assets/images/app-store.png') }}" alt=""></a>
                        <a href="#"><img style="    width: 105px;" src="{{ asset('frontEnd/assets/images/google-play.png') }}" alt="">
                        </a></li>

                    </ul>
                </div><!-- end footer-item -->
            </div>


            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="hide-on-mobile title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Pages</h4>
                    <ul class="ullist list-items list--items">
                        <li><a class="pageslinkcolor" href="{{route('faq.front')}}">FAQ</a></li>

                        <li><a class="pageslinkcolor" href="{{route('loan')}}">Loan</a></li>
                        {{-- <li><a class="pageslinkcolor" href="{{route('blog_all')}}">Blog</a></li> --}}
                        <li><a class="pageslinkcolor" href="{{route('about')}}">About Us</a></li>
                        <li><a class="pageslinkcolor" href="{{route('privacy&policy')}}">Privacy and Policy</a></li>
                        <li><a class="pageslinkcolor" href="{{route('terms&condition')}}">Terms and Condition</a></li>


                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        {{-- <div class="row align-items-center">
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
        </div><!-- end row --> --}}
    </div><!-- end container -->
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        <!-- &copy; Copyright &#169; 2020. Made with  <span class="la la-heart"></span> -->
                        &copy;All Rights reserve by Campusinterest  &#169;   <span class="la la-heart"></span>
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
    <lottie-player src="{{asset('frontEnd/assets/json/34115-rocket-lunch.json')}}"  background="transparent"  speed="1"  style="width: 5rem; height: 5rem;"  loop  autoplay></lottie-player>
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
<!-- sidebar script -->

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<!-- /sidebar script -->
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
                        // window.location.reload();
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

  <script>
       var university_id='';

$(document).on('click', '#universitySubmit', function ()
{

var university_id=$('#university').val();
console.log(university_id);
if( university_id == '')
{
$('#universityError').append('<span style="color:red">*This field is required</span></strong>')
}
else
{

$.ajaxSetup({headers:
{
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
type: "post",
url: "{{route('consultant.modal.university')}}",
data: {university_id:university_id},
success: function (result) {
console.log('success');
// alert('Follow Up created Successfully');
location="consultant/services/subscription/add";
// window.location.reload();
}
});


// $('#followUpModal').modal('hide');
// document.getElementById("basic-form6").reset();
}
});


</script>
<script>
    var university_id='';

    $(document).on('click', '#skip', function ()
    {
    var university_id=$('#university').val();
    console.log(university_id);
    $.ajaxSetup({headers:
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    type: "post",
    url: "{{route('consultant.university.skip')}}",
    data: {university_id:university_id},
    success: function (result) {
    console.log('success');
    // alert('Follow Up created Successfully');
    window.location.reload();
    }
    });

    });
  </script>
 <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tabbelinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
<script>
    $(document).on('click', '#loginSubmit', function ()
    {
    var email=$('#email').val();
    var password=$('#password').val();
    if(email=='' || password=='')
    {
        if(email=='')
        {
        $('#emptyEmail').html('<span style="color: red;">*Please enter email.</span> ');
        document.getElementById("login-form").reset();
        }
        else
        {
        $('#emptyPassword').html('<span style="color: red;">*Please enter password.</span> ');
        document.getElementById("login-form").reset();
        }
    }

    else
    {
    $.ajaxSetup({headers:
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    type: "post",
    url: "{{route('login.check')}}",
    data: {email:email},
    success: function (result) {
    console.log(JSON.parse(result));

    if(JSON.parse(result)==false)
    {
        $('#loginTop').html('<span style="color: red;">(Your Account is Deactivated. Please Contact to Admin for Details.)</span> ');
    }
    else{
    $('#login-form').submit();
    }

    }
    });
}
    });
  </script>
  <script>
    $(document).on('click', '#closeLoginForm', function ()
    {
        document.getElementById("login-form").reset();
    });
  </script>


@yield('per_page_script')
</body>

</html>


