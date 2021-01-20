@extends('frontEnd.layout.master')
@section('content')



<section class="breadcrumb-area bread-bg-8">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="search-result-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white"> University Search Result</h2>
                        </div>
                        <div class="search-fields-container margin-top-30px">
                            <div class="contact-form-action">
                                <form action="{{route('universities_inner_fetch.universities')}}" method="POST" class="row">
                                    @csrf
                                    <div class="col-lg-4 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">University Name</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <input class="form-control" type="text" name="keyword" placeholder="University">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-2 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Country</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                <select class="select-contain-select" name="countries_id">
                                                    <?php $countries = App\Models\Country::all();?>
                                                    <option value="">
                                                        Select Country
                                                    </option>
                                                    @if($countries->count() > 0)
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->countries_id}}" @if(isset($countrycoming) && $countrycoming == $country->countries_id) selected @endif>{{$country->countries_name}}</option>
                                                    @endforeach

                                                    @else

                                                        <option value="">Currently Unavailable</option>

                                                    @endif

                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-2 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Course Type</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select id="typeselect" name="type" class="select-contain-select">
                                                        <option value="">
                                                            Select Type
                                                        </option>
                                                        <?php $courses = App\Models\Course::all();
                                                        $type=[
                                                            0=>"UG",
                                                            1=>"PG",
                                                            2=>"Diploma"
                                                        ];
                                                        ?>

                                                        @foreach($type as $key=>$course)
                                                        <option value="{{$key}}" @if(isset($typecoming) && $typecoming == $key) selected @endif>
                                                            {{$course}}
                                                        </option>

                                                       @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Course</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="course_id">
                                                        <option value="">
                                                            Select Course
                                                        </option>
                                                    @foreach ($courses as $item)
                                                    <option value="{{$item->id}}" @if(isset($course_id) && $course_id == $item->id) selected @endif>{{$item->name}}</option>

                                                    @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                   <!-- end col-lg-2 -->


                            </div><!-- end contact-form-action -->

                            <div class="btn-box pt-3">
                                <button class="theme-btn" type="submit">Search Now</button>
                            </div>
                        </form>
                        </div><!-- end search-fields-container -->
                    </div><!-- end search-result-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
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
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-30px">
                    <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                        <div>
                            <h3 class="title font-size-24">New York: 44 University found</h3>
                            <p class="font-size-14"><span class="mr-1 pt-1">Study with confidence:</span>No University Found</p>
                        </div>
                        <div class="layout-view d-flex align-items-center">
                            <a href="car-grid.html" data-toggle="tooltip" data-placement="top" title="Grid View" class="active"><i class="la la-th-large"></i></a>
                            <a href="car-list.html" data-toggle="tooltip" data-placement="top" title="List View"><i class="la la-th-list"></i></a>
                        </div>
                    </div><!-- end filter-top -->

                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            @foreach($universities as $university)
            @if($university->isUniversity())
            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img"  style="
                    width: 368px;
                    height: 212px;
                ">
                    <a href="{{route('university_detail',['id'=>$university->id])}}" class="d-block">
                        {{-- @php
                        print_r($university->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($university->profile_image)}}" alt="university-img" > --}}
                            @if(isset($university->profile_image) && file_exists($university->profile_image))
                            <img style=" width=368px; height=213px;" src="{{asset($university->profile_image)}}" alt="">
                                @else
                                <img style=" width: 368px; height: 213px;" src="{{asset('frontEnd/assets/images/university.jpg')}}" >
                                @endif
                        </a>
                        {{-- <span class="badge">Top Ranked</span> --}}
                        {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                            <i class="la la-heart-o"></i>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <p class="card-meta">
                            @if(isset($university->university->type))
                             @if($university->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif

                        <h3 class="card-title"><a href="{{route('university_detail',['id'=>$university->id])}}">{{$university->university->university_name ?? ''}}</a></h3>
                        <div class="card-rating">
                            <span class="badge text-white">4.4/5</span>
                            <span class="review__text">Average</span>
                            <span class="rating__text">(30 Reviews)</span>
                        </div>
                        <div class="card-attributes">
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Available Courses"><i class="las la-book"></i><span>{{$university->universityCourse->count()}}</span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Consultant"><i class="la la-users"></i><span>{{$university->universityConsultant->count()}}</span></li>
                            </ul>
                        </div>
                        <div class="card-price d-flex align-items-center justify-content-between">
                            {{-- <p>
                                <span class="price__num">$2300</span>
                                <span class="price__text">Total fees</span>
                            </p> --}}
                            <a href="{{route('university_detail',['id'=>$university->id])}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div>
            @endif
            @endforeach

        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box mt-3 text-center">
                    <button type="button" class="theme-btn"><i class="la la-refresh mr-1"></i>Load More</button>
                    <p class="font-size-13 pt-2">Showing 1 - 6 of 44 university</p>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
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
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                        <i class="la la-phone"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Need Help? Contact us</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                        <i class="la la-money"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Payments</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                        <i class="la la-times"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Cancel Policy</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
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
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
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
</section>
@endsection
