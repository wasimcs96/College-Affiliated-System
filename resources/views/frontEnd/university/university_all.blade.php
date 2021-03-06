@extends('frontEnd.layout.master')
@section('title','Campus Interest - University All')
@section('content')



<section class="breadcrumb-area bread-bg-8 " style=" top: -72px;">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="search-result-content">
                        <div class="section-heading">
                            {{-- <h2 class="sec__title text-white"> @if(isset($page)&& $page == 1)University Search Result @else Course Search Result @endif</h2> --}}
                        </div>
                        <div class="search-fields-container margin-top-30px" style="
                        background-color: transparent; color:white;
                    ">
                            <div class="contact-form-action">
                                <form action="{{route('universities_inner_fetch.universities')}}" method="POST" class="row">
                                    @csrf

                                    <div class="col-lg-3 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text" style="
                                            color: white;
                                        ">Country</label>
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
                                    {{-- <div class="col-lg-3 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text" style="
                                            color: white;
                                        ">University Name</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <input class="form-control" type="text" name="keyword" placeholder="University">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 --> --}}

                                    <div class="col-lg-3 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text" style="
                                            color: white;
                                        ">University Type</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select id="typeselect" name="type" class="select-contain-select">
                                                        <option value="">
                                                            Select Type
                                                        </option>
                                                        <?php $courses = App\Models\Course::all();
                                                        $type=[
                                                            0=>"PRIVATE",
                                                            1=>"GOVERMENT"

                                                        ];
                                                        ?>

                                                        @foreach($type as $keyt=>$course)
                                                        <option value="{{$keyt}}" @if(isset($typecoming) && $typecoming == $keyt) selected @endif>
                                                            {{$course}}
                                                        </option>

                                                       @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <!-- end col-lg-2 -->
                                   <div class="col-lg-3 col-sm-2 pr-0">
                                    <div class="input-box">
                                        <label class="label-text" id="ali" style="
                                        color: white;
                                    ">Discipline</label>
                                        <div class="form-group">
                                            <div class="select-contain w-auto">
                                                <select id="categoryselect" name="filtercatgory" class="select-contain-select typeselect" style="
                                                padding: 15px;
                                            ">
                                                    <option value="">
                                                        Select Discipline
                                                    </option>
                                                    <?php $categories = App\Models\Category::all();?>
                                        @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($filtercatgory) && $filtercatgory == $category->id) selected @endif >{{$category->title}}</option>
                                        @endforeach

                                        @else

                                            <option value="">Currently Unavailable</option>

                                        @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!-- end col-lg-3 -->
                               <!-- end col-lg-3 -->
                               <div class="col-lg-3 col-sm-2 pr-0" >
                                <div class="input-box">
                                    <label class="label-text" style="color: white;">Sub Discipline</label>
                                    <div class="form-group">
                                        <div class="select-contain w-auto">
                                            <select id="selectcourse" name="filtersub_category" class="form-control ert"   style="
                                            height: 52px;
                                        ">
                                                <option value="" selected>Select Sub Discipline</option>
                                                @if(isset($filtercatgory))
                                                <?php $subcategories = App\Models\Category::where('parent_id',$filtercatgory)->get();?>

                                                @if($subcategories->count() > 0)
                                                @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" @if(isset($filtersub_category)&& $filtersub_category == $subcategory->id) selected @endif >{{$subcategory->title}}</option>
                                                @endforeach

                                                @else

                                                    <option value="">Currently Unavailable</option>

                                                @endif
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="col-lg-3 col-sm-2 pr-0" >
                                    <div class="input-box">
                                        <label class="label-text" style="
                                        color: white;
                                    ">Study Level</label>
                                        <div class="form-group">
                                            <div class="select-contain w-auto">
                                                <select  name="study_level" class="select-contain-select"   style="
                                                height: 52px;
                                            ">

                                                    <option value="" selected>Select Study Level</option>


                                                    @php
                                                    $levels=Config::get('level.study_level');
                                                    @endphp

                                                    @foreach($levels as $key=>$level)
                                                            <option value="{{$key}}" @if(isset($study_level)&& $study_level==$key)selected @endif>{{$level}}</option>
                                                    @endforeach



                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-2 pr-0" >
                                    <div class="input-box">
                                        <label class="label-text" style="
                                        color: white;
                                    ">IELTS Rating</label>
                                        <div class="form-group">
                                            <div class="select-contain w-auto">
                                                <select  name="ielts_rating" class="select-contain-select"   style="
                                                height: 52px;
                                            ">
                                            <option value="" selected>Select IELTS Rating</option>
                                            <option value="1" @if(isset($ielts_rating)&& $ielts_rating==1)selected @endif>1</option>
                                                    <option value="2"  @if(isset($ielts_rating)&& $ielts_rating==2)selected @endif>2</option>
                                                    <option value="3"  @if(isset($ielts_rating)&& $ielts_rating==3)selected @endif>3</option>

                                                    <option value="4" @if(isset($ielts_rating)&& $ielts_rating==4)selected @endif>4</option>
                                                    <option value="5"  @if(isset($ielts_rating)&& $ielts_rating==5)selected @endif>5</option>
                                                    <option value="6" @if(isset($ielts_rating)&& $ielts_rating==6)selected @endif>6</option>
                                                    <option value="7"  @if(isset($ielts_rating)&& $ielts_rating==7)selected @endif>7</option>
                                                    <option value="8"  @if(isset($ielts_rating)&& $ielts_rating==8)selected @endif>8</option>

                                                    <option value="9" @if(isset($ielts_rating)&& $ielts_rating==9)selected @endif>9</option>
                                                    <option value="10"  @if(isset($ielts_rating)&& $ielts_rating==10)selected @endif>10</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-2 pr-0" >
                                    <div class="input-box">
                                        <label class="label-text" style="
                                        color: white;
                                    ">Rating</label>
                                        <div class="form-group">
                                            <div class="select-contain w-auto">
                                                <select  name="rating" class="select-contain-select"   style="
                                                height: 52px;
                                            ">
                                                    <option value="" selected>Select Rating</option>

                                                    <option value="1" @if(isset($rating)&& $rating==1)selected @endif>1</option>
                                                    <option value="2"  @if(isset($rating)&& $rating==2)selected @endif>2</option>
                                                    <option value="3"  @if(isset($rating)&& $rating==3)selected @endif>3</option>

                                                    <option value="4" @if(isset($rating)&& $rating==4)selected @endif>4</option>
                                                    <option value="5"  @if(isset($rating)&& $rating==5)selected @endif>5</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <input type="hidden" value="22" name="inner_check">

                                   <div class="col-lg-3 col-sm-2 pr-0">
                                       <button class="theme-btn" type="submit"  style="
                                       margin: 37px;
                                       margin-left: 4px;
                                   ">Search Now</button>
                                   </div>
                            </div><!-- end contact-form-action -->

                        </form>
                        </div><!-- end search-fields-container -->
                    </div><!-- end search-result-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">

    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CARD AREA
================================= -->
<section class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="testimonial-carousel-ad carousel-action">
    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d'); $advertisement=App\Models\Advertisement::where('status',1)->where('type',0)->where('expire_date','>',$mytime)->get(); ?>
    @foreach($advertisement as $advertise)
                    <div class="col-lg-12">
                    <a href="{{$advertise->link}}"  id="click_count" link_click="{{$advertise->id}}" target="_blank">
                    <div class="discount-box">
                        <div class="discount-img">

                            @if(isset($advertise->banner_image) && file_exists($advertise->banner_image))
                            <img  src="{{asset($advertise->banner_image)}}" height="159px;" alt="" class="d-block w-100">
                                @else
                                <img src="{{asset('frontEnd/assets/images/discount-hotel-img.jpg')}}"  height="159px;"  alt="discount img">
                                @endif
                        </div>
                        <!-- end discount-img -->
                        <div class="discount-content">
                            {{-- <div class="section-heading"> --}}
                                {{-- <p class="sec__desc text-white">Hot deal, save 50%</p> --}}
                                {{-- <h6 class="sec__title mb-0 line-height-50 text-white"></h6> --}}
                            {{-- </div><!-- end section-heading --> --}}
                            <div class="btn-box pt-4">
                                {{-- <a href="#" class="theme-btn border-0">Learn More <i class="la la-arrow-right ml-1"></i></a> --}}
                            </div>
                        </div><!-- end discount-content -->
                        <div class="company-logo">
                            <img src="images/logo2.png" alt="">
                            <p class="text-white font-size-14 text-right">Published By: {!!"&nbsp"!!} {{$advertise->user->first_name ?? ''}}</p>
                        </div><!-- end company-logo -->
                    </div>
                </a>
                <div style="
                text-align: end;
            ">

                    {{-- <span style="">ad</span> --}}
                    <label for="">AD</label>
                </div>
                </div>
                @endforeach
        </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section>
<section class="card-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            @if(count($universities) > 0)
            @foreach($universities as $university)
@if($university)
            @if($university->isUniversity())
    <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img" style="text-align: center; height:185px;">
                    <a href="{{route('university_detail',['id'=>$university->id])}}" class="d-block">
                        {{-- @php
                        print_r($university->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($university->profile_image)}}" alt="university-img" > --}}
                            @if(isset($university->university->cover_image) && file_exists($university->university->cover_image))
                            <img
                              {{-- style=" width: 368px;
                            height: 245px;"  --}}
                            src="{{asset($university->university->cover_image)}}" height="185px;"alt="">
                                @else
                                <img
                                  {{-- style=" width: 368px;
                                height: 245px;"  --}}
                                src="{{asset('frontEnd/assets/images/university.jpg')}}" height="185px;">
                                @endif
                        </a>
                        <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($university->profile_image) && file_exists($university->profile_image))
                            <img
                            style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                            src="{{asset($university->profile_image)}}" alt="">
                                @else
                                <img style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                @endif</div>

                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                        @if($university->Premium_expire_date > $mytime)<span style="
                        background-color: #073975;
                    " class="badge">Premium</span> @endif
                        {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Download Brochure">

                            <i class="las la-download"></i>
                        </div> --}}
                    </div>
                    <div class="card-body">
                    <?php
                                    $myuniversity =$university->university->university_name ?? '';

                                     ?>
                                            <h3 class="card-title" title="{{$university->university->university_name ?? ''}}" style="
                                            white-space: nowrap;
                                            overflow: hidden;
                                        ">
                                                <a href="{{route('university_detail',['id'=>$university->id])}}">

                                             @if(isset($filtersub_category) && $filtersub_category != null)
                                             <?php $univercoursecount =App\Models\UniversityCourse::where('category_id', $filtersub_category)->where('user_id',$university->id)->count()-1;
                                              $univercourse=App\Models\UniversityCourse::where('category_id', $filtersub_category)->where('user_id',$university->id)->first(); ?>
                                              {{-- {{ dd(univercourse) }} --}}
                                              {{-- {{dd($filtersub_category)}} --}}
                                              @if($univercourse != null)
                                              {{$univercourse->title ?? ''}} &nbsp;  @if(isset($univercoursecount) && $univercoursecount > 1)<span  style="font-size: small;">+{{$univercoursecount}} courses</span>@endif
                                              @endif

                                              @if($univercourse == null)
                                              @if(isset($university->university->university_name))<?php echo($myuniversity)?> @else N/A @endif
                                                      @endif
                                              @endif
                                              @if(isset($filtersub_category) && $filtersub_category == null)
                                              @if(isset($university->university->university_name))<?php echo($myuniversity)?> @else N/A @endif
                                                      @endif
                                        @if(isset($page)&& $page == 1)
                                        @if(isset($university->university->university_name))<?php echo($myuniversity)?> @else N/A @endif
                                        @endif

                                    </a>

                                    @if($university->is_verified == 1)
                                    <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>

                               @endif

                                            </h3>
                        <p class="card-meta">
                            @if(isset($page)&& $page == 1)
                            @if(isset($university->university->type))
                             @if($university->university->type==0)
                        Private
                    @else
                    Govenment
                    @endif
                    @else
                    N/A
                    @endif
@else
@if(isset($university->university->university_name))<a href="{{route('university_detail',['id'=>$university->id])}}" style="color: gray;">{{$university->university->university_name}}</a> @else N/A @endif
@endif
                </p>

                        <div class="card-rating">
                            <div class="d-flex flex-wrap align-items-center pt-2">
                                <p class="mr-2">Rating:</p>
                        @if(isset($university->rating))
                                    <span>@if($university->rating == 3 ?? '' )
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                                <i class="la la-star-o"></i>
                                            </span>
                                    @elseif($university->rating == 4 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($university->rating == 5 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                    </span>
                                    @elseif($university->rating == 1 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($university->rating == 2 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @endif
                                </span>
                                    {!!"&nbsp;"!!}
                                    <span class="badge badge-warning text-white font-size-16">
                                        @if($university->rating == null)- @else{{$university->rating ?? ''}}/5 @endif
                                    </span>
                                    @else
                                    <span class="badge badge-warning text-white font-size-16">
                                        @if($university->rating == null)- @else{{$university->rating ?? ''}}/5 @endif
                                    </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="card-attributes">
                            <p style="">
                                <span class="price__text">Average Fees :</span>
                                <span class="price__num">{{ Config::get('define.currency.currency') }} {{$university->university->average_fees ?? ''}}</span>
                                {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                            </p>
                            <ul class="d-flex align-items-center">
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established "><i class="las la-history"></i><span>   @if(isset($university->university->established_at))
                                                        {{$university->university->established_at}}
                                                        @else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="InTakes:{{$university->university->in_takes ?? ''}}"><i class="las la-calendar-day"></i><span>@if(isset($university->university->in_takes)){{$result = count(explode(',',$university->university->in_takes))}} @else N/A @endif</span></li>
                                                    <!-- <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated Consultants"><i class="la la-user"></i><span>
                                                        @if(isset($us->universityConsultant))
                                                        {{$us->universityConsultant->count()}}@else N/A @endif</span></li> -->
                                                        <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="IELTS Rating : {{$university->university->iltes ?? ''}}"><i class="las la-clipboard-list"></i><span>   @if(isset($university->university->iltes))
                                                            {{$university->university->iltes ?? ''}}
                                                            @else - @endif</span></li>
                                </ul>
                        </div>

                        <div class="card-price d-flex align-items-center justify-content-between">
                            @if(auth()->user())
                                               <a href="{{asset($university->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload" style="
                                                    height: 38px;
                                                    padding-top: 9px;
                                                ">Brochure</a>
                                                @else
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#loginPopupForm" class="buttonDownload" style="
                                                    height: 38px;
                                                    padding-top: 9px;
                                                ">Brochure</a>
                                                @endif


                            <a href="{{route('university_detail',['id'=>$university->id])}}"  class="theme-btn theme-btn-small mt-2" style="float: right;">Apply<i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div>
            @endif
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
                <img src="{{asset('frontEnd/assets/images/noresult.gif')}}" style="width: 100%;height: auto;">
            </div>
            @endif
        </div><!-- end row -->
        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="btn-box mt-3 text-center">
                    <button type="button" id="loadmore" class="theme-btn"><i class="la la-refresh mr-1"></i>Load More</button>
                    <p class="font-size-13 pt-2">Showing 1 - 6 of 44 university</p>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-12 --> --}}
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->
<section class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="testimonial-carousel-ad carousel-action">
    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d'); $advertisement=App\Models\Advertisement::where('status',1)->where('type',0)->where('expire_date','>',$mytime)->get(); ?>
    @foreach($advertisement as $advertise)
                    <div class="col-lg-12">
                    <a href="{{$advertise->link ?? ''}}"  id="click_count" link_click="{{$advertise->id ?? ''}}" target="_blank">
                    <div class="discount-box">
                        <div class="discount-img">

                            @if(isset($advertise->banner_image) && file_exists($advertise->banner_image))
                            <img  src="{{asset($advertise->banner_image)}}" height="159px;" alt="" class="d-block w-100">
                                @else
                                <img src="{{asset('frontEnd/assets/images/discount-hotel-img.jpg')}}"  height="159px;"  alt="discount img">
                                @endif
                        </div>
                        <!-- end discount-img -->
                        <div class="discount-content">
                            {{-- <div class="section-heading"> --}}
                                {{-- <p class="sec__desc text-white">Hot deal, save 50%</p> --}}
                                {{-- <h6 class="sec__title mb-0 line-height-50 text-white"></h6> --}}
                            {{-- </div><!-- end section-heading --> --}}
                            <div class="btn-box pt-4">
                                {{-- <a href="#" class="theme-btn border-0">Learn More <i class="la la-arrow-right ml-1"></i></a> --}}
                            </div>
                        </div><!-- end discount-content -->
                        <div class="company-logo">
                            <img src="images/logo2.png" alt="">
                            <p class="text-white font-size-14 text-right">Published By: {!!"&nbsp"!!} {{$advertise->user->first_name ?? ''}}</p>
                        </div><!-- end company-logo -->
                    </div>
                </a>
                <div style="
                text-align: end;
            ">

                    {{-- <span style="">ad</span> --}}
                    <label for="">AD</label>
                </div>
                </div>
                @endforeach
        </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section>
<div class="section-block"></div>

<!-- ================================
    START INFO AREA
================================= -->
@if(isset($childs))
@if (count($childs) > 0)
{{--
<section class="info-area info-bg padding-top-90px padding-bottom-70px">
    <div class="container">

        <!-- Section: Categories -->
        <section>

          <h5>Subcategories</h5>

          <div class="text-muted small text-uppercase mb-5" style="display: flex">
            @foreach($childs as $child)
            <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                @csrf
                <input type="hidden" name="category" value="{{$child->id ?? ''}}">
                <button type="submit" style="border: none;background:none"><p style="padding: 25px" class="mb-4"><strong>{{$child->title ?? ''}}</strong></p></button>
            </form>
            @endforeach

          </div>

        </section>

    </div><!-- end container -->
</section><!-- end info-area --> --}}
<section class="top_lists exams XXsnipcss_extracted_selector_selectionXX">
    <div class="section-heading " style="
    text-align: center;
    padding-bottom: 17px;
    color: aliceblue;
    font-family: fangsong;
">

      <h5>Sub-Discipline</h5>
    </div>
    <div class="container-fluid">
      <div class="col-sm-10 col-centered">
        <div class="lists textt-centerr text-tiny">
          <ul class="ullidd">
            @foreach($childs as $child)
            <li class="liidd">
                <form action="{{route('university_fetch.coursewise')}}" method="POST" >
                    @csrf
                    <input type="hidden" name="category" value="{{$child->id ?? ''}}">
              <button type="submit" class="ida" >
                {{$child->title ?? ''}}
              </button>
            </form>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </section>
@endif
@endif

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
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Dont worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section> --}}
{{-- <section class="info-area info-bg padding-top-90px padding-bottom-70px">
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
</section><!-- end info-area --> --}}



<div class="modal fade" id="universityClaim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="post" id="loan" action="{{route('loan.enquiry.submit')}}">
                    @csrf
                    <div class="sidebar-widget single-content-widget">
                        <h3 class="title stroke-shape">Enquiry Form</h3>
                        <div class="enquiry-forum">
                            <div class="form-box">
                                <div class="form-content">
                                    <div class="contact-form-action">
                                        <input class="form-control" value="2" name="type"  hidden>

                                            <div class="input-box">
                                                <label class="label-text">Your Name</label>
                                                <div class="form-group">
                                                    <span class="la la-user form-icon"></span>
                                                    <input class="form-control" type="name" name="name" placeholder="Your name" required>
                                                </div>
                                            </div>
                                            <div class="input-box">
                                                <label class="label-text">Your Email</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope-o form-icon"></span>
                                                    <input class="form-control" type="email" name="email" placeholder="Email address" required>
                                                </div>
                                            </div>
                                            <div class="input-box">
                                                <label class="label-text">Message</label>
                                                <div class="form-group">
                                                    <span class="la la-pencil form-icon"></span>
                                                    <textarea class="message-control form-control" name="message" placeholder="Write message" required></textarea>
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
                                            <div id="latest">

                                            </div>
                                            <div class="btn-box">
                                                <button type="submit" class="theme-btn">Submit Enquiry</button>
                                            </div>

                                    </div><!-- end contact-form-action -->
                                </div><!-- end form-content -->
                            </div><!-- end form-box -->
                        </div><!-- end enquiry-forum -->
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection
@section('per_page_style')
<style>
    @import url('https://fonts.googleapis.com/css?family=Nunito:400,700');



    /* article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
        display: block;
    }  */

    section.top_lists {
        background: #ff790a;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color:#ff790a;
    }

    .col-centered {
        margin: 0 auto!important;
        float: none!important;
        display: block!important;
        margin-top: 0px !important;
        margin-right: auto !important;
        margin-bottom: 0px !important;
        margin-left: auto !important;
    }



    .textt-centerr {
        text-align: center;
    }

    .text-h1 {
        font-size: 1.575rem;
    }

    .textt-centerr {
        text-align: center!important;
    }


    .text-tiny {
        font-size: .772rem;
    }

    dl, .ullidd {
        margin-top: 0;
    }

     .ullidd {
        margin-bottom: 10px;
    }

    .lists , .ullidd  {
        padding: 0;
        list-style: none;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        list-style-position: initial;
        list-style-image: initial;
        list-style-type: none;
    }

     .liidd {
        display: inline-block;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .ida {
        background: 0 0;
        background-image: initial;
        background-position-x: 0px;
        background-position-y: 0px;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: initial;
    }

    .ida {
        /* color: #428bca; */
        text-decoration: none;
        text-decoration-line: none;
        text-decoration-thickness: initial;
        text-decoration-style: initial;
        text-decoration-color: initial;
    }

     .ida   {
        color: #fff;
        font-weight: 400;
        border: 1px solid #fff;
        border-radius: 50px;
        padding: 6px 12px;
        display: block;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgb(255, 255, 255);
        border-right-color: rgb(255, 255, 255);
        border-bottom-color: rgb(255, 255, 255);
        border-left-color: rgb(255, 255, 255);
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        padding-top: 6px;
        padding-right: 12px;
        padding-bottom: 6px;
        padding-left: 12px;
    }

    section.top_lists.exams {
        background: #f37c1b;
        padding-top: 36px;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color:  #f37c1b;
    }


    </style>

<style>
    .la-angle-down:before {

        color: #ff7503;
        font-size: 12px;
    }
        </style>
<style>

    .buttonDownload {
        display: inline-block;
        position: relative;
        padding: 5px 22px;
        background-color:  #ff811a;
        color: white;
        font-family: sans-serif;
        text-decoration: none;
        font-size: 0.9em;
        text-align: center;
        text-indent: 15px;
        margin-top: 7px;
        border-radius: 4px;
    }

    .buttonDownload:hover {
        background-color:  #073975;
        color: white;
    }

    .buttonDownload:before, .buttonDownload:after {
        content: ' ';
        display: block;
        position: absolute;
        left: 15px;
        top: 52%;
    }

    /* Download box shape  */
    .buttonDownload:before {
        width: 10px;
        height: 2px;
        border-style: solid;
        border-width: 0 2px 2px;
    }

    /* Download arrow shape */
    .buttonDownload:after {
        width: 0;
        height: 0;
        margin-left: 3px;
        margin-top: -7px;

        border-style: solid;
        border-width: 4px 4px 0 4px;
        border-color: transparent;
        border-top-color: inherit;

        animation: downloadArrow 2s linear infinite;
        animation-play-state: paused;
    }

    .buttonDownload:hover:before {
        border-color: #4CC713;
    }

    .buttonDownload:hover:after {
        border-top-color: #4CC713;
        animation-play-state: running;
    }

    /* keyframes for the download icon anim */
    @keyframes downloadArrow {
        /* 0% and 0.001% keyframes used as a hackish way of having the button frozen on a nice looking frame by default */
        0% {
            margin-top: -7px;
            opacity: 1;
        }

        0.001% {
            margin-top: -15px;
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            margin-top: 0;
            opacity: 0;
        }
    }
</style>
@endsection
@section('per_page_script')

<script>
    $(document).on('change', '#categoryselect', function ()
    {
        console.log("clicked")
    var categoryselect=$('#categoryselect').val();

    function isEmpty(val){
        return (val == undefined || val == null || val.length <= 0) ? true : false;
    }


    if (isEmpty(categoryselect)){
        $(`#ali`).html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please select the Category First
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>`)
    }
    else{


    $.ajaxSetup({headers:
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    url:"{{ route('university_fetch') }}",
    method:"GET",
    data:{categoryselect:categoryselect},
    success: function(result){
        console.log(result)

    $(".ert").html(result)
    }
    });
    }

    });

    </script>
    <script>
        $(document).on('click', '#universityClaimId', function ()
        {

        var universityname=$(this).attr('custom1');

        $('#latest').html('<input value="'+universityname+'" name="universityname" hidden>');
      console.log(universityname);


        });

        </script>
@endsection
