<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="#"><i class="la la-phone mr-1"></i>(123) 123-456</a></li>
                                <li><a href="#"><i class="la la-envelope mr-1"></i>educationportal@example.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <div class="header-right-action">
                                <div class="select-contain select--contain w-auto">
                                    <select class="select-contain-select">
                                        <?php $ip = '31.220.50.163';
                                        $data = \Location::get($ip); ?>
                                        @php  $countries=DB::table('countries')->get();
                                        @endphp
                                        @foreach ($countries as $country)
                                        <option data-content='<span class="flag-icon flag-icon-{{strtolower($country->countries_iso_code)}} mr-1"></span> {{$country->countries_name}}' <?php if ($data->countryName == $country->countries_name) {
                                            echo 'selected';
                                        } ?>>{{$country->countries_name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            {{-- <div class="header-right-action">
                                <div class="select-contain select--contain w-auto">
                                    <select class="select-contain-select">
                                        <option value="1">AED</option>
                                        <option value="2">AUD</option>
                                        <option value="3">BRL</option>
                                        <option value="4">CAD</option>
                                        <option value="5">CHF</option>
                                        <option value="6">CNY</option>
                                        <option value="7">EUR</option>
                                        <option value="8">GBP</option>
                                        <option value="9">HKD</option>
                                        <option value="10">IDR</option>
                                        <option value="11">INR</option>
                                        <option value="12">JPY</option>
                                        <option value="13">KRW</option>
                                        <option value="14">MYR</option>
                                        <option value="15">NZD</option>
                                        <option value="16">PHP</option>
                                        <option value="17">PLN</option>
                                        <option value="18">RUB</option>
                                        <option value="19">SAR</option>
                                        <option value="20">SGD</option>
                                        <option value="21">THB</option>
                                        <option value="22">TRY</option>
                                        <option value="23">TWD</option>
                                        <option value="24" selected>USD</option>
                                        <option value="25">VND</option>
                                        <option value="26">MXN</option>
                                        <option value="27">ARS</option>
                                        <option value="28">INR</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="header-right-action">
                                @if(Auth()->User())
                                <a class="theme-btn theme-btn-small" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>


@else

                                <a href="#" class="theme-btn theme-btn-small theme-btn-transparent mr-1" data-toggle="modal" data-target="#registerModal">Sign Up</a>
                                 <a href="#" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#loginPopupForm">Login</a>
                            @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('frontEnd/assets/images/education-portal.png') }}" alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        Home
                                    </li>
                                    <li>
                                        <a href="#">Services <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="index.html">Courses</a></li>
                                            <li><a href="index2.html">Universities</a></li>
                                            <li><a href="index3.html">Consultants</a></li>
                                            {{-- <li><a href="index4.html">Home - Car</a></li>
                                            <li><a href="index5.html">Home - Cruise</a></li>
                                            <li><a href="index6.html">Home - Flight</a></li> --}}
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">B.Tech <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="tour-fullwidth.html">Streams</a></li>
                                            <li><a href="tour-grid.html">Colleges</a></li>
                                            <li><a href="tour-list.html">Courses</a></li>
                                            <li><a href="tour-left-sidebar.html">Consultants</a></li>
                                            <li><a href="tour-right-sidebar.html">Book a Consultant</a></li>
                                            {{-- <li><a href="tour-details.html">Tour details</a></li>
                                            <li><a href="tour-booking.html">Tour Booking</a></li>
                                            <li><a href="tour-search-result.html">Tour Search Result</a></li> --}}
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">MBA <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="cruises.html"></a></li>
                                            <li><a href="cruises-list.html">Streams</a></li>
                                            <li><a href="cruise-sidebar.html">Colleges</a></li>
                                            <li><a href="cruise-details.html">Courses</a></li>
                                            <li><a href="cruise-booking.html">Consultants</a></li>
                                            <li><a href="cruise-search-result.html">Book a Consultant</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">MBBS <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="cruises.html"></a></li>
                                            <li><a href="cruises-list.html">Streams</a></li>
                                            <li><a href="cruise-sidebar.html">Colleges</a></li>
                                            <li><a href="cruise-details.html">Courses</a></li>
                                            <li><a href="cruise-booking.html">Consultants</a></li>
                                            <li><a href="cruise-search-result.html">Book a Consultant</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Study Abroad <i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <li><a href="add-hotel.html">Study Abroad<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-flight.html">Courses Abroad <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-tour.html">Colleges in Abroad<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-cruise.html">Consultants in Abroad<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-car.html">Search Colleges<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="user-dashboard.html">Visa Rules</a></li>
                                                        <li><a href="admin-dashboard.html">How to book a consultant</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-8 mega-menu-item">
                                                    <ul>
                                                        <li><a href="user-profile.html">Search Colleges in Abroad</a></li>
                                                        <li><a href="become-local-expert.html">Search Universities in Abroad</a></li>
                                                        <li><a href="contact.html">Search Courses to study in Abroad</a></li>
                                                        <li><a href="cart.html">MBBS in Foreign Universities</a></li>
                                                        <li><a href="checkout.html">B.Tech in Foreign Universities</a></li>
                                                        <li><a href="recover.html">B.Design in Foreign Universities</a></li>
                                                        <li><a href="payment-received.html">Book a Consultant to Study in Abroad</a></li>
                                                    </ul>
                                                </li>
                                                {{-- <li class="col-lg-3 mega-menu-item">
                                                    <ul>
                                                        <li><a href="payment-complete.html">payment complete</a></li>
                                                        <li><a href="destinations.html">Destinations</a></li>
                                                        <li><a href="about.html">about</a></li>
                                                        <li><a href="services.html">Our Services</a></li>
                                                        <li><a href="gallery.html">Gallery</a></li>
                                                        <li><a href="pricing.html">pricing</a></li>
                                                        <li><a href="faq.html">faq</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 mega-menu-item">
                                                    <ul>
                                                        <li><a href="add-new-post.html">add new post <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="blog-full-width.html">blog full width</a></li>
                                                        <li><a href="blog-grid.html">blog grid</a></li>
                                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                        <li><a href="blog-single.html">blog details</a></li>
                                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                                        <li><a href="page-404.html">404 page</a></li>
                                                    </ul>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">Law <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            {{-- <li><a href="flight-grid.html">Flight grid</a></li>
                                            <li><a href="flight-list.html">Flight list</a></li>
                                            <li><a href="flight-sidebar.html">Flight sidebar </a></li>
                                            <li><a href="flight-single.html">Flight details</a></li>
                                            <li><a href="flight-booking.html">Flight Booking</a></li>
                                            <li><a href="flight-search-result.html">Flight Search Result</a></li> --}}
                                            <li><a href="cruises.html"></a></li>
                                            <li><a href="cruises-list.html">Streams</a></li>
                                            <li><a href="cruise-sidebar.html">Colleges</a></li>
                                            <li><a href="cruise-details.html">Courses</a></li>
                                            <li><a href="cruise-booking.html">Consultants</a></li>
                                            <li><a href="cruise-search-result.html">Book a Consultant</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Science <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            {{-- <li><a href="hotel-grid.html">Hotel grid</a></li>
                                            <li><a href="hotel-list.html">Hotel list</a></li>
                                            <li><a href="hotel-sidebar.html">Hotel sidebar </a></li>
                                            <li><a href="hotel-single.html">Hotel details</a></li>
                                            <li><a href="hotel-booking.html">Hotel Booking</a></li>
                                            <li><a href="hotel-search-result.html">Hotel Search Result</a></li> --}}
                                            <li><a href="cruises.html"></a></li>
                                            <li><a href="cruises-list.html">Streams</a></li>
                                            <li><a href="cruise-sidebar.html">Colleges</a></li>
                                            <li><a href="cruise-details.html">Courses</a></li>
                                            <li><a href="cruise-booking.html">Consultants</a></li>
                                            <li><a href="cruise-search-result.html">Book a Consultant</a></li>
                                            <li>
                                                <a href="#">More Options <i class="la la-plus"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="cruises-list.html">Streams</a></li>
                                            <li><a href="cruise-sidebar.html">Colleges</a></li>
                                            <li><a href="cruise-details.html">Courses</a></li>
                                            <li><a href="cruise-booking.html">Consultants</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Commerce <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="cruises.html"></a></li>
                                            <li><a href="cruises-list.html">Streams</a></li>
                                            <li><a href="cruise-sidebar.html">Colleges</a></li>
                                            <li><a href="cruise-details.html">Courses</a></li>
                                            <li><a href="cruise-booking.html">Consultants</a></li>
                                            <li><a href="cruise-search-result.html">Book a Consultant</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-btn">
                            @if(Auth()->user())
                        <a href="{{ route('dashboard.index2') }}" class="theme-btn ">Dashboard</a>
                            @else
                            <a href="become-local-expert.html" class="btn btn-primary">Search Courses</a>

                            @endif
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
