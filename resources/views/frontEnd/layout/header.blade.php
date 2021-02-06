<header class="header-area" >
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="#"><i class="la la-phone mr-1"></i>(123) 123-456</a></li>
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
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
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
                                        <a href="#">Courses<i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                <?php $headervalid = App\Models\Category::all(); ?>
                                                @if($headervalid->count() == 21)
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercourses = App\Models\Category::take(7)->get(); ?>
                                                      @foreach ($headercourses as $item)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{$item->id}}">

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
                                                        font-weight: 500;">{{$item->title}}</button></li>
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
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercoursesms = App\Models\Category::skip(7)->take(7)->get(); ?>
                                                      @foreach ($headercoursesms as $itemit)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{$itemit->id}}">

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
                                                        font-weight: 500;">{{$itemit->title}}</button></li>
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
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercourse = App\Models\Category::skip(14)->take(7)->get(); ?>
                                                      @foreach ($headercourse as $itemsm)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{$itemsm->id}}">

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
                                                        font-weight: 500;">{{$itemsm->title}}</button></li>
                                                    </form>
                                                      @endforeach

                                                    </ul>
                                                </li>
                                                @else
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercoursev2 = App\Models\Category::take(7)->get(); ?>
                                                      @foreach ($headercoursev2 as $hcc)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{$hcc->countries_id}}">

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
                                                        font-weight: 500;">{{$hcc->countries_name}}</button></li>
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
                                                <li class="col-lg-8 mega-menu-item">
                                                    <ul>
                                                        <?php $headercourse = App\Models\Category::skip(7)->take(7)->get(); ?>
                                                      @foreach ($headercourse as $itemsm)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{$itemsm->id}}">

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
                                                        font-weight: 500;">{{$itemsm->title}}</button></li>
                                                    </form>
                                                      @endforeach

                                                    </ul>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">Consultants <i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                <?php $headercountryvalid = App\Models\Country::all(); ?>
                                                @if($headercountryvalid->count() > 21)
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercountry = App\Models\Country::take(7)->get(); ?>
                                                        @foreach ($headercountry as $itemcountry)
                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                          @csrf
                                                      <input type="hidden" name="category" value="{{$itemcountry->countries_id}}">

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
                                                          font-weight: 500;">{{$itemcountry->countries_name}}</button></li>
                                                      </form>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercountry2 = App\Models\Country::skip(7)->take(7)->get(); ?>
                                                        @foreach ($headercountry2 as $itemcountry2)
                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                          @csrf
                                                      <input type="hidden" name="category" value="{{$itemcountry2->countries_id}}">

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
                                                          font-weight: 500;">{{$itemcountry2->countries_name}}</button></li>
                                                      </form>
                                                        @endforeach

                                                    </ul>
                                                </li>

                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercountry3 = App\Models\Country::skip(14)->take(7)->get(); ?>
                                                        @foreach ($headercountry3 as $itemcountry3)
                                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                          @csrf
                                                      <input type="hidden" name="category" value="{{$itemcountry3->countries_id}}">

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
                                                          font-weight: 500;">{{$itemcountry3->countries_name}}</button></li>
                                                      </form>
                                                        @endforeach

                                                    </ul>
                                                </li>

                                                @else
                                                <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <?php $headercountryvalid = App\Models\Country::take(7)->get(); ?>
                                                      @foreach ($headercountryvalid as $headercountryv)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{$headercountryv->countries_id}}">

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
                                                        font-weight: 500;">{{$headercountryv->countries_name}}</button></li>
                                                    </form>
                                                      @endforeach

                                                    </ul>
                                                </li>
                                                <li class="col-lg-8 mega-menu-item">
                                                    <ul>
                                                        <?php $headercountryvalid2 = App\Models\Country::skip(7)->take(7)->get(); ?>
                                                      @foreach ($headercountryvalid2 as $headercountryv2)
                                                      <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="category" value="{{ $headercountryv2->id}}">

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
                                                        font-weight: 500;">{{ $headercountryv2->countries_name}}</button></li>
                                                    </form>
                                                      @endforeach

                                                    </ul>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="#">Study Abroad <i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                {{-- <li class="col-lg-4 mega-menu-item">
                                                    <ul>
                                                        <li><a href="add-hotel.html">Study Abroad<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-flight.html">Courses Abroad <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-tour.html">Colleges in Abroad<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-cruise.html">Consultants in Abroad<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="add-car.html">Search Colleges<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="user-dashboard.html">Visa Rules</a></li>
                                                        <li><a href="admin-dashboard.html">How to book a consultant</a></li>
                                                    </ul>
                                                </li> --}}
                                                <li class="col-lg-8 mega-menu-item">
                                                    <ul>
                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="223">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in United States of America</button> </a></form></li>

                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="222">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in United Kingdom</button> </a></form></li>

                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="13">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in Australia</button> </a></form></li>

                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="38">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in Canada</button> </a></form></li>

                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="103">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in Ireland</button> </a></form></li>

                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="99">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in India</button> </a></form></li>

                                                        <li><form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                                            <input type="hidden" name="countries_id" value="222">
                                                            @csrf<a> <button style="border: none;background: none;     display: -webkit-flex;
                                                                display: -ms-flex;
                                                                display: flex;
                                                                -ms-flex-align: center;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                position: relative;
                                                                padding: 3px 25px;
                                                                color: #5d646d;
                                                                font-size: 15px;
                                                                font-weight: 500;" type="submit">Search Universities in Germany</button> </a></form></li>
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
                                 href="javascript:void(0);" data-toggle="modal" data-target ="#exampleModal"
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
                        <a href="become-local-expert.html" class="btn btn-primary">Search Courses</a>
                            @endif

                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <div class="contact-form-action">
                                            <input class="form-control" value="1" name="type"  hidden>
                                                <div class="input-box" id="universityError">
                                                    <span class="la la-university mr-1 form-icon"></span>
                                                    <label class="label-text">Select University</label>

                                                    <div class="form-group">

                                                        <select class="selectpicker" multiple data-live-search="true"  placeholder="University" id="university" name="university">
                                                            <?php $universities = \App\Models\University::get();  ?>
                                                            @foreach($universities as $university)

                                                                <option value="{{$university->user_id}}">{{$university->university_name}}</option>
                                                            @endforeach
                                                        </select>
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



