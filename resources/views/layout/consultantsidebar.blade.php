<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{route('front')}}"><img src="{{ asset('assets/images/icon.svg') }}" alt="Education Portal Logo" class="img-fluid logo"><span>Education Portal</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                @if(isset(Auth()->user()->profile_image) && file_exists(Auth()->user()->profile_image))
                <img src="{{ asset(Auth()->user()->profile_image) }}" class="user-photo" alt="User Profile Picture" width="40px" height="40px">
                @else
                <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
             @endif            </div>
            <div class="dropdown" >
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>
                    {{-- {{auth()->user()->first_name}} --}}
                    <?php  $myvalue = auth()->user()->first_name; $arr = explode(' ',trim($myvalue)); echo $arr[0];?>

                </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('consultant.profile')}}"><i class="icon-user"></i>My Profile</a></li>
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
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">


                <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : null }}"><a href="{{route('consultant.dashboard')}}"> <i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                <li class="{{ Request::segment(2) == 'profile' ? 'active' : null }}"><a href="{{route('consultant.profile')}}"><i class="icon-user"></i><span>My Profile</span></a></li>
                <li class="{{ Request::segment(2) == 'students' ? 'active' : null }}"><a href="{{route('consultant.students')}}"><i class="icon-users"></i><span>Students</span></a></li>
                <li class="{{ Request::segment(2) == 'booking' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="fa fa-list"></i><span>Bookings</span></a></li>
                <li class="{{ Request::segment(2) == 'application' ? 'active' : null }}"><a href="{{route('consultant.application')}}"><i class="icon-notebook"></i><span>Application</span></a></li>
                <li class="{{ Request::segment(3) == 'followup' ? 'active' : null }}"><a href="{{route('consultant.application.followup')}}"><i class="icon-notebook"></i><span>Application Follow Up</span></a></li>
                <li class="{{ Request::segment(2) == 'associated_university' ? 'active' : null }}"><a href="{{route('consultant.associated_university')}}"><i class="icon-graduation"></i><span>Associated University</span></a></li>
                <li class="{{ Request::segment(1) === 'messenger' ? 'active open' : null }}"><a href="{{route('messanger')}}"><i class="icon-bubbles"></i><span>Messenger</span></a></li>

                {{-- <li class="{{ Request::segment(2) == 'PR_Migration' ? 'active' : null }}"><a href="{{route('admin.prmigration')}}"><i class="icon-list"></i><span>PR Migration</span></a></li> --}}
                <li class="{{ Request::segment(2) == 'services' ? 'active open' : null }}">
                    <a href="#services" class="has-arrow"><i class="icon-diamond"></i><span>Services</span></a>
                    <ul>
                     <li class="{{ Request::segment(3) == 'premium' ? 'active' : null }}"><a href="{{route('consultant.premium')}}">Go Premium</a></li>
                     <li class="{{ Request::segment(3) == 'subscription' ? 'active' : null }}"><a href="{{route('consultant.subscription')}}">Subscription</a></li>
                     <li class="{{ Request::segment(3) == 'advertisements' ? 'active' : null }}"><a href="{{route('consultant.advertisement')}}">Advertisements</a></li>

                     </ul>
                </li>
                <li class="{{ Request::segment(2) == 'requested_university' ? 'active' : null }}"><a href="{{route('consultant.request_university')}}"><i class="fa fa-university" aria-hidden="true"></i><span>University Request</span></a></li>

                <li class="{{ Request::segment(2) == 'feedback' ? 'active' : null }}"><a href="{{route('consultant.feedback')}}"><i class="icon-bubbles"></i><span>FeedBack</span></a></li>
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
