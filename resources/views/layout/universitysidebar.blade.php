<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{route('front')}}"><img src="{{ asset('assets/images/icon.svg') }}" alt="Education Portal Logo" class="img-fluid logo"><span>Education Portal</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                @if(isset(Auth()->user()->profile_image))
                <img src="{{ asset(Auth()->user()->profile_image) }}" class="user-photo" alt="User Profile Picture" width="40px" height="40px">
                @else
                <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
                @endif            </div>

                {{-- <div class="row"> --}}
             <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>
                    {{-- {{auth()->user()->first_name}}  --}}
                  <?php  $myvalue = auth()->user()->first_name; $arr = explode(' ',trim($myvalue)); echo $arr[0];?>
                </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('university.profile')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form></li>
                </ul>
            </div>
        {{-- </div> --}}
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

                <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : null }}"><a href="{{route('university.dashboard')}}"> <i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                <li class="{{ Request::segment(2) == 'profile' ? 'active' : null }}"><a href="{{route('university.profile')}}"><i class="icon-user"></i><span>My Profile</span></a></li>

                <li class="{{ Request::segment(2) == 'media' ? 'active' : null }}"><a href="{{route('university.media')}}"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Media</span></a></li>

                {{-- <li class="{{ Request::segment(2) === 'index2' ? 'active' : null }}"><a href="{{route('dashboard.index2')}}"><i class="icon-diamond"></i><span>Dashboard</span></a></li> --}}
                <li class="{{ Request::segment(2) == 'students' ? 'active' : null }}"><a href="{{route('university.students')}}"><i class="icon-users"></i><span>Students</span></a></li>
                <li class="{{ Request::segment(2) == 'my_consultants' ? 'active' : null }}"><a href="{{route('university.my_consultants')}}"><i class="icon-user"></i><span>My Consultants</span></a></li>
                {{-- <li class="{{ Request::segment(2) == 'services' ? 'active' : null }}"><a href="{{route('university.services')}}"><i class="icon-speedometer"></i><span>Services</span></a></li> --}}
                <li class="{{ Request::segment(2) == 'courses' ? 'active' : null }}"><a href="{{route('university.courses')}}"><i class="icon-notebook"></i><span>Courses</span></a></li>
                <li class="{{ Request::segment(2) == 'consultants' ? 'active' : null }}"><a href="{{route('university.consultants')}}"><i class="icon-user"></i><span>Consultants Request</span></a></li>
                <li class="{{ Request::segment(2) === 'chat' ? 'active open' : null }}"><a href="{{route('messenger.chat')}}"><i class="icon-bubbles"></i><span>Messenger</span></a></li>
                <li class="{{ Request::segment(2) == 'services' ? 'active open' : null }}">
                    <a href="#services" class="has-arrow"><i class="icon-diamond"></i><span>Services</span></a>
                    <ul>
                    <li class="{{ Request::segment(3) == 'premium' ? 'active' : null }}"><a href="{{ route('university.premium')}}">Go Premium</a></li>
                    <li class="{{ Request::segment(3) == 'subscription' ? 'active' : null }}"><a href="{{ route('university.subscription')}}">Subscription</a></li>

                    <li class="{{ Request::segment(3) == 'advertisements' ? 'active' : null }}"><a href="{{route('university.advertisement')}}"><span>Advertisements</span></a></li>
                     </ul>
                </li>
                <li class="{{ Request::segment(2) == 'privacy_policy' ? 'active' : null }}"><a href="{{route('university.privacy_policy')}}"><i class="fa fa-lock"></i><span>Privacy Policy</span></a></li>
            <li class="{{ Request::segment(2) == 'terms_condition' ? 'active' : null }}"><a href="{{route('university.terms_condition')}}"><i class="fa fa-lock"></i><span>Terms & Conditions</span></a></li>
                <li class="{{ Request::segment(2) == 'contact_us' ? 'active' : null }}"><a href="{{route('university.contact_us')}}"><i class="fa fa-mobile-phone"></i><span>Contact Us</span></a></li>

                <li class="{{ Request::segment(2) == 'logout' ? 'active' : null }}"><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="icon-power"></i> {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form></li>

            </ul>
        </nav>
    </div>
</div>
