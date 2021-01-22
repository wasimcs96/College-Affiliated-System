<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->  --}}
    <link rel="icon" href="{{ dd(asset('storage/settings/' . config('get.MAIN_FAVICON'))) }}" type="image/x-icon" rel="icon"/>
    <link href="{{ asset('storage/settings/' . config('get.MAIN_FAVICON')) }}" type="image/x-icon" rel="shortcut icon"/>
    <title>@yield('title') - Education Portal</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
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
    @yield('meta')

    @stack('before-styles')
    {{-- <style>
        .table{
            background-color: #c0c0c0;
        }
    </style> --}}
    {{-- <style>
       td{
            text-align: center;
        }

    </style> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/jquery-ui.css') }}">
    {{--  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1jKOFLhfQoZD3xJISSPnSW9-4SyYPpjY&callback=initAutocomplete&libraries=places&v=weekly"
    defer
    ></script>  --}}
    @stack('after-styles')
    @if (trim($__env->yieldContent('page-styles')))
        @yield('page-styles')
    @endif
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
</head>

<body class="font-montserrat theme-cyan">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

{{-- @include('layout.themesetting') --}}

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    @include('layout.navbar')
    @include('layout.megamenu')
    {{-- @include('layout.searchbar') --}}
    {{-- @include('layout.rightbar') --}}
{{-- @include('includes.alert') --}}
@if(Auth()->User()->isSubAdmin())
    @include('layout.subadminsidebar')
@endif

@if(Auth()->User()->isAdmin())
    @include('layout.adminsidebar')
@endif

@if(Auth()->User()->isConsultant())
    @include('layout.consultantsidebar')
@endif

@if(Auth()->User()->isClient())
   @include('layout.clientsidebar')
@endif

@if(Auth()->User()->isUniversity())
   @include('layout.universitysidebar')
@endif

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12" id="alert_add">
                        <h1>@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front')}}"><i class="icon-home"></i></a></li>
                                @if (trim($__env->yieldContent('parentPageTitle')))
                                    <li class="breadcrumb-item">@yield('parentPageTitle')</li>
                                @endif
                                @if (trim($__env->yieldContent('title2')))
                                    <li class="breadcrumb-item">@yield('title2')</li>
                                @endif
                                @if (trim($__env->yieldContent('title')))
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                @endif
                            </ol>
                        </nav>
                    </div>
                    {{-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <div class="d-flex flex-row-reverse">

                            <select class="custom-select w100 mr-3">
                                <option selected="">India</option>
                                <option value="2">USA</option>
                                <option value="3">Australia</option>
                            </select>
                            <select class="custom-select w150 mr-3">
                                <option value="2">Last 3 Days</option>
                                <option selected="">Last 7 Days</option>
                                <option value="2">Last 15 Days</option>
                                <option value="2">Last 1 Month</option>
                                <option value="2">Last 1 Year</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </div>
            @include('includes.alert')
            @yield('content')
        </div>

    </div>
</div>

<!-- Scripts -->
@stack('before-scripts')
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


<script src="{{ asset('frontEnd/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/jquery.ripples-min.js') }}"></script>
@stack('after-scripts')

@if (trim($__env->yieldContent('page-script')))
    @yield('page-script')
@endif

<!--Start of Tawk.to Script-->
<script type="text/javascript">
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5e44175da89cda5a188591ec/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
