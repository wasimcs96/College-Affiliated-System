<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="/"><img src="{{ asset('assets/images/icon.svg') }}" alt="Campus Interest Logo" class="img-fluid logo" ><span>Campus Interest</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                @if(isset(Auth()->user()->profile_image) && file_exists(Auth()->user()->profile_image))
                <img src="{{ asset(Auth()->user()->profile_image) }}" class="user-photo" alt="User Profile Picture" width="40px" height="40px">
                @else
                <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
             @endif

            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>
                    {{-- {{auth()->user()->first_name}}  --}}
                    <?php  $myvalue = auth()->user()->first_name; $arr = explode(' ',trim($myvalue)); echo $arr[0];?>
                </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('client.profile')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : null }}"><a href="{{route('client.dashboard')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                <li class="{{ Request::segment(2) == 'profile' ? 'active' : null }}"><a href="{{route('client.profile')}}"><i class="icon-user"></i><span>My Profile</span></a></li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('client.bookings')}}"><i class="icon-list"></i><span>My Booking</span></a></li>
                <li class="{{ Request::segment(2) == 'applications' ? 'active' : null }}"><a href="{{route('client.applications')}}"><i class="icon-notebook"></i><span>My Applications</span></a></li>
                <li class="{{ Request::segment(2) == 'messenger' ? 'active ' : null }}"><a href="{{route('client.messenger')}}"><i class="icon-bubbles"></i><span>Messenger</span></a></li>
                <li class="{{ Request::segment(2) == 'logout' ? 'active' : null }}"><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="icon-power"></i> {{ __('Logout') }}
                 </a>

                 <form action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form></li>
                {{-- <li class="{{ Request::segment(2) === 'chat' ? 'active open' : null }}"><a href="{{route('messanger')}}"><i class="icon-bubbles"></i><span>Messenger</span></a></li> --}}

            </ul>
        </nav>
    </div>
</div>
