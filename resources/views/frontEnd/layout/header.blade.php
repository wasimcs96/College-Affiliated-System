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
                                    <a href="{{route('front')}}">Home </a>
                                    </li>
                                    <li>
                                        <a href="#">Courses<i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                    <li><a href="{{route('course_detail')}}">B.Tech<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="{{route('course_detail')}}">MBA <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="{{route('course_detail')}}">MBBS<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="{{route('course_detail')}}">Law<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="{{route('course_detail')}}">Science<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="{{route('course_detail')}}">Commerce</a></li>
                                                        <li><a href="{{route('course_detail')}}">Arts</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-8 mega-menu-item">
                                                    <ul>
                                                        <li><a href="{{route('course_all')}}">Search Courses</a></li>
                                                        <li><a href="{{route('course_all')}}">Search Courses in Abroad</a></li>
                                                        <li><a href="{{route('course_all')}}">Search Courses to study in Abroad</a></li>
                                                        <li><a href="{{route('course_all')}}">Search Courses</a></li>
                                                        <li><a href="{{route('course_all')}}">Search Courses in Abroad</a></li>
                                                        <li><a href="{{route('course_all')}}">Search Courses to study in Abroad</a></li>
                                                        {{-- <li><a href="{{route('consultant_book')}}">Search Consultants </a></li> --}}
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">Consultants <i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <li><a href="{{ route('consultant_all') }}">Search Consultant<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="{{ route('consultant_all') }}">Consultant <span class="badge bg-2 text-white">New</span></a></li>
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

                                            </ul>
                                        </div>
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

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{route('Prmigration')}}">PR/Migration </a>
                                        {{-- <ul class="dropdown-menu-item">
                                            <li><a href="cruises.html">Loan</a></li>
                                            <li><a href="cruises-list.html">Blog</a></li>
                                            <li><a href="cruise-sidebar.html">Contact Us</a></li>
                                            <li><a href="cruise-details.html">About Us</a></li>
                                            <li><a href="cruise-booking.html">Why Us</a></li>
                                            <li><a href="cruise-search-result.html">How to Book a Consultant</a></li>
                                        </ul> --}}
                                    </li>
                                    <li>
                                        <a href="#">More <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="{{route('loan')}}">Loan</a></li>
                                            <li><a href="{{route('blog_all')}}">Blog</a></li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                            <li><a href="{{route('about')}}">About Us</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-btn">

                            @if(Auth()->user())
                            @if(Auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif

                            @if(Auth()->user()->isConsultant())
                        <a href="{{ route('consultant.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif

                            @if(Auth()->user()->isClient())
                        <a href="{{ route('client.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif

                            @if(Auth()->user()->isUniversity())
                        <a href="{{ route('university.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif

                            @if(Auth()->user()->isSubadmin())
                            <a href="{{ route('subadmin.dashboard') }}" class="theme-btn ">Dashboard</a>
                                @endif


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
