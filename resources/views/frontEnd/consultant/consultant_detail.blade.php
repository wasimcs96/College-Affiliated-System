@extends('frontEnd.layout.master')
@section('content')

{{-- <section class="breadcrumb-top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-list breadcrumb-top-list">
                    <ul class="list-items d-flex justify-content-start">
                        <li><a href="index.html">Home</a></li>
                        <li></li>
                        <li>University of Technology </li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-top-bar --> --}}
<!-- ================================
    END BREADCRUMB TOP BAR
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->

    <section class="breadcrumb-area bread-bg-4 py-0" @if(isset($consultant->consultant->cover_image) && file_exists($consultant->consultant->cover_image)) style="background-image: url('{{asset($university->university->cover_image)}}');" @else style="background-image: url('{{asset('frontEnd/assets/images/universityall.jpg')}}');" @endif>
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($consultant->profile_image) && file_exists($consultant->profile_image))
                        <img
                         style="width: 106px;height: 98px; border-radius:98px;"
                        src="{{asset($consultant->profile_image)}}" alt="">
                            @else
                            <img style="width: 106px;height: 98px; border-radius:98px;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                            @endif</div>
                    <div class="breadcrumb-btn">


                        {{-- <a class="d-none"
                             data-fancybox="gallery"
                             data-src="{{asset('frontEnd/assets/img/breadcrumb/breadcrumb.jpg')}}"
                             data-caption="Showing image - 03"
                             data-speed="700"></a>
                        <a class="d-none"
                             data-fancybox="gallery"
                             data-src="{{asset('frontEnd/assets/img/breadcrumb/breadcrumb.jpg')}}"
                             data-caption="Showing image - 04"
                             data-speed="700"></a> --}}
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CRUISE DETAIL AREA
================================= -->
<section class="cruise-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description" class="scroll-link active">About Consultant</a></li>
                            {{-- <li><a data-scroll="itinerary" href="#itinerary" class="scroll-link">Courses</a></li> --}}
                            <li><a data-scroll="staterooms" href="#staterooms" class="scroll-link">Affiliated University</a></li>

                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$consultant->first_name ?? ''}} {{$consultant->last_name ?? ''}}          @if($consultant->is_verified == 1)
                                    <span data-toggle="tooltip"  data-url=""  data-title="Verified" style="background: #2dd12d;border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-certificate"></i></span>
                                @endif</h3>
                                {{-- <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">University Type:       @if(isset($consultant->university->type)&&($consultant->university->type==0))
                                        Private
                                        @else Government
                                    @endif</p>
                                </div> --}}
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">Rating:</p>
                                        {{-- <span class="badge badge-warning text-white font-size-16">{{$consultant->rating ?? ''}}/5</span>{!!"&nbsp;"!!} --}}
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
                                        @endif</span> {!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($consultant->rating == null) - @else{{$consultant->rating ?? ''}}/5 @endif</span>
                                    </p>
                                </div>


                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Description</h3>
                                <p class="pt-3">{{$consultant->consultant->about_me ?? ''}}</p>
                            </div><!-- end single-content-item -->
                            <div class="single-content-item padding-bottom-30px">
                                <h3 class="title font-size-20">University  Statistics</h3>
                                <div class="row pt-4">
                                    <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">

                                            {{-- <li><span>Country:</span>{{$consultant->country->countries_name}}</li> --}}
                                            @if(isset($consultant->countries_id))
                                            <?php $country = DB::table('countries')->where('countries_id',$consultant->countries_id)->get()->first();?>
                                            @endif
                                            <li><span>Country:</span>{{$country->countries_name ?? ''}}</li>
                                            <li><span>City:</span>{{$consultant->city ?? ''}}</li>
                                            <li><span>Address:</span>{{$consultant->address ?? ''}}</li>

                                            {{-- <li><span>Admission Opens:</span>19/09/20</li>
                                            <li><span>Campus:</span>93,558 grt</li> --}}
                                            {{-- <li><span>Working Week Days:</span> @if(isset($consultant->consultant->working_week_days)&&($consultant->consultant->type==0))
                                                Private
                                                @else Govenment</p>
                                                @endif</li> --}}
                                            {{-- <li><span>Opening time:</span>105 ft</li>
                                            <li><span>Closeing time:</span>28 ft</li>
                                            <li><span>brachs</span>22.5 knots</li> --}}
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                   <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">
                                            <li><span>Affiliated University:</span>
                                                @if(isset($consultant->consultantUniversity)){{$consultant->consultantUniversity->count()}} @else N/A @endif</li>
                                <li><span>On Going Booking :</span>@if(isset($consultant->consultantBooking)){{$consultant->consultantBooking->count()}} @else N/A @endif</li>
                                            <li><span>Clients:</span>
                                                @if(isset($consultant->consultantUniversityClient))
                                    {{$consultant->consultantUniversityClient->count()}}@else N/A @endif</li>
                                            <li><span>Website:</span><a target="_blank" href="{{$consultant->consultant->website ?? ''}}" URL>{{$consultant->consultant->website ?? ''}}</a></li>
                                            {{-- <li><span>Total Staff:</span>9,078 crew</li>
                                            <li><span>Counsellor:</span>Italian</li>
                                            <li><span>Hostels:</span>International</li>
                                            <li><span>affiliated collages:</span>International</li>
                                            <li><span>Registry:</span>Panama</li> --}}

                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->

                        </div><!-- end description -->
                        {{-- <div id="itinerary" class="page-scroll">
                            <div class="section-block margin-top-40px"></div>
                            <div class="single-content-item padding-top-40px padding-Rbottom-40px">
                                <h3 class="title font-size-20">Courses</h3>
                               <div class="table-form table-responsive padding-top-30px">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th scope="col">Course</th>
                                               <th scope="col">Type</th>
                                               <th scope="col"> Fees</th>
                                               <th scope="col">Start Date</th>
                                               <th scope="col">End Date</th>
                                               <th scope="col">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>

                                          @foreach($courses as $course)
                                           <tr>
                                               <th scope="row"><div class="table-content d-flex align-items-center">
                                                <img src="{{asset('frontEnd/assets/images/small-img4.jpg')}}" alt="" class="flex-shrink-0">
                                                <h3 class="title">{{$course->course->name}}</h3>
                                            </div>
                                            </th>
                                               <td>
                                                @if($course->course->type == 0) UG @endif
                                                @if($course->course->type == 1) PG @endif
                                                @if($course->course->type == 2) Diploma @endif
                                               </td>
                                               <td>{{$course->fees}}</td>
                                               <td>{{$course->start_date}}</td>
                                               <td>@if(isset($course->end_date)){{$course->end_date}}@else N/A @endif</td>

                                               <td> <div>
                                                <a href="{{route('course_detail')}}" class="btn btn-primary text-light">Detail<i class="las la-angle-double-right"></i></a>
                                            </div></td>
                                           </tr>
                                           @endforeach
                                    </tbody>
                                   </table>

                               </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end itinerary --> --}}

                        <!-- end reviews -->
                        <!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->




                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                        <td>
                            {{-- {{dd($consultant->consultantUniversity)}} --}}
    @if ($consultant->consultantUniversity)
                        <?php $universityconsultant=$consultant->consultantUniversity; ?>
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Featured University</h3>
                            <!-- Example split danger button -->

                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                  <button class="btn btn-outline-primary btn-sm" type="button" id="button-addon1">Country</button>
                                </div>
                                <input type="text" class="form-control col-xs-2" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              </div>
                            <div class="sidebar-list" style="

                            height: 530px;
                            overflow: scroll;">
                                <ul class="list-items">
            @foreach($universityconsultant as $universitycon)
            @if($universitycon->status == 1)
            @if($universitycon->userUniversity->Premium_expire_date > $mytime)

                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="{{route('university_detail',['id'=>$universitycon->userUniversity->id])}}">@if(isset($universitycon->userUniversity->profile_image) && file_exists($universitycon->userUniversity->profile_image))
                                                <img style=" width: 70px;
                                                height: 70px;" src="{{asset($universitycon->userUniversity->profile_image)}}" alt="">
                                                    @else
                                                    <img style=" width: 70px; height: 70px;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                                    @endif</a>
                                        </div>
                                        <div class="author-bio">
                                            {{-- {{dd($consultant)}} --}}
                                            <h4 class="author__title"><a href="#">{{$universitycon->userUniversity->university->university_name ?? ''}}</a></h4>
                                            <span class="author__meta">Member Since :@if(isset($universitycon->userUniversity->university->created_at))
                                                {{$universitycon->userUniversity->university->created_at->Format("Y") ?? ''}}@else N/A @endif</span>
                                            <div class="d-flex flex-wrap align-items-center ">
                                                {{-- <p class="mr-2">Rating:</p> --}}

                                                    <span>@if($universitycon->userUniversity->rating == 3 ?? '' )
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($universitycon->userUniversity->rating == 4 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($universitycon->userUniversity->rating == 5 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($universitycon->userUniversity->rating == 1 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($universitycon->userUniversity->rating == 2 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif
                                                    </span>
                                                   {{--  {!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($consultant->userConsultant->rating == null) - @else{{$consultant->userConsultant->rating ?? ''}}/5 @endif</span> --}}
                                                </p>
                                            </div>
                                            <div>
                                       <a href="{{route('university_detail',['id'=>$universitycon->userUniversity->id])}}"><label for="chb4" class="theme-btn theme-btn-small mt-2">Detail<i class="las la-angle-double-right"></i></label></a>
                                        </div>
                                        </div>
                                    </div></li>
                                    @endif
                                    @endif

@endforeach

                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        @endif

                    </div><!-- end sidebar -->
                    {{-- @endif --}}
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end cruise-detail-area -->

<section class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="testimonial-carousel-ad carousel-action">
    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d'); $advertisement=App\Models\Advertisement::where('status',1)->where('expire_date','>',$mytime)->get(); ?>
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
                            <p class="text-white font-size-14 text-right">Published By: {!!"&nbsp"!!} {{$advertise->user->first_name}}</p>
                        </div><!-- end company-logo -->
                    </div>
                </a>
                </div>
                @endforeach
        </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section>

<section class="hotel-area section-bg padding-top-100px padding-bottom-200px overflow-hidden" id="staterooms">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Select University</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="hotel-card-carousel-2 carousel-action">
                        {{-- {{dd($consultant->consultantUniversity)}} --}}
                        @if ($consultant->consultantUniversity)
                        <?php $consultants=$consultant->consultantUniversity; ?>
                        @foreach($consultants as $consultant)
                        {{-- {{dd($consultant->u)}} --}}
                        {{-- @if($consultant->isConsultant()) --}}
                        <div class="card-item car-card border">
                            <div class="card-img"  style="text-align: center; height:185px;">

                                <a href="{{route('university_detail',['id' => $consultant->userUniversity->id])}}" class="d-block">
                                    @if(isset($consultant->userUniversity->university->cover_image) && file_exists($consultant->userUniversity->university->cover_image))
                                                        <img
                                                        style=" width: 368px;
                                                        height: 245px;"
                                                        src="{{asset($consultant->userUniversity->university->cover_image)}}" alt="">
                                                            @else
                                                            <img     style=" width: 368px;
                                                            height: 245px;" src="{{asset('frontEnd/assets/images/university.jpg')}}" >
                                                            @endif
                                </a>
                                <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($consultant->userUniversity->profile_image) && file_exists($consultant->userUniversity->profile_image))
                                    <img
                                    style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                                    src="{{asset($consultant->userUniversity->profile_image)}}" alt="">
                                        @else
                                        <img  style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                        @endif</div>
                                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                        @if($consultant->userUniversity->Premium_expire_date > $mytime)<span style="
                                        background-color: #073975;
                                    " class="badge">Premium</span> @endif
                                {{-- <span class="badge">Top Ranked</span> --}}
                                {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                                    <i class="la la-heart-o"></i>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="{{route('university_detail',['id' => $consultant->userUniversity->id])}}">{{$consultant->userUniversity->university->university_name ?? ''}}</a>          @if($consultant->userUniversity->is_verified == 1)
                                    <span data-toggle="tooltip"  data-url=""  data-title="Verified" style="background: #2dd12d;border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-certificate"></i></span>
                                @endif</h3>
                                <p class="card-meta">{{$consultant->city ?? ''}}</p>
                                  <div class="d-flex flex-wrap align-items-center ">
                                                <p class="mr-2">Rating:</p>

                                                    <span>@if($consultant->userUniversity->rating == 3 ?? '' )
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($consultant->userUniversity->rating == 4 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userUniversity->rating == 5 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($consultant->userUniversity->rating == 1?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userUniversity->rating == 2 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif</span> {!!"&nbsp;"!!} <span class="badge badge-warning text-white font-size-16">@if($consultant->userUniversity->rating == null) - @else{{$consultant->userUniversity->rating ?? ''}}/5 @endif</span>

                                            </div>
                                            <div class="card-attributes">
                                                <ul class="d-flex align-items-center">
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Member Since"><i class="las la-calendar"></i><span>   @if(isset($consultant->userUniversity->university->created_at))
                                                        {{$consultant->userUniversity->university->created_at->Format("Y")}}
                                                        @else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated Consultants"><i class="la la-user"></i><span>
                                                        @if(isset($consultant->userUniversity->universityConsultant))
                                                        {{$consultant->userUniversity->universityConsultant->count()}}@else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="las la-book"></i><span>   @if(isset($consultant->userUniversity->universityCourse))
                                                        {{$consultant->userUniversity->universityCourse->count()}}
                                                        @else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Client"><i class="las la-users"></i><span>   @if(isset($consultant->userUniversity->universityConsultantClient))
                                                        {{$consultant->userUniversity->universityConsultantClient->count()}}
                                                        @else N/A @endif</span></li>
                                                </ul>
                                            </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__text">City :</span>
                                        <span class="price__num">{{$consultant->userUniversity->city}}</span>
                                        {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                                    </p>

                           <a href="{{route('university_detail',['id'=>$consultant->userUniversity->id])}}"><label for="chb4" class="theme-btn theme-btn-small mt-2">Detail<i class="las la-angle-double-right"></i></label></a>


                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                        @endforeach<!-- end card-item -->
                        @endif
                </div><!-- end hotel-card-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</section>
<!-- ================================
    END CRUISE DETAIL AREA
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
</section><!-- end cta-area --> --}}
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
       START FOOTER AREA
================================= -->
<!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
                        {{-- ####################################################ERROR###################### --}}

<div class="modal fade" id="mdlwait" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body" style="
        text-align:center;
        padding: 0px;
        ">
            <div style="
            padding: 0px;
            background-color: white;
        ">
            <img  style=" width: 122px;margin-top: 18px;margin-bottom: 18px"; src="{{asset('frontEnd/assets/images/wait.png')}}">
            </div>

            <div style="
            background-color: #52b1b1;
            color: #585550;
            font-family: sans-serif;
        ">
                <h1 style=" margin: 0px;
                font-family: sans-serif;
                padding: 18px;
                color: #323435;"> Wait  ! </h1>

                <h4 style="color: dimgrey;margin: 0px;font-size: large;">Your Request is in Waiting. Have patience</h4>
            </div>
        </div>
        <div class="modal-footer"  style="
        padding: 0px;
        border: 0px;
        justify-content: center;
        background-color: #52b1b1;
    ">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type= class="btn btn-primary">Submit</button> --}}
          <a href="{{route('consultant.dashboard')}}"  style=" border-radius: 35px;font-weight: 500; font-family: sans-serif;margin: 11px; margin-top: 30px;  background-color: white; border-color:white; " class="btn btn-warning" id="add_document3">Close</a>
        </div>
        </div>
       </div>
</div>
{{-- ####################################################ERROR###################### --}}
                        <div class="modal fade" id="mdlup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <div class="modal-body" style="
                                text-align:center;
                                padding: 0px;
                                ">
                                    <div style="
                                    padding: 0px;
                                    background-color: #5890ff;
                                ">
                                    <img  style=" width: 122px;margin-top: 18px;margin-bottom: 18px"; src="{{asset('frontEnd/assets/images/checkmark.png')}}">
                                    </div>

                                    <div style="
                                    text-align:center;
                                    background-color: white;
                                    color: black;
                                    ">
                                        <h3 style="
                                        margin: 0px;
                                        font-family: sans-serif;
                                        padding: 18px;
                                        color: #323435;
                                    ">Your Request have been sent </h3>
                                         <h4 style="
                                        color: dimgrey;
                                         margin: 0px;
                                         font-size: large;
                                         "
                                     >Have patience Wait for Respond</h4>
                                    </div>
                                </div>
                                <div class="modal-footer" style="
                                padding: 6px;
                                background-color: white;
                                border: 0px;
                                justify-content: center;
                            ">
                                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                  {{-- <button type= class="btn btn-primary">Submit</button> --}}
                                  <a href="{{route('consultant.dashboard')}}" class="btn btn-primary" style=" border-radius: 35px;font-weight: 500; font-family: sans-serif;margin: 11px; margin-top: 30px;" id="add_document3">Close</a>
                                </div>
                                </div>
                               </div>
                        </div>
                        {{-- ############################################## MODELLLLLLLLL END --}}
@endsection
@section('per_page_style')
<style>
    .chckd {
      color: orange;
    }
    </style>
@endsection

@section('per_page_script')
<script>
    $(document).ready(function () {
       $('#submitClass').click(function (e) {
var university_id = $(this).attr('custom1');
var consultant_id = $('input[name="consultant_id"]').val();
var _token =  $('input[name="_token"]').val();
// console.log(university_id,consultant_id,_token);
        // alert();
// console.log('click');
            // e.preventDefault();
            // var university_id = $(this).attr("data-university_id");
            $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
            $.ajax({
                type: "post",
                url: "{{route('university_consultant')}}",
                data: {university_id:university_id,consultant_id:consultant_id},
                success: function (result) {
                    $('#mdlup').modal('show');
                }
            });
            $(this).replaceWith(`<a class="btn btn-primary"  data-toggle="modal" data-target="mdlerror" style="color:white; " id="btn5">Pending</a>`);
            // console.log(university_id,consultant_id,_token);

        });
    });
    </script>
@endsection
