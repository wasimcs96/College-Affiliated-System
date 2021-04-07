@extends('frontEnd.layout.master')
@section('title','Campus Interest - University Detail')
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

    <section class="breadcrumb-area bread-bg-4 py-0" @if(isset($university->university->cover_image) && file_exists($university->university->cover_image)) style="background-image: url('{{asset($university->university->cover_image)}}');" @else style="background-image: url('{{asset('frontEnd/assets/images/universityall.jpg')}}');" @endif>
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($university->profile_image) && file_exists($university->profile_image))
                        <img
                        style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                        src="{{asset($university->profile_image)}}" alt="">
                            @else
                            <img  style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                            @endif</div>
                    <div class="breadcrumb-btn">
                        <div class="btn-box"  style="
                        position: absolute;
                        bottom: 18px;
                        left: 151px;
                        margin-bottom: 8px;
                    ">
                    @if(isset($university->universityMedia))
                     <?php
                     $medias = $university->universityMedia;
                     $i=2;
                     ?>
                                 @if( $medias->count() > 0)
                            <a class="theme-btn"  data-src=" {{asset($university->profile_image)}}" data-fancybox="gallery" data-caption="Showing image - 1" data-speed="700">
                                <i class="la la-photo mr-2"></i>Gallery
                            </a>
                            @else
                            <a class="btn btn-success btn-lg" type="button" disabled data-toggle="tooltip"  data-url=""  data-title="Media  Unavailable" style="background-color:#073975; color:white; border-color:white; " >
                                <i class="la la-photo mr-2"></i>Gallery
                            </a>
                            @endif

                        </div>


                        @foreach($medias as $media)
                        @if(isset($media->media) && file_exists($media->media))
                        <a class="d-none"
                             data-fancybox="gallery"

                            @if(isset($media->media))
                             data-src="{{asset($media->media)}}"
                                @else
                            data-src="{{asset('assets/default/default-banner.jpg')}}"
                                @endif
                             data-caption="Showing gallery - {{$i}}"
                             data-speed="700"></a>
                             <?php $i++ ?>
                             @endif
                             @endforeach

                             @endif
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
                            <li><a data-scroll="description" href="#description" class="paddinganchor scroll-link active">About This University</a></li>
                            <li><a data-scroll="itinerary" href="#itinerary" class="paddinganchor scroll-link">Courses</a></li>
                            <li><a data-scroll="staterooms" href="#staterooms" class="paddinganchor scroll-link">Consultants</a></li>

                        {{-- <li> --}}



{{-- {{dd($universityconsultant)}} --}}
@if(auth()->user())
                       @if (Auth()->User()->isConsultant())
                       @if ($universityconsultant)
                       @if ($universityconsultant->status == 1)
                                 <div class="btn btn-success">
                                    You are affiliated
                                </div>

                                             @else
                                             <a class="btn btn-primary" data-toggle="modal" data-target="#mdlwait" style="color:white; " id="btn5">
                                                 Pending</a>
                                         @endif

                                         @else
                                         <input type="text" name="unviersity_id"  value="{{$university->id ?? ''}}" hidden>
                                         <input type="text" name="consultant_id"  value="{{auth()->user()->id ?? ''}}" hidden>
                                         <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                         <a class="btn btn-primary cs" custom1="{{$university->id}}" href="javascript:void(0);"
                                         @if(!auth()->user()) data-toggle="modal" data-target="#loginPopupForm" @else id="submitClass" @endif
                                         ><i class="las la-user-plus mr-2"></i>Be a Consultant </a>

                                        @endif

@endif
@endif
                        {{-- </li> --}}
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
                        <div id="description" class=" page-scroll">

                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$university->university->university_name ?? ''}}
                                    @if(isset($university->is_verified) && $university->is_verified == 1)
                                    <span data-toggle="tooltip"  data-url=""  data-title="Verified Profile" style="background: #2dd12d;border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-id-badge"></i></span>
                                    @else
                                    <span style="float:right; color: white;" class="btn btn-warning"><a data-toggle="modal" data-target="#universityClaim" id="universityClaimId" value="{{$university->university->university_name ?? ''}}" custom1="{{$university->university->university_name ?? ''}}">Request to claim</a></span>
                                    @endif
                            <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                            @if(isset($university->Premium_expire_date))
                            @if($university->Premium_expire_date > $mytime)<span data-toggle="tooltip"  data-url=""  data-title="Premium Profile"  style="
                            background-color: #073975; border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-certificate"></i></span> @endif @endif</h3>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">University Type:       @if(isset($university->university->type)&&($university->university->type==0))
                                        Private
                                        @else
                                        Government
                                    @endif</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">Rating:</p>
                                    @if(isset($university->rating))
                                        {{-- <span class="badge badge-warning text-white font-size-16">{{$university->rating ?? ''}}/5</span>{!!"&nbsp;"!!} --}}
                                        <span>@if($university->rating == 3 ?? '' )
                                                <span class="ratings ">
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                </span>
                                        @elseif($university->rating == 4 ?? '' )
                                        <span class="ratings ">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star-o"></i>
                                        </span>
                                        @elseif($university->rating == 5 ?? '' )
                                        <span class="ratings ">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        @elseif($university->rating == 1 ?? '' )
                                        <span class="ratings ">
                                            <i class="la la-star"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                        </span>
                                        @elseif($university->rating == 2 ?? '' )
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
                                        @if($university->rating == null) - @else{{$university->rating ?? ''}}/5 @endif
                                    </span>
                                    @else
                                    <span class="badge badge-warning text-white font-size-16">-/5</span>
                                    @endif
                                    </p>
                                </div>


                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Description</h3>
                                <p class="pt-3">{{$university->university->about_me ?? ''}}</p>
                            </div><!-- end single-content-item -->
                            <div class="single-content-item padding-bottom-30px">
                                <h3 class="title font-size-20">University  Statistics</h3>
                                <div class="row pt-4">
                                    <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">

                                            {{-- <li><span>Country:</span>{{$university->country->countries_name}}</li> --}}
                                            @if(isset($university->countries_id))
                                            <?php $country = DB::table('countries')->where('countries_id',$university->countries_id)->get()->first();?>
                                            @endif
                                          <li><span>Established at:</span>@if(isset($university->university->established_at)){{$university->university->established_at}} @else N/A @endif</li>
                                                {{--   <li><span>Campus:</span>93,558 grt</li> --}}
                                                <li><span>University Type:</span> @if(isset($university->university->type)&&($university->university->type==0))
                                                    Private
                                                    @else Govenment</p>
                                                    @endif</li>
                                                    <li><span>City:</span>{{$university->city ?? ''}}</li>
                                                    <li><span>Country:</span>{{$country->countries_name ?? ''}}</li>
                                            {{-- <li><span>Opening time:</span>105 ft</li>
                                            <li><span>Closeing time:</span>28 ft</li>
                                            <li><span>brachs</span>22.5 knots</li> --}}
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                   <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">
                                            <li><span>IELTS Rating:</span>@if(isset($university->university->iltes)){{$university->university->iltes}} @else - @endif</li>

                                            <li><span>In Takes:</span>@if(isset($university->university->in_takes)){{$university->university->in_takes}} @else N/A @endif</li>
                                            <li><span>Exam:</span>{{$university->university->exam ?? ''}}</li>
                                            <li><span>Website:</span><a target="_blank" href="{{$university->university->website ?? ''}}" URL>Visit Site</a></li>
                                            {{--   <li><span>Counsellor:</span>Italian</li>
                                            <li><span>Hostels:</span>International</li>
                                            <li><span>affiliated collages:</span>International</li>
                                            <li><span>Registry:</span>Panama</li> --}}

                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->

                        </div><!-- end description -->

                        <!-- end itinerary -->

                        <!-- end reviews -->
                        <!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->




                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                        <td>
                                @if ($university->universityConsultant)
                        <?php $universityconsultant=$university->universityConsultant; ?>
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Featured Consultant</h3>
                            <!-- Example split danger button -->
                            <div class="sidebar-list" style="

                            height: 530px;
                            overflow: scroll;">
                            <?php $i=0;?>
                            @if($universityconsultant->count() > 0)
                                <ul class="list-items">
                                    @foreach($universityconsultant as $consultant)
                                    {{-- {{dd($consultant->userConsultant->status)}} --}}
                                    @if($consultant->userConsultant->status == 1)
                                    @if(isset($consultant->userConsultant->Premium_expire_date))
                                    @if($consultant->userConsultant->Premium_expire_date > $mytime)
 <?php $i++ ;?>
                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="#">@if(isset($consultant->userConsultant->profile_image) && file_exists($consultant->userConsultant->profile_image))
                                                <img style=" width: 70px;
                                                height: 70px;" src="{{asset($consultant->userConsultant->profile_image)}}" alt="">
                                                    @else
                                                    <img style=" width: 70px; height: 70px;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                                    @endif</a>
                                        </div>
                                        <div class="author-bio">
                                            {{-- {{dd($consultant)}} --}}
                                            <h4 class="author__title"><a href="#">{{$consultant->userConsultant->first_name ?? ''}} {{$consultant->userConsultant->last_name ?? ''}}</a>
                                                <span data-toggle="tooltip"  data-url=""  data-title="Verified Profile" style="background: #2dd12d;border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-id-badge"></i></span></h4>
                                            <span class="author__meta">Member Since :{{$consultant->userConsultant->consultant->created_at->Format("Y") ?? ''}}</span>
                                            <div class="d-flex flex-wrap align-items-center ">
                                                {{-- <p class="mr-2">Rating:</p> --}}

                                                    <span>@if($consultant->userConsultant->rating ?? '' == 3)
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($consultant->userConsultant->rating ?? '' == 4)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating ?? ''  == 5)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating ?? '' == 1)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating ?? '' == 2)
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
                                                @if(auth()->user())
                                                @if(auth()->user()->isClient())




 <a href="{{route('consultant_book',['consultantId'=>$consultant->userConsultant->id ?? 'N/A','universityId'=>$university->id ?? ''])}}"  class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></a>


                                          @else
                                       <a href="{{route('consultant_detail',['id'=>$consultant->userConsultant->id ?? ''])}}"><label for="chb4" class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></label></a>
                                          @endif
                                          @else
                                          <button type="submit" class="theme-btn theme-btn-small mt-2" data-toggle="modal" data-target="#loginPopupForm">Book Now<i class="las la-angle-double-right"></i></button>
                                          @endif

                                            </div>
                                        </div>
                                    </div></li>
                                    @endif
                                    @endif
                                    @endif

                            @endforeach
                            @if($i == 0)
                            <div class="text-center" style="margin-top: 110px;">
                                <h3> No Featured Consultant Available </h3>
                            </div>
                            @endif
                                </ul>
                                @else

                                <div class="text-center" style="margin-top: 110px;">
                                    <h3> No Featured Consultant Available</h3>
                               </div>
                                @endif
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        @endif

                    </div><!-- end sidebar -->
                    {{-- @endif --}}
                </div><!-- end col-lg-4 -->

                <div class="col-lg-12">
                    <div class="single-content-wrap padding-top-60px">

                        <div id="itinerary" class="page-scroll">
                            <div class="section-block margin-top-40px"></div>
                            <div class="single-content-item padding-top-40px padding-Rbottom-40px">
                                <h3 class="title font-size-20">Courses</h3>
                               <div class="table-form table-responsive padding-top-30px">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th scope="col">Course Name</th>
                                               <th scope="col">Discipline</th>

                                               <th scope="col">Study Level</th>
                                               <th scope="col"> Fees (in {{ Config::get('define.currency.currency') }})</th>
                                               <th scope="col">Duration</th>
                                               {{-- <th scope="col">Intakes</th> --}}
                                               <th scope="col">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                        @if(isset( $university->universityCourse))
                                        <?php $courses=$university->universityCourse?>
                                       {{-- @if($courses->count() > 0) --}}
                                       @foreach($courses as $course)
                                        <tr>
                                            <th scope="row"><div class="table-content d-flex align-items-center">
                                             {{-- <img src="{{asset('frontEnd/assets/images/small-img4.jpg')}}" alt="" class="flex-shrink-0"> --}}
                                             <h3 class="title">{{$course->title ?? ''}}</h3>
                                         </div>
                                         </th>
                                         <td>{{$course->category->title}}</td>
                                            <td>
                                                @php
                                                $levels=Config::get('level.study_level');
                                                @endphp
                                           {{$levels[$course->type] ?? 'N/A'}}



                                            </td>
                                            <td>{{ Config::get('define.currency.currency') }} {{$course->fees ?? ''}}</td>
                                            <td>@if(isset($course->duration)) {{ $course->duration }} Years @else N/A @endif</td>
                                            {{-- <td>@if(isset($course->end_date)){{ Carbon\Carbon::parse($course->end_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif</td> --}}
                                            {{-- <td></td> --}}
                                             <td> <div>
                                             <a href="{{route('course_detail',['id'=>$course->id])}}" class="btn btn-primary text-light">Detail<i class="las la-angle-double-right"></i></a>
                                         </div></td>
                                        </tr>
                                        @endforeach
                                        {{-- @else
                                        Not available
                                        @endif --}}
                                        @else
                                       <td> Not available</td>
                                        @endif
                                 </tbody>
                                   </table>

                               </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end itinerary -->

                        <!-- end reviews -->
                        <!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div>

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end cruise-detail-area -->

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


<section class="hotel-area section-bg padding-top-100px padding-bottom-200px overflow-hidden" id="staterooms">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Select NearBy Consultant</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        @if(isset($nearByConsultants))
        <?php $consultants=$university->universityConsultant; ?>
        @if(count($nearByConsultants) > 0)
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="hotel-card-carousel-2 carousel-action">

                        @foreach($nearByConsultants as $consultant)
                        @if($consultant->status == 1)
                        <div class="card-item car-card border" style="
                        overflow: hidden;
                    ">
                            <div class="card-img" style="text-align: center; height:185px;">

                                <a href="{{route('consultant_detail',['id' => $consultant->id ?? ''])}}" class="d-block">
                                    @if(isset($consultant->consultant->cover_image) && file_exists($consultant->consultant->cover_image))
                                                        <img
                                                        style=" width: 368px;
                                                        height: 245px;"
                                                        src="{{asset($consultant->consultant->cover_image)}}" alt="">
                                                            @else
                                                            <img     style=" width: 368px;
                                                            height: 245px;" src="{{asset('frontEnd/assets/images/img21.jpg')}}" >
                                                            @endif
                                </a>
                                <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($consultant->userConsultant->profile_image) && file_exists($consultant->userConsultant->profile_image))
                                    <img
                                    style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                                    src="{{asset($consultant->profile_image)}}" alt="">
                                        @else
                                        <img  style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                        @endif</div>
                                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                        @if(isset($consultant->Premium_expire_date))
                                        @if($consultant->Premium_expire_date > $mytime)
                                        <span style="
                                        background-color: #073975;
                                    " class="badge">Premium</span>
                                     @endif
                                     @endif
                                {{-- <span class="badge">Top Ranked</span> --}}
                                {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                                    <i class="la la-heart-o"></i>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="{{route('consultant_detail',['id' => $consultant->id ?? ''])}}">
                                    @if(isset($consultant->first_name ))
                                    {{$consultant->first_name ?? ''}} &nbsp;{{$consultant->last_name ?? ''}}
                                @else N/A @endif</a>

                                    <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>

                            </h3>
                                <p class="card-meta">{{$consultant->city ?? ''}}</p>
                                  <div class="d-flex flex-wrap align-items-center ">
                                                <p class="mr-2">Rating:</p>

                                                    <span>@if($consultant->rating  == 3)
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($consultant->rating  == 4)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->rating == 5)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($consultant->rating == 1)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->rating  == 2)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif</span> {!!"&nbsp;"!!} <span class="badge badge-warning text-white font-size-16">@if($consultant->rating  == null) - @else{{$consultant->rating }}/5 @endif</span>

                                            </div>
                                            <div class="card-attributes">
                                                <ul class="d-flex align-items-center">
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established"><i class="las la-university"></i><span>   @if(isset($consultant->created_at))
                                                        {{$consultant->created_at->Format("Y")}}
                                                        @else N/A @endif</span></li>

                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated university"><i class="las la-university"></i><span>   @if(isset($consultant->consultantUniversity))
                                                        {{$consultant->consultantUniversity->count()}}
                                                        @else N/A @endif</span></li>

                                                </ul>
                                            </div>
                                            <span class="align-items-center" data-toggle="tooltip" data-placement="top" title="Location: {{ $consultant->userConsultant->address_1 ?? 'N/A' }}" style="white-space: nowrap; overflow: hidden;"><i class="las la-map-marker-alt"></i> {{ $consultant->userConsultant->address_1 ?? 'N/A' }}</span>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__text">City :</span>
                                        <span class="price__num">{{$consultant->city ?? ''}}</span>
                                        {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                                    </p>
                                    @if(auth()->user())
                                    @if(auth()->user()->isClient())

                                    <a href="{{route('consultant_book',['consultantId'=>$consultant->id ?? 'N/A','universityId'=>$university->id ?? 'N/A'])}}"  class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></a>
                              @else
                           <a href="{{route('consultant_detail',['id'=>$consultant->id ?? ''])}}"><label for="chb4" class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></label></a>
                              @endif
                              @else
                              <button type="submit" class="theme-btn theme-btn-small mt-2" data-toggle="modal" data-target="#loginPopupForm">Book Now<i class="las la-angle-double-right"></i></button>
                              @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach<!-- end card-item -->

                </div><!-- end hotel-card-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        @else
<div class="text-center" style="margin-top: 110px;">
     <h3> No Nearby Affiliated Consultant Available </h3>
</div>
        @endif
        @endif
    </div><!-- end container-fluid -->
</section>


<section class="hotel-area section-bg padding-top-100px padding-bottom-200px overflow-hidden" id="staterooms">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Select  Consultant</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        @if(isset($university->universityConsultant))
        <?php $consultants=$university->universityConsultant; ?>
        @if($consultants->count() > 0)
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="hotel-card-carousel-2 carousel-action">

                        @foreach($consultants as $consultant)
                        @if($consultant->userConsultant->status == 1)
                        <div class="card-item car-card border" style="
                        overflow: hidden;
                    ">
                            <div class="card-img" style="text-align: center; height:185px;">

                                <a href="{{route('consultant_detail',['id' => $consultant->userConsultant->id ?? ''])}}" class="d-block">
                                    @if(isset($consultant->userConsultant->consultant->cover_image) && file_exists($consultant->userConsultant->consultant->cover_image))
                                                        <img
                                                        style=" width: 368px;
                                                        height: 245px;"
                                                        src="{{asset($consultant->userConsultant->consultant->cover_image)}}" alt="">
                                                            @else
                                                            <img     style=" width: 368px;
                                                            height: 245px;" src="{{asset('frontEnd/assets/images/img21.jpg')}}" >
                                                            @endif
                                </a>
                                <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($consultant->userConsultant->profile_image) && file_exists($consultant->userConsultant->profile_image))
                                    <img
                                    style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                                    src="{{asset($consultant->userConsultant->profile_image)}}" alt="">
                                        @else
                                        <img  style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                        @endif</div>
                                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                        @if(isset($consultant->userConsultant->Premium_expire_date))
                                        @if($consultant->userConsultant->Premium_expire_date > $mytime)
                                        <span style="
                                        background-color: #073975;
                                    " class="badge">Premium</span>
                                     @endif
                                     @endif
                                {{-- <span class="badge">Top Ranked</span> --}}
                                {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                                    <i class="la la-heart-o"></i>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="{{route('consultant_detail',['id' => $consultant->userConsultant->id ?? ''])}}">
                                    @if(isset($consultant->userConsultant->first_name ))
                                    {{$consultant->userConsultant->first_name ?? ''}} &nbsp;{{$consultant->userConsultant->last_name ?? ''}}
                                @else N/A @endif</a>

                                    <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>

                            </h3>
                                <p class="card-meta">{{$consultant->city ?? ''}}</p>
                                  <div class="d-flex flex-wrap align-items-center ">
                                                <p class="mr-2">Rating:</p>

                                                    <span>@if($consultant->userConsultant->rating  == 3)
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($consultant->userConsultant->rating  == 4)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 5)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 1)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating  == 2)
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif</span> {!!"&nbsp;"!!} <span class="badge badge-warning text-white font-size-16">@if($consultant->userConsultant->rating  == null) - @else{{$consultant->userConsultant->rating }}/5 @endif</span>

                                            </div>
                                            <div class="card-attributes">
                                                <ul class="d-flex align-items-center">
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established"><i class="las la-university"></i><span>   @if(isset($consultant->created_at))
                                                        {{$consultant->created_at->Format("Y")}}
                                                        @else N/A @endif</span></li>

                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated university"><i class="las la-university"></i><span>   @if(isset($consultant->userConsultant->consultantUniversity))
                                                        {{$consultant->userConsultant->consultantUniversity->count()}}
                                                        @else N/A @endif</span></li>

                                                </ul>
                                            </div>
                                            <span class="align-items-center" data-toggle="tooltip" data-placement="top" title="Location: {{ $consultant->userConsultant->address_1 ?? 'N/A' }}" style="white-space: nowrap; overflow: hidden;"><i class="las la-map-marker-alt"></i> {{ $consultant->userConsultant->address_1 ?? 'N/A' }}</span>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__text">City :</span>
                                        <span class="price__num">{{$consultant->userConsultant->city ?? ''}}</span>
                                        {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                                    </p>
                                    @if(auth()->user())
                                    @if(auth()->user()->isClient())

                                    <a href="{{route('consultant_book',['consultantId'=>$consultant->userConsultant->id ?? 'N/A','universityId'=>$university->id ?? 'N/A'])}}"  class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></a>
                              @else
                           <a href="{{route('consultant_detail',['id'=>$consultant->userConsultant->id ?? ''])}}"><label for="chb4" class="theme-btn theme-btn-small mt-2">Book Now<i class="las la-angle-double-right"></i></label></a>
                              @endif
                              @else
                              <button type="submit" class="theme-btn theme-btn-small mt-2" data-toggle="modal" data-target="#loginPopupForm">Book Now<i class="las la-angle-double-right"></i></button>
                              @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach<!-- end card-item -->

                </div><!-- end hotel-card-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        @else
<div class="text-center" style="margin-top: 110px;">
     <h3> No Consultant Available </h3>
</div>
        @endif
        @endif
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
                                     >Have patience Wait for Responce</h4>
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
                                        <form method="post" action="{{route('loan.enquiry.submit')}}">
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
                                                                        <label class="label-text">Your Mobile Number</label>
                                                                        <div class="form-group">
                                                                            <span class="la la-envelope-o form-icon"></span>
                                                                            <input class="form-control" type="number" name="mobile" placeholder="Mobile" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-box">
                                                                        <label class="label-text">Designation</label>
                                                                        <div class="form-group">
                                                                            <span class="la la-pencil form-icon"></span>
                                                                            <input class="form-control" type="text" name="designation" placeholder="Desgination" required>
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
    <script>
        $(document).on('click', '#universityClaimId', function ()
        {

        var universityname=$(this).attr('custom1');

        $('#latest').html('<input value="'+universityname+'" name="universityname" hidden>');
      console.log(universityname);


        });

        </script>
@endsection
