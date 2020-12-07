<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="index.html"><img src="{{ asset('assets/images/icon.svg') }}" alt="Oculux Logo" class="img-fluid logo"><span>Oculux</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{auth()->user()->first_name}} </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('consultant.profile')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="{{route('email.inbox')}}"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
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
                <li class="{{ Request::segment(2) == 'students' ? 'active' : null }}"><a href="{{route('consultant.students')}}"><i class="icon-users"></i><span>Students</span></a></li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="fa fa-list"></i><span>Bookings</span></a></li>
                <li class="{{ Request::segment(2) == 'application' ? 'active' : null }}"><a href="{{route('consultant.application')}}"><i class="icon-notebook"></i><span>Application</span></a></li>
                <li class="{{ Request::segment(2) == 'university' ? 'active' : null }}"><a href="{{route('consultant.associated_university')}}"><i class="icon-graduation"></i><span>Associated University</span></a></li>


                <li class="{{ Request::segment(1) == 'services' ? 'active open' : null }}">
                    <a href="#services" class="has-arrow"><i class="icon-diamond"></i><span>Services</span></a>
                    <ul>
                     <li class="{{ Request::segment(2) == 'taskboard' ? 'active' : null }}"><a href="#">Go Premium</a></li>

                     </ul>
                </li>
                <li class="{{ Request::segment(2) == 'universityrequest' ? 'active' : null }}"><a href="{{route('consultant.universityrequest')}}"><i class="icon fa-graduation-cap"></i><span>University Request</span></a></li>
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
