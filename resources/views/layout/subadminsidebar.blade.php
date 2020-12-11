<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="index.html"><img src="{{ asset('assets/images/icon.svg') }}" alt="Oculux Logo" class="img-fluid logo"><span>Oculux</span></a>
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
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{auth()->user()->first_name}} </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('pages.profile')}}"><i class="icon-user"></i>My Profile</a></li>
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


                <li class="{{ Request::segment(2) === 'dashboard' ? 'active open' : null }}"><a href="{{route('subadmin.dashboard')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                <li class="{{ Request::segment(2) == 'profile' ? 'active' : null }}"><a href="{{route('subadmin.profile')}}"><i class="icon-user"></i><span>My Profile</span></a></li>

                <li class="{{ Request::segment(2) == 'users' ? 'active open' : null }}"><a href="{{route('subadmin.users')}}"><i class="fa fa-users"></i><span>Users</span></a></li>

                <li class="{{ Request::segment(2) == 'application' ? 'active' : null }}"><a href="{{route('subadmin.application')}}"><i class="icon-notebook"></i><span>Applications</span></a></li>

                <li class="{{ Request::segment(2) == 'booking' ? 'active' : null }}"><a href="{{route('subadmin.booking')}}"><i class="icon-list"></i><span>Bookings</span></a></li>


                {{-- <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="fa fa-gear"></i><span>Generals</span></a></li> --}}
                <li class="{{ Request::segment(2) == 'earnings' ? 'active' : null }}"><a href="{{route('subadmin.earnings')}}"><i class="fa fa-money"></i><span>Earnings</span></a></li>

                <li class="{{ Request::segment(1) === 'about' ? 'active open' : null }}">
                    <a href="#JobPortal" class="has-arrow"><i class="fa fa-gear"></i><span>Generals</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'jobdashboard' ? 'active' : null }}"><a href="{{route('subadmin.general.about')}}">Manage About Us</a></li>
                        {{-- <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.general.contact')}}">Manage Contact Us</a></li> --}}
                        {{-- <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.general.content')}}">Manage Content</a></li> --}}
                        <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.general.terms')}}">Manage Terms & Conditions</a></li>
                        <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.general.privacy_policy')}}">Manage Privacy & Policy</a></li>
                    </ul>
                </li>


                <li class="{{ Request::segment(1) === 'job' ? 'active open' : null }}">
                    <a href="#JobPortal" class="has-arrow"><i class="icon-book-open"></i><span>Reports</span></a>
                    <ul>
                        <li class="{{ Request::segment(1) === 'job' ? 'active open' : null }}">
                            <a href="#JobPortal" class="has-arrow"> <i class="icon-notebook"></i><span>Applications</span></a>
                            <ul>
                                {{-- <li class="{{ Request::segment(2) === 'jobdashboard' ? 'active' : null }}"><a href="{{route('subadmin.report.application.client')}}">clients</a></li>
                                <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.report.application.consultant')}}">Consultant</a></li>
                                <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.report.application.university')}}">University</a></li> --}}

                            </ul>
                        </li>
                        <li class="{{ Request::segment(1) === 'job' ? 'active open' : null }}">
                            <a href="#JobPortal" class="has-arrow"><i class="icon-list"></i><span>Bookings</span></a>
                            <ul>
                                <li class="{{ Request::segment(2) === 'jobdashboard' ? 'active' : null }}"><a href="{{route('subadmin.report.booking.client')}}">Clients</a></li>
                                <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('subadmin.report.booking.consultant')}}">Consultant</a></li>


                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- <li class="{{ Request::segment(1) === 'job' ? 'active open' : null }}">
                    <a href="#JobPortal" class="has-arrow"><i class="icon-envelope-open"></i><span>Email</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'jobdashboard' ? 'active' : null }}"><a href="{{route('job.jobdashboard')}}">Client</a></li>
                        <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('job.positions')}}">Consultant</a></li>
                        <li class="{{ Request::segment(2) === 'applicants' ? 'active' : null }}"><a href="{{route('job.applicants')}}">University</a></li>

                    </ul>
                </li> --}}
                {{-- <li class="{{ Request::segment(1) === 'contact' ? 'active open' : null }}">
                    <a href="#Contact" class="has-arrow"><i class="icon-book-open"></i><span>Contact</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'contact' ? 'active' : null }}"><a href="{{route('contact.contact')}}">List View</a></li>
                        <li class="{{ Request::segment(2) === 'contact2' ? 'active' : null }}"><a href="{{route('contact.contact2')}}">Grid View</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="{{ Request::segment(1) === 'email' ? 'active open' : null }}">
                    <a href="#Contact" class="has-arrow"><i class="icon-drawer"></i><span>Email</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'inbox' ? 'active' : null }}"><a href="{{route('email.inbox')}}">Inbox</a></li>
                        <li class="{{ Request::segment(2) === 'compose' ? 'active' : null }}"><a href="{{route('email.compose')}}">Compose</a></li>
                        <li class="{{ Request::segment(2) === 'inboxdetail' ? 'active' : null }}"><a href="{{route('email.inboxdetail')}}">Inbox Detail</a></li>
                    </ul>
                </li> --}}






            </ul>
        </nav>
    </div>
</div>
