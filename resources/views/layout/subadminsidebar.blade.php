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


                <li class="{{ Request::segment(2) === 'index2' ? 'active open' : null }}"><a href="{{route('dashboard.index2')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                {{-- <li class="{{ Request::segment(2) === 'index3' ? 'active open' : null }}"><a href="{{route('dashboard.index3')}}"><i class="icon-diamond"></i><span>Cryptocurrency</span></a></li> --}}
                {{-- <li class="header">HR, Project & Job</li> --}}
                {{-- <li class="{{ Request::segment(1) === 'projects' ? 'active open' : null }}">
                    <a href="#Project" class="has-arrow"><i class="icon-flag"></i><span>Project</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'taskboard' ? 'active' : null }}"><a href="{{route('projects.taskboard')}}">Taskboard</a></li>
                        <li class="{{ Request::segment(2) === 'projectlist' ? 'active' : null }}"><a href="{{route('projects.projectlist')}}">Project list</a></li>
                        <li class="{{ Request::segment(2) === 'addproject' ? 'active' : null }}"><a href="{{route('projects.addproject')}}">Add Project</a></li>
                        <li class="{{ Request::segment(2) === 'ticket' ? 'active' : null }}"><a href="{{route('projects.ticket')}}">Ticket List</a></li>
                        <li class="{{ Request::segment(2) === 'ticketdetails' ? 'active' : null }}"><a href="{{route('projects.ticketdetails')}}">Ticket Details</a></li>
                        <li class="{{ Request::segment(2) === 'clients' ? 'active' : null }}"><a href="{{route('projects.clients')}}">Clients</a></li>
                        <li class="{{ Request::segment(2) === 'todo' ? 'active' : null }}"><a href="{{route('projects.todo')}}">Todo List</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="{{ Request::segment(1) === 'hr' ? 'active open' : null }}">
                    <a href="#Project" class="has-arrow"><i class="icon-umbrella"></i><span>HRMS System</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'hrdashboard' ? 'active' : null }}"><a href="{{route('hr.hrdashboard')}}">Hr Dashboard</a></li>
                        <li class="{{ Request::segment(2) === 'users' ? 'active' : null }}"><a href="{{route('hr.users')}}">Users</a></li>
                        <li class="{{ Request::segment(2) === 'departments' ? 'active' : null }}"><a href="{{route('hr.departments')}}">Departments</a></li>
                        <li class="{{ Request::segment(2) === 'employee' ? 'active' : null }}"><a href="{{route('hr.employee')}}">Employee</a></li>
                        <li class="{{ Request::segment(2) === 'activities' ? 'active' : null }}"><a href="{{route('hr.activities')}}">Activities</a></li>
                        <li class="{{ Request::segment(2) === 'holidays' ? 'active' : null }}"><a href="{{route('hr.holidays')}}">Holidays</a></li>
                        <li class="{{ Request::segment(2) === 'events' ? 'active' : null }}"><a href="{{route('hr.events')}}">Events</a></li>
                        <li class="{{ Request::segment(2) === 'payroll' ? 'active' : null }}"><a href="{{route('hr.payroll')}}">Payroll</a></li>
                        <li class="{{ Request::segment(2) === 'accounts' ? 'active' : null }}"><a href="{{route('hr.accounts')}}">Accounts</a></li>
                        <li class="{{ Request::segment(2) === 'report' ? 'active' : null }}"><a href="{{route('hr.report')}}">Report</a></li>
                    </ul>
                </li> --}}
                <li class="{{ Request::segment(1) === 'job' ? 'active open' : null }}">
                    <a href="#JobPortal" class="has-arrow"> <i class="fa fa-users"></i><span>Users</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'jobdashboard' ? 'active' : null }}"><a href="{{route('job.jobdashboard')}}">Client</a></li>
                        <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('job.positions')}}">Consultant</a></li>
                        <li class="{{ Request::segment(2) === 'applicants' ? 'active' : null }}"><a href="{{route('job.applicants')}}">University</a></li>

                    </ul>
                </li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="icon-notebook"></i><span>Applications</span></a></li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="fa fa-list"></i><span>Bookings</span></a></li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="fa fa-gear"></i><span>Generals</span></a></li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="icon-book-open"></i><span>Reports</span></a></li>
                <li class="{{ Request::segment(2) == 'bookings' ? 'active' : null }}"><a href="{{route('consultant.bookings')}}"><i class="fa fa-money"></i><span>Earnings</span></a></li>
                <li class="{{ Request::segment(1) === 'job' ? 'active open' : null }}">
                    <a href="#JobPortal" class="has-arrow"><i class="icon-envelope-open"></i><span>Email</span></a>
                    <ul>
                        <li class="{{ Request::segment(2) === 'jobdashboard' ? 'active' : null }}"><a href="{{route('job.jobdashboard')}}">Client</a></li>
                        <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="{{route('job.positions')}}">Consultant</a></li>
                        <li class="{{ Request::segment(2) === 'applicants' ? 'active' : null }}"><a href="{{route('job.applicants')}}">University</a></li>

                    </ul>
                </li>
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
