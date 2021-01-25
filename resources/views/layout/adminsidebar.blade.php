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
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>

                    {{-- {{auth()->user()->first_name}}  --}}
                    <?php  $myvalue = auth()->user()->first_name; $arr = explode(' ',trim($myvalue)); echo $arr[0];?>

                </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('pages.profile')}}"><i class="icon-user"></i>My Profile</a></li>
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


                <li class="{{ Request::segment(2) == 'dashboard' ? 'active open' : null }}"><a href="{{route('admin.dashboard')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>

                <li class="{{ Request::segment(2) == 'profile' ? 'active' : null }}"><a href="{{route('admin.profile')}}"><i class="icon-user"></i><span>My Profile</span></a></li>

                <li class="{{ Request::segment(2) == 'category' ? 'active' : null }}"><a href="{{route('admin.category')}}"><i class="icon-notebook"></i><span>Categories</span></a></li>

                <li class="{{ Request::segment(2) == 'courses' ? 'active' : null }}"><a href="{{route('admin.courses')}}"><i class="fa fa-book" aria-hidden="true"></i><span>Courses</span></a></li>
                {{-- <li class="{{ Request::segment(2) == 'user' ? 'active' : null }}"><a href="{{route('admin.user.add')}}"><i class="icon-users"></i><span>Add Users</span></a></li> --}}
                <li class="{{ Request::segment(2) == 'users' ? 'active open' : null }}">
                    <a href="#Users" class="has-arrow"><i class="fa fa-users"></i><span>Users</span></a>
                    <ul>
                        {{-- <li class="{{ Request::segment(3) == 'client' ? 'active' : null }}"><a href="{{route('admin.user')}}">Client</a></li> --}}
                        {{-- <li class="{{ Request::segment(3) == 'consultant' ? 'active' : null }}"><a href="{{route('admin.user.consultant')}}">Consultant</a></li>
                        <li class="{{ Request::segment(3) == 'university' ? 'active' : null }}"><a href="{{route('admin.user.university')}}">University</a></li> --}}
                        <li class="{{ Request::segment(3) == '1' ? 'active' : null }}"><a href="{{route('admin.users',['id'=>1])}}">Client</a></li>
                        <li class="{{ Request::segment(3) == '2' ? 'active' : null }}"><a href="{{route('admin.users',['id'=>2])}}">Consultant</a></li>
                        <li class="{{ Request::segment(3) == '3' ? 'active' : null }}"><a href="{{route('admin.users',['id'=>3])}}">University</a></li>
                    </ul>
                </li>
                <li class="{{ Request::segment(2) == 'booking' ? 'active' : null }}"><a href="{{route('admin.booking')}}"><i class="icon-list"></i><span>Bookings</span></a></li>
                <li class="{{ Request::segment(3) == 'follow_up' ? 'active' : null }}"><a href="{{route('admin.booking.followup')}}"><i class="fa fa-list"></i><span>Booking Follow Up</span></a></li>
                <li class="{{ Request::segment(2) == 'application' ? 'active' : null }}"><a href="{{route('admin.application')}}"><i class="icon-notebook"></i><span>Application</span></a></li>
                <li class="{{ Request::segment(3) == 'followup' ? 'active' : null }}"><a href="{{route('admin.application.followup')}}"><i class="fa fa-sticky-note"></i><span>Application Follow Up</span></a></li>
                {{-- <li class="{{ Request::segment(2) == 'PR_Migration' ? 'active' : null }}"><a href="{{route('admin.prmigration')}}"><i class="icon-list"></i><span>PR Migration</span></a></li> --}}

                <li class="{{ Request::segment(2) == 'packages' ? 'active' : null }}"><a href="{{route('admin.packages')}}"><i class="fa fa-archive" aria-hidden="true"></i><span>Packages</span></a></li>

                <li class="{{ Request::segment(2) == 'advertisement' ? 'active' : null }}"><a href="{{route('admin.advertisement_manager')}}"><i class="fa fa-archive" aria-hidden="true"></i><span>Ad Manager</span></a></li>
                <li class="{{ Request::segment(2) == 'commission' ? 'active open' : null }}">
                    <a href="#Commission" class="has-arrow"><i class="fa fa-credit-card"></i><span>Commission Manager</span></a>
                    <ul>
                        <li class="{{ Request::segment(3) == '1' ? 'active' : null }}"><a href="{{route('admin.commission',['id'=>1])}}">Visa Commission</a></li>
                        <li class="{{ Request::segment(3) == '2' ? 'active' : null }}"><a href="{{route('admin.commission',['id'=>2])}}">PR Commission</a></li>
                    </ul>
                </li>
                <li class="{{ Request::segment(2) == 'earning' ? 'active' : null }}"><a href="{{route('admin.earning')}}"><i class="fa fa-money"></i><span>Earnings</span></a></li>
                <li class="{{ Request::segment(2) === 'chat' ? 'active open' : null }}"><a href="{{route('messanger')}}"><i class="icon-bubbles"></i><span>Messenger</span></a></li>


                 {{-- <li class="{{ Request::segment(2) == 'subscription' ? 'active' : null }}"><a href="{{route('admin.subscription')}}"><i class="fa fa-id-badge" aria-hidden="true"></i><span>Subscription</span></a></li> --}}

                <li class="{{ Request::segment(2) == 'general' ? 'active open' : null }}">
                    <a href="#Generals" class="has-arrow"><i class="fa fa-gear"></i><span>Generals</span></a>
                    <ul>
                        <li class="{{ Request::segment(3) == 'faq' ? 'active' : null }}"><a href="{{route('admin.general.faq')}}">Manage FAQ</a></li>
                        <li class="{{ Request::segment(3) == 'about' ? 'active' : null }}"><a href="{{route('admin.general.about')}}">Manage About Us</a></li>
                        <li class="{{ Request::segment(3) == 'terms&condition' ? 'active' : null }}"><a href="{{route('admin.general.terms')}}">Manage Terms & Conditions</a></li>
                        <li class="{{ Request::segment(3) == 'privacy_policy' ? 'active' : null }}"><a href="{{route('admin.general.privacy')}}">Manage Privacy & Policy</a></li>
                        <li class="{{ Request::segment(3) == 'blog' ? 'active' : null }}"><a href="{{route('admin.general.blog')}}">Manage Blog</a></li>
                        <li class="{{ Request::segment(3) == 'contact' ? 'active' : null }}"><a href="{{route('admin.contact.index')}}">Contact Manager</a></li>
                    </ul>
                </li>
                <li class="{{ Request::segment(2) == 'subscription' ? 'active' : null }}"><a href="{{route('setting.general')}}"><i class="fa fa-id-badge" aria-hidden="true"></i><span>Settings</span></a></li>
                <li class="{{ Request::segment(2) == 'subscription' ? 'active' : null }}"><a href="{{route('settingtheme')}}"><i class="fa fa-id-badge" aria-hidden="true"></i><span>Logo Settings</span></a></li>
                
                {{-- <li class="{{ Request::segment(2) == 'report' ? 'active open' : null }}">
                    <a href="#Report" class="has-arrow"><i class="icon-book-open"></i><span>Reports</span></a>
                    <ul>
                        <li class="{{ Request::segment(3) == 'application' ? 'active open' : null }}">
                            <a href="#Application" class="has-arrow"> <i class="icon-notebook"></i><span>Applications</span></a>
                            <ul>
                                <li class="{{ Request::segment(4) == 'client' ? 'active' : null }}"><a href="{{route('admin.report.application.client')}}">Clients</a></li>
                                <li class="{{ Request::segment(4) == 'consultant' ? 'active' : null }}"><a href="{{route('admin.report.application.consultant')}}">Consultant</a></li>
                                <li class="{{ Request::segment(4) == 'university' ? 'active' : null }}"><a href="{{route('admin.report.application.university')}}">University</a></li>

                            </ul>
                        </li>


                        <li class="{{ Request::segment(3) == 'booking' ? 'active open' : null }}">
                            <a href="#Booking" class="has-arrow"><i class="icon-list"></i><span>Bookings</span></a>
                            <ul>
                                <li class="{{ Request::segment(4) == 'client' ? 'active' : null }}"><a href="{{route('admin.report.booking.client')}}">Clients</a></li>
                                <li class="{{ Request::segment(4) == 'consultant' ? 'active' : null }}"><a href="{{route('admin.report.booking.consultant')}}">Consultant</a></li>


                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </nav>
    </div>
</div>
