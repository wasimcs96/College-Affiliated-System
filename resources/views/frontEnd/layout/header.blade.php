<header class="header-area" style="z-index: 59;" >
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="#"><i class="la la-phone mr-1"></i>{{config('get.TELEPHONE')}}</a></li>
                                <li><a href="#"><i class="la la-envelope mr-1"></i>{{config('get.ADMIN_EMAIL')}}</a></li>
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
    <div class="setposition header-menu-wrapper padding-right-100px padding-left-100px" style="z-index: 59;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper"  style="
                    z-index: 59; color:white;">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="{{route('front')}}"><img src="{{ asset('frontEnd/assets/images/logo.png') }}" alt="logo"  style="
                                width: 198px;
                                height: 70px;
                            "></a>
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
                                        <?php $headervalid = App\Models\Category::all(); ?>

                                        @if($headervalid->count()>0)
                                        <a href="#">Courses<i style="color:#073975" class="la la-angle-down"></i></a>
                                        @else
                                        <a type="button" disabled data-toggle="tooltip"  data-url=""  data-title="Unavailable" style="color: #073975">Courses</a>
                                        @endif
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                @if($headervalid->count() >10)
                                                <li  class="col-lg-12 mega-menu-item" style="padding: 0px;">
                                                            <div class="tabbe">

                                                            <button style="
                                                            color: #5d646d;
                                                            font-size: 15px;
                                                            font-weight: 500;" class="tabbelinks active" onmouseover="openCity(event, 'London')">Business & Management</button>
                                                            <button  style="
                                                            color: #5d646d;
                                                            font-size: 15px;
                                                            font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'Paris')">Medicine & Health</button>
                                                            <button  style="
                                                            color: #5d646d;
                                                            font-size: 15px;
                                                            font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'Tokyo')">Engineering & Technology</button>
                                                            <button  style="
                                                            color: #5d646d;
                                                            font-size: 15px;
                                                            font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'Science')">
                                                                Applied Sciences & Professions</button>
                                                            <button  style="
                                                            color: #5d646d;
                                                            font-size: 15px;
                                                            font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'Arts')"> Arts, Design & Architecture</button>
                                                            <button  style="
                                                            color: #5d646d;
                                                            font-size: 15px;
                                                            font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'Social')"> Social Sciences</button>
                                                            </div>

                                                            <div id="London" class="tabcontent " style=" float: left;
                                                            padding: 0px 12px;
                                                            border: 1px solid #ccc;
                                                            width: 70%;
                                                            border-left: none;
                                                            height: 300px;
                                                            display: block;">
                                                            <ul class="row no-gutters" style="padding-top: 10px;">
                                                                <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                    <ul>
                                                                            <li style="
                                                                            border: none;
                                                                            background: none;
                                                                            display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 15px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 17px;
                                                                            font-weight: 600;

                                                                            ">Top Sub Discipline</li>
                                                                            <?php $headercourses11 = App\Models\Category::where('parent_id',6)->where('status',1)->take(7)->get(); ?>
                                                                        @foreach ($headercourses11 as $headercourse11)
                                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                            @csrf
                                                                        <input type="hidden" name="category" value="{{$headercourse11->parent_id ?? ''}}">
                                                                        <input type="hidden" name="sub_category" value="{{$headercourse11->id ?? ''}}">
                                                                        <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 3px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 15px;
                                                                            font-weight: 500;">{{$headercourse11->title ?? ''}}</button></li>
                                                                        </form>
                                                                        @endforeach

                                                                    </ul>
                                                                </li>
                                                                <li class="col-lg-6 mega-menu-item">
                                                                    <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Other Sub Discipline</li>
                                                                        <?php $headercourses12 = App\Models\Category::where('parent_id',6)->where('status',1)->skip(7)->take(7)->get(); ?>
                                                                    @foreach ($headercourses12 as $headercourse12)
                                                                    <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                        @csrf
                                                                    <input type="hidden" name="category" value="{{$headercourse12->parent_id ?? ''}}">
                                                                    <input type="hidden" name="sub_category" value="{{$headercourse12->id ?? ''}}">
                                                                    <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 3px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 15px;
                                                                        font-weight: 500;">{{$headercourse12->title ?? ''}}</button></li>
                                                                    </form>
                                                                    @endforeach


                                                                </ul>
                                                                </li>
                                                            </ul>

                                                            </div>

                                                            <div id="Paris" class="tabcontent" style=" float: left;
                                                            padding: 0px 12px;
                                                            border: 1px solid #ccc;
                                                            width: 70%;
                                                            border-left: none;
                                                            height: 300px;
                                                            display: none;">
                                                                <ul class="row no-gutters" style="padding-top: 10px;">
                                                                    <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                        <ul>
                                                                                <li style="
                                                                                border: none;
                                                                                background: none;
                                                                                display: -webkit-flex;
                                                                                display: -ms-flex;
                                                                                display: flex;
                                                                                -ms-flex-align: center;
                                                                                align-items: center;
                                                                                justify-content: space-between;
                                                                                position: relative;
                                                                                padding: 15px 25px;
                                                                                color: #5d646d;
                                                                                font-size: 17px;
                                                                                font-weight: 600;

                                                                                ">Top Sub Discipline</li>
                                                                                <?php $headercourses21 = App\Models\Category::where('parent_id',15)->where('status',1)->take(7)->get(); ?>
                                                                            @foreach ($headercourses21 as $headercourse21)
                                                                            <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                                @csrf
                                                                            <input type="hidden" name="category" value="{{$headercourse21->parent_id ?? ''}}">
                                                                            <input type="hidden" name="sub_category" value="{{$headercourse21->id ?? ''}}">
                                                                            <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                                display: -ms-flex;
                                                                                display: flex;
                                                                                -ms-flex-align: center;
                                                                                align-items: center;
                                                                                justify-content: space-between;
                                                                                position: relative;
                                                                                padding: 3px 25px;
                                                                                color: #5d646d;
                                                                                font-size: 15px;
                                                                                font-weight: 500;">{{$headercourse21->title ?? ''}}</button></li>
                                                                            </form>
                                                                            @endforeach

                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-lg-6 mega-menu-item">
                                                                        <ul>
                                                                            <li style="
                                                                            border: none;
                                                                            background: none;
                                                                            display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 15px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 17px;
                                                                            font-weight: 600;

                                                                            ">Other Sub Discipline</li>
                                                                            <?php $headercourses22 = App\Models\Category::where('parent_id',15)->where('status',1)->skip(7)->take(7)->get(); ?>
                                                                        @foreach ($headercourses22 as $headercourse22)
                                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                            @csrf
                                                                        <input type="hidden" name="category" value="{{$headercourse22->parent_id ?? ''}}">
                                                                        <input type="hidden" name="sub_category" value="{{$headercourse22->id ?? ''}}">
                                                                        <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 3px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 15px;
                                                                            font-weight: 500;">{{$headercourse22->title ?? ''}}</button></li>
                                                                        </form>
                                                                        @endforeach

                                                                            {{-- <li><a href="#">MBA <span class="badge bg-2 text-white">New</span></a></li>
                                                                            <li><a href="#">MBBS<span class="badge bg-2 text-white">New</span></a></li>
                                                                            <li><a href="#">Law<span class="badge bg-2 text-white">New</span></a></li>
                                                                            <li><a href="#">Science<span class="badge bg-2 text-white">New</span></a></li>
                                                                            <li><a href="#">Commerce</a></li>
                                                                            <li><a href="#">Arts</a></li> --}}
                                                                    </ul>
                                                                    </li>
                                                                </ul>

                                                            </div>

                                                            <div id="Tokyo" class="tabcontent" style=" float: left;
                                                            padding: 0px 12px;
                                                            border: 1px solid #ccc;
                                                            width: 70%;
                                                            border-left: none;
                                                            height: 300px;
                                                            display: none;">
                                                                <ul class="row no-gutters" style="padding-top: 10px;">
                                                                    <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                        <ul>
                                                                                <li style="
                                                                                border: none;
                                                                                background: none;
                                                                                display: -webkit-flex;
                                                                                display: -ms-flex;
                                                                                display: flex;
                                                                                -ms-flex-align: center;
                                                                                align-items: center;
                                                                                justify-content: space-between;
                                                                                position: relative;
                                                                                padding: 15px 25px;
                                                                                color: #5d646d;
                                                                                font-size: 17px;
                                                                                font-weight: 600;

                                                                                ">Top Sub Discipline</li>
                                                                                <?php $headercourses31 = App\Models\Category::where('parent_id',9)->where('status',1)->take(7)->get(); ?>
                                                                            @foreach ($headercourses31 as $headercourse31)
                                                                            <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                                @csrf
                                                                            <input type="hidden" name="category" value="{{$headercourse31->parent_id ?? ''}}">
                                                                            <input type="hidden" name="sub_category" value="{{$headercourse31->id ?? ''}}">
                                                                            <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                                display: -ms-flex;
                                                                                display: flex;
                                                                                -ms-flex-align: center;
                                                                                align-items: center;
                                                                                justify-content: space-between;
                                                                                position: relative;
                                                                                padding: 3px 25px;
                                                                                color: #5d646d;
                                                                                font-size: 15px;
                                                                                font-weight: 500;">{{$headercourse31->title ?? ''}}</button></li>
                                                                            </form>
                                                                            @endforeach

                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-lg-6 mega-menu-item">
                                                                        <ul>
                                                                            <li style="
                                                                            border: none;
                                                                            background: none;
                                                                            display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 15px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 17px;
                                                                            font-weight: 600;

                                                                            ">Other Sub Discipline</li>
                                                                            <?php $headercourses32 = App\Models\Category::where('parent_id',9)->where('status',1)->skip(7)->take(7)->get(); ?>
                                                                        @foreach ($headercourses32 as $headercourse32)
                                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                            @csrf
                                                                        <input type="hidden" name="category" value="{{$headercourse32->parent_id ?? ''}}">
                                                                        <input type="hidden" name="sub_category" value="{{$headercourse32->id ?? ''}}">
                                                                        <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 3px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 15px;
                                                                            font-weight: 500;">{{$headercourse32->title ?? ''}}</button></li>
                                                                        </form>
                                                                        @endforeach


                                                                    </ul>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                    <div id="Science" class="tabcontent" style=" float: left;
                                                            padding: 0px 12px;
                                                            border: 1px solid #ccc;
                                                            width: 70%;
                                                            border-left: none;
                                                            height: 300px;
                                                            display: none;">
                                                                <ul class="row no-gutters" style="padding-top: 10px;">
                                                                    <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                        <ul>
                                                                                <li style="
                                                                                border: none;
                                                                                background: none;
                                                                                display: -webkit-flex;
                                                                                display: -ms-flex;
                                                                                display: flex;
                                                                                -ms-flex-align: center;
                                                                                align-items: center;
                                                                                justify-content: space-between;
                                                                                position: relative;
                                                                                padding: 15px 25px;
                                                                                color: #5d646d;
                                                                                font-size: 17px;
                                                                                font-weight: 600;

                                                                                ">Top Sub Discipline</li>
                                                                                <?php $headercourses41 = App\Models\Category::where('parent_id',2)->where('status',1)->take(7)->get(); ?>
                                                                            @foreach ($headercourses41 as $headercourse41)
                                                                            <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                                @csrf
                                                                            <input type="hidden" name="category" value="{{$headercourse41->parent_id ?? ''}}">
                                                                            <input type="hidden" name="sub_category" value="{{$headercourse41->id ?? ''}}">
                                                                            <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                                display: -ms-flex;
                                                                                display: flex;
                                                                                -ms-flex-align: center;
                                                                                align-items: center;
                                                                                justify-content: space-between;
                                                                                position: relative;
                                                                                padding: 3px 25px;
                                                                                color: #5d646d;
                                                                                font-size: 15px;
                                                                                font-weight: 500;">{{$headercourse41->title ?? ''}}</button></li>
                                                                            </form>
                                                                            @endforeach

                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-lg-6 mega-menu-item">
                                                                        <ul>
                                                                            <li style="
                                                                            border: none;
                                                                            background: none;
                                                                            display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 15px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 17px;
                                                                            font-weight: 600;

                                                                            ">Other Sub Discipline</li>

                                                                            <?php $headercourses42 = App\Models\Category::where('parent_id',2)->where('status',1)->skip(7)->take(7)->get(); ?>
                                                                        @foreach ($headercourses42 as $headercourse42)
                                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                            @csrf
                                                                        <input type="hidden" name="category" value="{{$headercourse42->parent_id ?? ''}}">
                                                                        <input type="hidden" name="sub_category" value="{{$headercourse42->id ?? ''}}">
                                                                        <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 3px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 15px;
                                                                            font-weight: 500;">{{$headercourse42->title ?? ''}}</button></li>
                                                                        </form>
                                                                        @endforeach
                                                                    </ul>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                            <div id="Arts" class="tabcontent" style=" float: left;
                                                                padding: 0px 12px;
                                                                border: 1px solid #ccc;
                                                                width: 70%;
                                                                border-left: none;
                                                                height: 300px;
                                                                display: none;">
                                                                <ul class="row no-gutters" style="padding-top: 10px;">
                                                                    <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                        <ul>
                                                                            <li style="
                                                                            border: none;
                                                                            background: none;
                                                                            display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 15px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 17px;
                                                                            font-weight: 600;

                                                                            ">Top Sub Discipline</li>
                                                                            <?php $headercourses51 = App\Models\Category::where('parent_id',3)->where('status',1)->take(7)->get(); ?>
                                                                        @foreach ($headercourses51 as $headercourse51)
                                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                            @csrf
                                                                        <input type="hidden" name="category" value="{{$headercourse51->parent_id ?? ''}}">
                                                                        <input type="hidden" name="sub_category" value="{{$headercourse51->id ?? ''}}">
                                                                        <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                            display: -ms-flex;
                                                                            display: flex;
                                                                            -ms-flex-align: center;
                                                                            align-items: center;
                                                                            justify-content: space-between;
                                                                            position: relative;
                                                                            padding: 3px 25px;
                                                                            color: #5d646d;
                                                                            font-size: 15px;
                                                                            font-weight: 500;">{{$headercourse51->title ?? ''}}</button></li>
                                                                        </form>
                                                                        @endforeach

                                                                    </ul>
                                                                </li>
                                                                <li class="col-lg-6 mega-menu-item">
                                                                    <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Other Sub Discipline</li>
                                                                        <?php $headercourses52 = App\Models\Category::where('parent_id',3)->skip(7)->take(7)->get(); ?>
                                                                    @foreach ($headercourses52 as $headercourse52)
                                                                    <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                        @csrf
                                                                    <input type="hidden" name="category" value="{{$headercourse52->parent_id ?? ''}}">
                                                                    <input type="hidden" name="sub_category" value="{{$headercourse52->id ?? ''}}">
                                                                    <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 3px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 15px;
                                                                        font-weight: 500;">{{$headercourse52->title ?? ''}}</button></li>
                                                                    </form>
                                                                    @endforeach

                                                                        {{-- <li><a href="#">MBA <span class="badge bg-2 text-white">New</span></a></li>
                                                                        <li><a href="#">MBBS<span class="badge bg-2 text-white">New</span></a></li>
                                                                        <li><a href="#">Law<span class="badge bg-2 text-white">New</span></a></li>
                                                                        <li><a href="#">Science<span class="badge bg-2 text-white">New</span></a></li>
                                                                        <li><a href="#">Commerce</a></li>
                                                                        <li><a href="#">Arts</a></li> --}}
                                                                </ul>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                        <div id="Social" class="tabcontent" style=" float: left;
                                                        padding: 0px 12px;
                                                        border: 1px solid #ccc;
                                                        width: 70%;
                                                        border-left: none;
                                                        height: 300px;
                                                        display: none;">
                                                        <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Sub Discipline</li>

                                                                    <?php $headercourses61 = App\Models\Category::where('parent_id',18)->where('status',1)->take(7)->get(); ?>
                                                                @foreach ($headercourses61 as $headercourse61)
                                                                <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                    @csrf
                                                                <input type="hidden" name="category" value="{{$headercourse61->parent_id ?? ''}}">
                                                                <input type="hidden" name="sub_category" value="{{$headercourse61->id ?? ''}}">
                                                                <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 3px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 15px;
                                                                    font-weight: 500;">{{$headercourse61->title ?? ''}}</button></li>
                                                                </form>
                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        <li class="col-lg-6 mega-menu-item">
                                                            <ul>
                                                                <li style="
                                                                border: none;
                                                                background: none;
                                                                display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 15px 25px;
                                                                color: #5d646d;
                                                                font-size: 17px;
                                                                font-weight: 600;

                                                                ">Other Sub Discipline</li>
                                                                <?php $headercourses62 = App\Models\Category::where('parent_id',18)->where('status',1)->skip(7)->take(7)->get(); ?>
                                                            @foreach ($headercourses62 as $headercourse62)
                                                            <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                                @csrf
                                                            <input type="hidden" name="category" value="{{$headercourse62->parent_id ?? ''}}">
                                                            <input type="hidden" name="sub_category" value="{{$headercourse62->id ?? ''}}">
                                                            <li><button type="submit" style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;">{{$headercourse62->title ?? ''}}</button></li>
                                                            </form>
                                                            @endforeach


                                                        </ul>
                                                        </li>
                                                    </ul>

                                                </div>
                                                    </li>

                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <?php $headercountryvalidconsultant = App\Models\Consultant::all(); ?>
                                        @if($headercountryvalidconsultant->count() > 0)
                                        <a href="#">Consultants<i class="la la-angle-down"></i></a>
                                        @else
                                        <a type="button" disabled data-toggle="tooltip"  data-url=""  data-title="Unavailable" style="color: #073975">Consultant </a>
                                        @endif
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                {{-- @if($headercountryvalidconsultant->count() > 10) --}}
                                                <li  class="col-lg-12 mega-menu-item" style="padding: 0px;">
                                                    <div class="tabbe">

                                                      <button style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;" class="tabbelinks active" onmouseover="openCity(event, 'consultant_us')"><span class="flag-icon flag-icon-us mr-1"></span>{!!"&nbsp"!!}United States Of America</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'consultant_uk')"><span class="flag-icon flag-icon-gb mr-1"></span>{!!"&nbsp"!!}United Kingdom</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'consultant_canada')"><span class="flag-icon flag-icon-ca mr-1"></span>{!!"&nbsp"!!}Canada</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'consultant_ireland')"><span class="flag-icon flag-icon-ie mr-1"></span>{!!"&nbsp"!!}Ireland</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'consultant_australia')"><span class="flag-icon flag-icon-au mr-1"></span>{!!"&nbsp"!!}Australia</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'consultant_Singapore')"><span class="flag-icon flag-icon-sg mr-1"></span>{!!"&nbsp"!!}Singapore</button>
                                                    </div>

                                                    <div id="consultant_us" class="tabcontent" style=" float: left;
                                                        padding: 0px 12px;
                                                        border: 1px solid #ccc;
                                                        width: 70%;
                                                        border-left: none;
                                                        height: 300px;
                                                        display: block;">
                                                        <ul class="row no-gutters" style="padding-top: 10px;">
                                                        <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                            <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    
                                                                    ">Top Featured Consultants</li>
                                                                    <?php $myconsultime=Carbon\Carbon::now()->format('Y-m-d');?>
                                                                    <?php $headerconsultants11 =  App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'consultant');
                                                                    })->where('countries_id',223)->where('Premium_expire_date','>',$myconsultime)->where('status',1)->orderBy('rating','Desc')->take(7)->get();
                                                    ?>
                                                                 @foreach ( $headerconsultants11 as $headerconsultant11)
                                                             
                                                               
                                                                
                                                                <li><a href="{{route('consultant_detail',['id'=>$headerconsultant11->id])}}">{{$headerconsultant11->first_name ?? ''}} &nbsp;{{$headerconsultant11->last_name ?? ''}}</a></li>
                                                                {{-- </form> --}}
                                                        
                                                              

                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        <li class="col-lg-6 mega-menu-item">
                                                            <ul>
                                                                <li style="
                                                                border: none;
                                                                background: none;
                                                                display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 15px 25px;
                                                                color: #5d646d;
                                                                font-size: 17px;
                                                                font-weight: 600;

                                                                ">Top Ranked Consultants</li>
                                                                <?php $headerconsultants12 = App\Models\User::whereHas('roles', function($q){
                                                                    $q->where('name', 'consultant');
                                                                })->where('countries_id',223)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>

                                                            @foreach ($headerconsultants12 as $headerconsultant12)
                                                          
@if($headerconsultant12->Premium_expire_date < $myconsultime || $headerconsultant12->Premium_expire_date == null)
                                                            
                                                            <li><a href="{{route('consultant_detail',['id'=>$headerconsultant12->id])}}">{{$headerconsultant12->first_name ?? ''}} &nbsp;{{$headerconsultant12->last_name ?? ''}}</a></li>
                                                            {{-- </form> --}}
                                                            @endif

                                                            @endforeach


                                                        </ul>
                                                        </li>
                                                    </ul>

                                                    </div>

                                                    <div id="consultant_uk" class="tabcontent" style=" float: left;
                                                    padding: 0px 12px;
                                                    border: 1px solid #ccc;
                                                    width: 70%;
                                                    border-left: none;
                                                    height: 300px;
                                                    display: none;">
                                                         <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Top Featured Consultants</li>
                                                                        <?php $headerconsultants21 = App\Models\User::whereHas('roles', function($q){
                                                                            $q->where('name', 'consultant');
                                                                        })->where('countries_id',222)->where('Premium_expire_date','>',$myconsultime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>

                                                                        @foreach ($headerconsultants21 as $headerconsultant21)
                                                    

                                                                     
                                                                <li><a href="{{route('consultant_detail',['id'=>$headerconsultant21->id])}}">{{$headerconsultant21->first_name ?? ''}} &nbsp;{{$headerconsultant21->last_name ?? ''}}</a></li>
                                                             
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            <li class="col-lg-6 mega-menu-item">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Ranked Consultants</li>
                                                                    <?php $headerconsultants22 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'consultant');
                                                                    })->where('countries_id',222)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headerconsultants22 as $headerconsultant22)
                                                                @if($headerconsultant22->Premium_expire_date < $myconsultime || $headerconsultant22->Premium_expire_date == null)

                                                                  
                                                                <li><a href="{{route('consultant_detail',['id'=>$headerconsultant22->id])}}">{{$headerconsultant22->first_name ?? ''}} &nbsp;{{$headerconsultant22->last_name ?? ''}}</a></li>
                                                                {{-- </form> --}}
                                                              
                                                           @endif
                                                                @endforeach

                                                                
                                                            </ul>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div id="consultant_canada" class="tabcontent" style=" float: left;
                                                    padding: 0px 12px;
                                                    border: 1px solid #ccc;
                                                    width: 70%;
                                                    border-left: none;
                                                    height: 300px;
                                                    display: none;">
                                                         <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Top Featured Consultants</li>
                                                                        <?php $headerconsultants31 = App\Models\User::whereHas('roles', function($q){
                                                                            $q->where('name', 'consultant');
                                                                        })->where('countries_id',38)->where('Premium_expire_date','>',$myconsultime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                    @foreach ($headerconsultants31 as $headerconsultant31)
                                                              


                                                       
                                                                    <li><a href="{{route('consultant_detail',['id'=>$headerconsultant31->id])}}">{{$headerconsultant31->first_name ?? ''}} &nbsp;{{$headerconsultant31->last_name ?? ''}}</a></li>
                                                              
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            <li class="col-lg-6 mega-menu-item">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Ranked Consultants</li>
                                                                    <?php $headerconsultants32 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'consultant');
                                                                    })->where('countries_id',38)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headerconsultants32 as $headerconsultant32)
                                                                @if($headerconsultant32->Premium_expire_date < $myconsultime || $headerconsultant32->Premium_expire_date == null)
                                                                <li><a href="{{route('consultant_detail',['id'=>$headerconsultant32->id])}}">{{$headerconsultant32->first_name ?? ''}} &nbsp;{{$headerconsultant32->last_name ?? ''}}</a></li>
                                                             @endif
                                                                @endforeach


                                                            </ul>
                                                            </li>
                                                        </ul>

                                                    </div>
                                            <div id="consultant_ireland" class="tabcontent" style=" float: left;
                                                    padding: 0px 12px;
                                                    border: 1px solid #ccc;
                                                    width: 70%;
                                                    border-left: none;
                                                    height: 300px;
                                                    display: none;">
                                                         <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Top Featured Consultants</li>
                                                                        <?php $headerconsultants41 = App\Models\User::whereHas('roles', function($q){
                                                                            $q->where('name', 'consultant');
                                                                        })->where('countries_id',103)->where('Premium_expire_date','>',$myconsultime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                    @foreach ($headerconsultants41 as $headerconsultant41)
                                                                 


                                                                
                                                                    <li><a href="{{route('consultant_detail',['id'=>$headerconsultant41->id])}}">{{$headerconsultant41->first_name ?? ''}} &nbsp;{{$headerconsultant41->last_name ?? ''}}</a></li>
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            <li class="col-lg-6 mega-menu-item">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Ranked Consultants</li>

                                                                    <?php $headerconsultants42 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'consultant');
                                                                    })->where('countries_id',103)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headerconsultants42 as $headerconsultant42)
                                                                @if($headerconsultant42->Premium_expire_date < $myconsultime || $headerconsultant42->Premium_expire_date == null)
                                                                <li><a href="{{route('consultant_detail',['id'=>$headerconsultant42->id])}}">{{$headerconsultant42->first_name ?? ''}} &nbsp;{{$headerconsultant42->last_name ?? ''}}</a></li>
                                                               @endif
                                                                @endforeach
                                                            </ul>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div id="consultant_australia" class="tabcontent" style=" float: left;
                                                        padding: 0px 12px;
                                                        border: 1px solid #ccc;
                                                        width: 70%;
                                                        border-left: none;
                                                        height: 300px;
                                                        display: none;">
                                                        <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Featured Consultants</li>
                                                                    <?php $headerconsultants51 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'consultant');
                                                                    })->where('countries_id',13)->where('Premium_expire_date','>',$myconsultime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headerconsultants51 as $headerconsultant51)
                                                            
                                                                <li><a href="{{route('consultant_detail',['id'=>$headerconsultant51->id])}}">{{$headerconsultant51->first_name ?? ''}} &nbsp;{{$headerconsultant51->last_name ?? ''}}</a></li>
                                                                
                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        <li class="col-lg-6 mega-menu-item">
                                                            <ul>
                                                                <li style="
                                                                border: none;
                                                                background: none;
                                                                display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 15px 25px;
                                                                color: #5d646d;
                                                                font-size: 17px;
                                                                font-weight: 600;

                                                                ">Top Ranked Consultants</li>
                                                                <?php $headerconsultants52 = App\Models\User::whereHas('roles', function($q){
                                                                    $q->where('name', 'consultant');
                                                                })->where('countries_id',13)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                            @foreach ($headerconsultants52 as $headerconsultant52)
                                                            @if($headerconsultant52->Premium_expire_date < $myconsultime || $headerconsultant52->Premium_expire_date == null)                            
                                                            <li><a href="{{route('consultant_detail',['id'=>$headerconsultant52->id])}}">{{$headerconsultant52->first_name ?? ''}} &nbsp;{{$headerconsultant52->last_name ?? ''}}</a></li>
                                                         @endif
                                                            @endforeach

                                                                {{-- <li><a href="#">MBA <span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">MBBS<span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">Law<span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">Science<span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">Commerce</a></li>
                                                                <li><a href="#">Arts</a></li> --}}
                                                        </ul>
                                                        </li>
                                                     </ul>

                                                </div>
                                                <div id="consultant_Singapore" class="tabcontent" style=" float: left;
                                                padding: 0px 12px;
                                                border: 1px solid #ccc;
                                                width: 70%;
                                                border-left: none;
                                                height: 300px;
                                                display: none;">
                                                <ul class="row no-gutters" style="padding-top: 10px;">
                                                    <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                        <ul>
                                                            <li style="
                                                            border: none;
                                                            background: none;
                                                            display: -webkit-flex;
                                                            display: -ms-flex;
                                                            display: flex;
                                                            -ms-flex-align: center;
                                                            align-items: center;
                                                            justify-content: space-between;
                                                            position: relative;
                                                            padding: 15px 25px;
                                                            color: #5d646d;
                                                            font-size: 17px;
                                                            font-weight: 600;

                                                            ">Top Featured Consultants</li>

                                                            <?php $headerconsultants61 = App\Models\User::whereHas('roles', function($q){
                                                                $q->where('name', 'consultant');
                                                            })->where('countries_id',188)->where('Premium_expire_date','>',$myconsultime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                        @foreach ($headerconsultants61 as $headerconsultant61)
                                                

                                                         
                                                        <li><a href="{{route('consultant_detail',['id'=>$headerconsultant61->id])}}">{{$headerconsultant61->first_name ?? ''}} &nbsp;{{$headerconsultant61->last_name ?? ''}}</a></li>
                                                    
                                                        @endforeach

                                                    </ul>
                                                </li>
                                                <li class="col-lg-6 mega-menu-item">
                                                    <ul>
                                                        <li style="
                                                        border: none;
                                                        background: none;
                                                        display: -webkit-flex;
                                                        display: -ms-flex;
                                                        display: flex;
                                                        -ms-flex-align: center;
                                                        align-items: center;
                                                        justify-content: space-between;
                                                        position: relative;
                                                        padding: 15px 25px;
                                                        color: #5d646d;
                                                        font-size: 17px;
                                                        font-weight: 600;

                                                        ">Top Ranked Consultants</li>
                                                        <?php $headerconsultant62 = App\Models\User::whereHas('roles', function($q){
                                                            $q->where('name', 'consultant');
                                                        })->where('countries_id',188)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                    @foreach ($headerconsultant62 as $headerconsultant62)
                                                    @if($headerconsultant62->Premium_expire_date < $myconsultime || $headerconsultant62->Premium_expire_date == null)
  
                                                    <li><a href="{{route('consultant_detail',['id'=>$headerconsultant62->id])}}">{{$headerconsultant62->first_name ?? ''}} &nbsp;{{$headerconsultant62->last_name ?? ''}}</a></li>
                                                 
                                                    @endif
                                                    @endforeach


                                                </ul>
                                                </li>
                                             </ul>

                                        </div>
                                                    </li>

                                                {{-- @endif --}}
                                            </ul>
                                        </div>
                                    </li>
                         



                                    <li>
                                        <?php $headercountryvalidsuniversity = App\Models\Country::all(); ?>
                                        @if($headercountryvalidsuniversity->count() > 0)
                                        <a href="#">Study Abroad<i class="la la-angle-down"></i></a>
                                        @else
                                        <a type="button" disabled data-toggle="tooltip"  data-url=""  data-title="Unavailable" style="color: #073975">Study Abroad </a>
                                        @endif
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                @if($headercountryvalidsuniversity->count() > 10)
                                                <li  class="col-lg-12 mega-menu-item" style="padding: 0px;">
                                                    <div class="tabbe">

                                                      <button style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;" class="tabbelinks active" onmouseover="openCity(event, 'country_us')"><span class="flag-icon flag-icon-us mr-1"></span>{!!"&nbsp"!!}United States Of America</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'country_uk')"><span class="flag-icon flag-icon-gb mr-1"></span>{!!"&nbsp"!!}United Kingdom</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'country_canada')"><span class="flag-icon flag-icon-ca mr-1"></span>{!!"&nbsp"!!}Canada</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'country_ireland')"><span class="flag-icon flag-icon-ie mr-1"></span>{!!"&nbsp"!!}Ireland</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'country_australia')"><span class="flag-icon flag-icon-au mr-1"></span>{!!"&nbsp"!!}Australia</button>
                                                      <button  style="
                                                      color: #5d646d;
                                                      font-size: 15px;
                                                      font-weight: 500;"  class="tabbelinks" onmouseover="openCity(event, 'country_Singapore')"><span class="flag-icon flag-icon-sg mr-1"></span>{!!"&nbsp"!!}Singapore</button>
                                                    </div>

                                                    <div id="country_us" class="tabcontent" style=" float: left;
                                                        padding: 0px 12px;
                                                        border: 1px solid #ccc;
                                                        width: 70%;
                                                        border-left: none;
                                                        height: 300px;
                                                        display: block;">
                                                        <ul class="row no-gutters" style="padding-top: 10px;">
                                                        <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                            <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    
                                                                    ">Top Featured Universities</li>
                                                                    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                                                    <?php $headercountries11 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'university');
                                                                    })->where('countries_id',223)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                 @foreach ( $headercountries11 as $headercountry11)
                                                           

                                                                <li><a href="{{route('university_detail',['id'=>$headercountry11->id])}}">{{$headercountry11->university->university_name ?? ''}}</a></li>
                                                           

                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        <li class="col-lg-6 mega-menu-item">
                                                            <ul>
                                                                <li style="
                                                                border: none;
                                                                background: none;
                                                                display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 15px 25px;
                                                                color: #5d646d;
                                                                font-size: 17px;
                                                                font-weight: 600;

                                                                ">Top Ranked Universities</li>
                                                                <?php $headercountries12 = App\Models\User::whereHas('roles', function($q){
                                                                    $q->where('name', 'university');
                                                                })->where('countries_id',223)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>

                                                            @foreach ($headercountries12 as $headercountry12)
                                                            @if($headercountry12->Premium_expire_date < $mytime || $headercountry12->Premium_expire_date == null)
                                                            <li><a href="{{route('university_detail',['id'=>$headercountry12->id])}}">{{$headercountry12->university->university_name ?? ''}}</a></li>
                                                          
@endif
                                                            @endforeach


                                                        </ul>
                                                        </li>
                                                    </ul>

                                                    </div>

                                                    <div id="country_uk" class="tabcontent" style=" float: left;
                                                    padding: 0px 12px;
                                                    border: 1px solid #ccc;
                                                    width: 70%;
                                                    border-left: none;
                                                    height: 300px;
                                                    display: none;">
                                                         <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Top Featured Universities</li>
                                                                        <?php $headercountries21 = App\Models\User::whereHas('roles', function($q){
                                                                            $q->where('name', 'university');
                                                                        })->where('countries_id',222)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>

                                                                        @foreach ($headercountries21 as $headercountry21)
                                  

                                                                    <li><a href="{{route('university_detail',['id'=>$headercountry21->id ?? ''])}}">{{$headercountry21->university->university_name ?? ''}}</a></li>
                                                                    {{-- </form> --}}
                                                           

                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            <li class="col-lg-6 mega-menu-item">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Ranked Universities</li>
                                                                    <?php $headercountries22 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'university');
                                                                    })->where('countries_id',222)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headercountries22 as $headercountry22)
                                
                                                                @if($headercountry22->Premium_expire_date < $mytime || $headercountry22->Premium_expire_date == null)
                                                                <li><a href="{{route('university_detail',['id'=>$headercountry22->id ?? ''])}}">{{$headercountry22->university->university_name ?? ''}}</a></li>
                                                   @endif
                                                                @endforeach

                                                                    {{-- <li><a href="#">MBA <span class="badge bg-2 text-white">New</span></a></li>
                                                                    <li><a href="#">MBBS<span class="badge bg-2 text-white">New</span></a></li>
                                                                    <li><a href="#">Law<span class="badge bg-2 text-white">New</span></a></li>
                                                                    <li><a href="#">Science<span class="badge bg-2 text-white">New</span></a></li>
                                                                    <li><a href="#">Commerce</a></li>
                                                                    <li><a href="#">Arts</a></li> --}}
                                                            </ul>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div id="country_canada" class="tabcontent" style=" float: left;
                                                    padding: 0px 12px;
                                                    border: 1px solid #ccc;
                                                    width: 70%;
                                                    border-left: none;
                                                    height: 300px;
                                                    display: none;">
                                                         <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Top Featured Universities</li>
                                                                        <?php $headercountries31 = App\Models\User::whereHas('roles', function($q){
                                                                            $q->where('name', 'university');
                                                                        })->where('countries_id',38)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                    @foreach ($headercountries31 as $headercountry31)
                                                          


                                                                <li><a href="{{route('university_detail',['id'=>$headercountry31->id ?? ''])}}">{{$headercountry31->university->university_name ?? ''}}</a></li>
                                              
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            <li class="col-lg-6 mega-menu-item">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Ranked Universities</li>
                                                                    <?php $headercountries32 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'university');
                                                                    })->where('countries_id',38)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headercountries32 as $headercountry32)
                                                                @if($headercountry32->Premium_expire_date < $mytime || $headercountry32->Premium_expire_date == null)

                                                                <li><a href="{{route('university_detail',['id'=>$headercountry32->id ?? ''])}}">{{$headercountry32->university->university_name ?? ''}}</a></li>
                                                     @endif
                                                                @endforeach


                                                            </ul>
                                                            </li>
                                                        </ul>

                                                    </div>
                                            <div id="country_ireland" class="tabcontent" style=" float: left;
                                                    padding: 0px 12px;
                                                    border: 1px solid #ccc;
                                                    width: 70%;
                                                    border-left: none;
                                                    height: 300px;
                                                    display: none;">
                                                         <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                        <li style="
                                                                        border: none;
                                                                        background: none;
                                                                        display: -webkit-flex;
                                                                        display: -ms-flex;
                                                                        display: flex;
                                                                        -ms-flex-align: center;
                                                                        align-items: center;
                                                                        justify-content: space-between;
                                                                        position: relative;
                                                                        padding: 15px 25px;
                                                                        color: #5d646d;
                                                                        font-size: 17px;
                                                                        font-weight: 600;

                                                                        ">Featured Universities</li>
                                                                        <?php $headercountries41 = App\Models\User::whereHas('roles', function($q){
                                                                            $q->where('name', 'university');
                                                                        })->where('countries_id',103)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get();?>
                                                                    @foreach ($headercountries41 as $headercountry41)
                                                              

                                                                <li><a href="{{route('university_detail',['id'=>$headercountry41->id ?? ''])}}">{{$headercountry41->university->university_name ?? ''}}</a></li>
                                                            
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            <li class="col-lg-6 mega-menu-item">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Top Ranked Universities</li>

                                                                    <?php $headercountries42 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'university');
                                                                    })->where('countries_id',103)->where('status',1)->orderBy('rating','Desc')->take(7)->get();?>
                                                                @foreach ($headercountries42 as $headercountry42)
                                                                @if($headercountry42->Premium_expire_date < $mytime || $headercountry42->Premium_expire_date == null)

                                                                <li><a href="{{route('university_detail',['id'=>$headercountry42->id ?? ''])}}">{{$headercountry42->university->university_name ?? ''}}</a></li>
                                            @endif
                                                                @endforeach
                                                            </ul>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div id="country_australia" class="tabcontent" style=" float: left;
                                                        padding: 0px 12px;
                                                        border: 1px solid #ccc;
                                                        width: 70%;
                                                        border-left: none;
                                                        height: 300px;
                                                        display: none;">
                                                        <ul class="row no-gutters" style="padding-top: 10px;">
                                                            <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                                <ul>
                                                                    <li style="
                                                                    border: none;
                                                                    background: none;
                                                                    display: -webkit-flex;
                                                                    display: -ms-flex;
                                                                    display: flex;
                                                                    -ms-flex-align: center;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                    position: relative;
                                                                    padding: 15px 25px;
                                                                    color: #5d646d;
                                                                    font-size: 17px;
                                                                    font-weight: 600;

                                                                    ">Featured Universities</li>
                                                                    <?php $headercountries51 = App\Models\User::whereHas('roles', function($q){
                                                                        $q->where('name', 'university');
                                                                    })->where('countries_id',13)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                                @foreach ($headercountries51 as $headercountry51)
                                   
                                                                <li><a href="{{route('university_detail',['id'=>$headercountry51->id ?? ''])}}">{{$headercountry51->university->university_name ?? ''}}</a></li>
                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        <li class="col-lg-6 mega-menu-item">
                                                            <ul>
                                                                <li style="
                                                                border: none;
                                                                background: none;
                                                                display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 15px 25px;
                                                                color: #5d646d;
                                                                font-size: 17px;
                                                                font-weight: 600;

                                                                ">Top Ranked Universities</li>
                                                                <?php $headercountries52 = App\Models\User::whereHas('roles', function($q){
                                                                    $q->where('name', 'university');
                                                                })->where('countries_id',13)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                            @foreach ($headercountries52 as $headercountry52)
                                            
                                                            @if($headercountry52->Premium_expire_date < $mytime || $headercountry52->Premium_expire_date == null)
                                                            <li><a href="{{route('university_detail',['id'=>$headercountry52->id ?? ''])}}">{{$headercountry52->university->university_name ?? ''}}</a></li>
                                            @endif
                                                            @endforeach

                                                                {{-- <li><a href="#">MBA <span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">MBBS<span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">Law<span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">Science<span class="badge bg-2 text-white">New</span></a></li>
                                                                <li><a href="#">Commerce</a></li>
                                                                <li><a href="#">Arts</a></li> --}}
                                                        </ul>
                                                        </li>
                                                     </ul>

                                                </div>
                                                <div id="country_Singapore" class="tabcontent" style=" float: left;
                                                padding: 0px 12px;
                                                border: 1px solid #ccc;
                                                width: 70%;
                                                border-left: none;
                                                height: 300px;
                                                display: none;">
                                                <ul class="row no-gutters" style="padding-top: 10px;">
                                                    <li  class="col-lg-6 mega-menu-item" style="padding: 0px;">
                                                        <ul>
                                                            <li style="
                                                            border: none;
                                                            background: none;
                                                            display: -webkit-flex;
                                                            display: -ms-flex;
                                                            display: flex;
                                                            -ms-flex-align: center;
                                                            align-items: center;
                                                            justify-content: space-between;
                                                            position: relative;
                                                            padding: 15px 25px;
                                                            color: #5d646d;
                                                            font-size: 17px;
                                                            font-weight: 600;

                                                            ">Featured Universities</li>

                                                            <?php $headercountries61 = App\Models\User::whereHas('roles', function($q){
                                                                $q->where('name', 'university');
                                                            })->where('countries_id',188)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get();?>
                                                        @foreach ($headercountries61 as $headercountry61)
                                                    
                                                        <li><a href="{{route('university_detail',['id'=>$headercountry61->id ?? ''])}}">{{$headercountry61->university->university_name ?? ''}}</a></li>
                                                    
                                                        @endforeach

                                                    </ul>
                                                </li>
                                                <li class="col-lg-6 mega-menu-item">
                                                    <ul>
                                                        <li style="
                                                        border: none;
                                                        background: none;
                                                        display: -webkit-flex;
                                                        display: -ms-flex;
                                                        display: flex;
                                                        -ms-flex-align: center;
                                                        align-items: center;
                                                        justify-content: space-between;
                                                        position: relative;
                                                        padding: 15px 25px;
                                                        color: #5d646d;
                                                        font-size: 17px;
                                                        font-weight: 600;

                                                        ">Top Ranked Universities</li>
                                                        <?php $headercountries62 = App\Models\User::whereHas('roles', function($q){
                                                            $q->where('name', 'university');
                                                        })->where('countries_id',188)->where('Premium_expire_date','>',$mytime)->where('status',1)->orderBy('rating','Desc')->take(7)->get(); ?>
                                                    @foreach ($headercountries62 as $headercountry62)
                                                    @if($headercountry62->Premium_expire_date < $mytime || $headercountry62->Premium_expire_date == null)

                                                    <li><a href="{{route('university_detail',['id'=>$headercountry62->id ?? ''])}}">{{$headercountry62->university->university_name ?? ''}}</a></li>
                                            @endif
                                                    @endforeach


                                                </ul>
                                                </li>
                                             </ul>

                                        </div>
                                                    </li>

                                                @endif
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
                                            <li><a href="{{route('faq.front')}}">FAQ</a></li>
                                            {{-- <li><a href="{{route('privacy&policy')}}">Privacy and Policy</a></li>
                                            <li><a href="{{route('terms&condition')}}">Terms and Condition</a></li> --}}



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
                            <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                            @if(auth()->user()->Subscription_expire_date<$mytime || auth()->user()->Subscription_expire_date==NULL)
                            <a @if(auth()->user()->add_university == 0)
                                 href="javascript:void(0);" data-toggle="modal" data-target ="#addUniversityModal"
                                @else
                                 href="{{ route('consultant.subscription') }}"
                                 @endif
                                 class="theme-btn ">Dashboard</a>
                            @else
                        <a href="{{ route('consultant.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif
                           @endif

                            @if(Auth()->user()->isClient())
                        <a href="{{ route('client.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif

                            @if(Auth()->user()->isUniversity())
                            <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                            @if(auth()->user()->Subscription_expire_date<$mytime || auth()->user()->Subscription_expire_date==NULL)
                            <a href="{{ route('university.subscription') }}" class="theme-btn ">Dashboard</a>
                            @else
                           <a href="{{ route('university.dashboard') }}" class="theme-btn ">Dashboard</a>
                            @endif
                            @endif

                            @if(Auth()->user()->isSubadmin())
                            <a href="{{ route('subadmin.dashboard') }}" class="theme-btn ">Dashboard</a>
                                @endif


                            @else
                        {{-- <a href="become-local-expert.html" class="btn btn-primary">Search Courses</a> --}}
                            @endif

                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->

    <div class="modal fade" id="addUniversityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 520px;">
          <div class="modal-content">
            <div class="modal-header">

                    <div>
                        <img src="{{asset('frontEnd/assets/images/logo.png')}}" alt="logo" style="
                        width: 198px;
                        height: 70px;
                         ">
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>


            </div>
            <div class="modal-body">
                <div class="contact-form-action" style=" padding: 19px;">
                    <form method="post" action="">
                        @csrf
                        <div class="sidebar-widget single-content-widget">
                            <h5 class="title stroke-shape">Choose University</h5>
                            <div class="enquiry-forum">
                                <div class="form-box">
                                    <div class="form-content">
                                        <?php $universities = \App\Models\University::get();  ?>
                                        <div class="contact-form-action">
                                            <input class="form-control" value="1" name="type"  hidden>
                                                <div class="input-box" >
                                                    <span class="la la-university mr-1 form-icon"></span>
                                                    <label class="label-text">Select University</label>

                                                    <div class="form-group">

                                                        <select class="selectpicker" multiple data-live-search="true"  placeholder="University" id="university" name="university">

                                                            @foreach($universities as $university)

                                                                <option value="{{$university->user_id ?? ''}}">{{$university->university_name ?? ''}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div id="universityError"></div>
                                                        {{-- <input class="form-control" type="name" name="name" placeholder="Your name" required> --}}
                                                    </div>
                                                </div>

                                                {{-- <div class="input-box">
                                                    <div class="form-group">
                                                        <div class="custom-checkbox mb-0">
                                                            <input type="checkbox" id="agreeChb">
                                                            <label for="agreeChb">I agree with <a href="#">Terms of Service</a> and
                                                                <a href="#">Privacy Statement</a></label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="btn-box">
                                                    <button type="submit" class="theme-btn">Submit Enquiry</button>
                                                </div> --}}

                                        </div><!-- end contact-form-action -->
                                    </div><!-- end form-content -->
                                </div><!-- end form-box -->
                            </div><!-- end enquiry-forum -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="skip">Skip</button>
              <button type="button" class="btn btn-primary" id="universitySubmit">Submit</button>
            </div>
          </div>
        </div>
      </div>
</header>



