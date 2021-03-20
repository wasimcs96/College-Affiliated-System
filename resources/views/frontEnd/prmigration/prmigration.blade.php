@extends('frontEnd.layout.master')
@section('content')



<section class="breadcrumb-area bread-bg-8">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="search-result-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Search Consultant</h2>
                        </div>
                        <div class="search-fields-container margin-top-30px"  style="
                        background: none;
                    ">
                            <div class="contact-form-action">
                                <form action="{{route('prmigration.search.result')}}" method="POST" class="row" style="display: flex;justify-content: center;">
@csrf
                                    {{-- <div class="col-lg-4 col-sm-2">
                                        <div class="input-box">
                                            <label class="label-text">Name</label>
                                            <div class="form-group">
                                                <input class=" form-control" type="text" name="Consultant Name " Placeholder="Search Consultant by Name">

                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text" style="color: white">Country</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <div class="select-contain w-auto">
                                                    <select  name="country" class="select-contain-select">
                                                        <?php $countries = App\Models\Country::all();?>
                                                        <option value=""  >Select Country</option>
                                                        @if($countries->count() > 0)
                                                         @foreach($countries as $countryt)
                                                            <option value="{{$countryt->countries_id}}" @if(isset($country) && $country == $countryt->countries_id) selected @endif >{{$countryt->countries_name}}</option>
                                                         @endforeach

                                                        @else

                                                            <option value="">Currently Unavailable</option>

                                                        @endif

                                                    </select>
                                                </div>                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    {{-- <div class="col-lg-4 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">University </label>
                                            <div class="form-group">

                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select">
                                                        <option value="1" selected>ATU</option>
                                                        <option value="2">BTU</option>
                                                        <option value="3">CTU</option>
                                                        <option value="4">DTU</option>
                                                        <option value="5">ETU</option>
                                                        <option value="6">FTU</option>
                                                        <option value="7">GTU</option>



                                                    </select>
                                                </div>                                            </div>
                                        </div>
                                    </div><!-- end col-lg-2 --> --}}
                                    {{-- <div class="col-lg-2 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Courses</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select">
                                                        <option value="1200AM">Btech</option>
                                                        <option value="1230AM">Btech</option>
                                                        <option value="0100AM">Btech</option>
                                                        <option value="0130AM">Btech</option>
                                                        <option value="0200AM">Btech</option>
                                                        <option value="0230AM">Btech</option>
                                                        <option value="0300AM">Btech</option>
                                                        <option value="0330AM">Btech</option>
                                                        <option value="0400AM">Btech</option>
                                                        <option value="0430AM">Btech</option>
                                                        <option value="0500AM">Btech</option>
                                                        <option value="0530AM">Btech</option>
                                                        <option value="0600AM">Btech</option>
                                                        <option value="0630AM">Btech</option>

                                                        <option value="0730AM">Btech</option>

                                                        <option value="0900AM" selected>Mtech</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 --> --}}
                                    {{-- <div class="col-lg-2 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Drop-off Date</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" name="daterange-single" value="04/28/2020">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-2 --> --}}
                                    <!-- end col-lg-3 -->
                                    <div class="btn-box pt-3 col-lg-2" style="margin-top: 22px;">
                                        <button class="theme-btn" type="submit">Search Now</button>
                                    </div>
                                </form>
                            </div><!-- end contact-form-action -->

                        </div><!-- end search-fields-container -->
                    </div><!-- end search-result-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        {{-- <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg> --}}
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CARD AREA
================================= -->
<section class="card-area section--padding">
    <div class="container">

        <div class="row">

        </div><!-- end row -->

        <div class="row">

            @if(count($consultants) > 0)
        @foreach($consultants as $consultant)
        @if($consultant->isConsultant())

        <div class="col-lg-4 responsive-column">
            <div class="card-item car-card border">
                <div class="card-img" style="text-align: center; height:185px;">
                    <div>
                    <a href="javascript:void(0)" class="d-block">
                        @if(isset($consultant->consultant->cover_image) && file_exists($consultant->consultant->cover_image))
                                            <img
                                             style=" width: 368px;
                                            height: 245px;"
                                            src="{{asset($consultant->consultant->cover_image)}}" alt="">
                                                @else
                                                <img style=" width: 368px; height: 245px;" src="{{asset('frontEnd/assets/images/img21.jpg')}}" >
                                                @endif
                    </a>
                    <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($consultant->profile_image) && file_exists($consultant->profile_image))
                        <img
                        style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                        src="{{asset($consultant->profile_image)}}" alt="">
                            @else
                            <img  style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                            @endif</div>
                            <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                            @if($consultant->Premium_expire_date > $mytime)<span style="
                            background-color: #073975;
                        " class="badge">Premium</span> @endif
                    {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                        <i class="la la-heart-o"></i>
                    </div> --}}
                </div>
                </div>
                <div class="card-body">
                    {{-- <p class="card-meta">{{$consultant->website}} Premium </p> --}}
                    <h3 class="card-title"><a href="javascript:void(0)">{{$consultant->first_name}} {{$consultant->last_name}}</a>   @if($consultant->is_verified == 1)
                        <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>
                    @endif</h3>
                    <div class="card-rating">
                        <div class="d-flex flex-wrap align-items-center pt-2">
                            <p class="mr-2">Rating:</p>

                                <span>@if($consultant->rating == 3 ?? '' )
                                        <span class="ratings ">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                        </span>
                                @elseif($consultant->rating == 4 ?? '' )
                                <span class="ratings ">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                @elseif($consultant->rating == 5 ?? '' )
                                <span class="ratings ">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                                @elseif($consultant->rating == 1 ?? '' )
                                <span class="ratings ">
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                @elseif($consultant->rating == 2 ?? '' )
                                <span class="ratings ">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                @endif</span>   {!!"&nbsp;"!!}     <span class="badge badge-warning text-white font-size-16">@if($consultant->rating == null) - @else{{$consultant->rating ?? ''}}/5 @endif</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-attributes">
                        <ul class="d-flex align-items-center">
                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established"><i class="las la-calendar"></i><span>   @if(isset($consultant->consultant->created_at))
                                {{$consultant->consultant->created_at->Format("Y") ?? ''}}
                                @else N/A @endif</span></li>
                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="On Going Booking"><i class="la la-book"></i><span> @if(isset($consultant->consultantBooking))
                                {{$consultant->consultantBooking->count()}}@else N/A @endif</span></li>
                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated university"><i class="las la-university"></i><span> @if(isset($consultant->consultantUniversity))
                                {{$consultant->consultantUniversity->count()}}@else N/A @endif</span></li>
                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Client"><i class="las la-users"></i><span>
                                @if(isset($consultant->consultantUniversityClient))
                                {{$consultant->consultantUniversityClient->count()}}@else N/A @endif</span></li>
                        </ul>
                    </div>
                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Location"><i class="las la-map-marker-alt"></i> {{ $consultant->address_1 ?? '' }}</li>
                    <div class="card-price d-flex align-items-center justify-content-between">
                        <p
                         {{-- style="
                        white-space: pre-line;
                    " --}}
                    >
                            <span class="price__text">City :</span>
                            <span class="price__num">{{$consultant->city}}</span>
                        </p>
                        @if(auth()->user())
                        @if(auth()->user()->isClient())
                        <form action="{{route('prmigration.book')}}" method="post">
                            @csrf
                            <input type="hidden" value="@if(isset($countrycoming)){{$countrycoming}} @endif" name="countrycomming">
                            <input type="hidden" value="{{$consultant->id ?? ''}}" name="consultant_id">
                        <button  type="submit" class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></button>
                        </form>
                        @else
                        <a href="{{route('consultant_detail',['id' => $consultant->id])}}" class="theme-btn theme-btn-small mt-2">Detail<i class="las la-angle-double-right"></i></a>
                        @endif
                        @else
                        <a href="javascript:void(0)"  data-toggle="modal" data-target="#loginPopupForm" class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></a>
                        @endif
                    </div>
                </div>
            </div><!-- end card-item -->
        </div>
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
         <img src="{{asset('frontEnd/assets/images/noresult.gif')}}">
            </div>
            @endif
        </div><!-- end row -->

        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="btn-box mt-3 text-center">
                    <button type="button" class="theme-btn"><i class="la la-refresh mr-1"></i>Load More</button>
                    <p class="font-size-13 pt-2">Showing 1 - 6 of 44 Cars</p>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row --> --}}
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-90px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column">
                <a href="{{route('contact')}}" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                        <i class="la la-phone"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Need Help? Contact us</h4>
                        <p class="info__desc">
                    Need Help Contact Us
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="{{route('faq.front')}}" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                        <i class="lar la-question-circle"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">FAQ</h4>
                        <p class="info__desc">
                            Find Answer Of your Query
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="{{route('blog_all')}}" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                        <i class="la la-blog"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Blog</h4>
                        <p class="info__desc">
                    Check Out our Blogs
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
{{-- <section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="sec__title font-size-30 text-white">Subscribe to see Secret Deals</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="subscriber-box">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text text-white">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Subscribe</button>
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section> --}}
@include('frontEnd.modals.loginModal')
@endsection

@section('per_page_script')
<script>
    $(document).on('click', '#loginSubmit', function ()
    {
    var email=$('#email').val();
    var password=$('#password').val();
    if(email=='' || password=='')
    {
        if(email=='')
        {
        $('#emptyEmail').html('<span style="color: red;">*Please enter email.</span> ');
        document.getElementById("login-form").reset();
        }
        else
        {
        $('#emptyPassword').html('<span style="color: red;">*Please enter password.</span> ');
        document.getElementById("login-form").reset();
        }
    }

    else
    {
    $.ajaxSetup({headers:
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    type: "post",
    url: "{{route('login.check')}}",
    data: {email:email},
    success: function (result) {
    console.log(JSON.parse(result));

    if(JSON.parse(result)==false)
    {
        $('#loginTop').html('<span style="color: red;">(Your Account is Deactivated. Please Contact to Admin for Details.)</span> ');
    }
    else{
    $('#login-form').submit();
    }

    }
    });
}
    });
  </script>
  <script>
    $(document).on('click', '#closeLoginForm', function ()
    {
        document.getElementById("login-form").reset();
    });
  </script>
@endsection
