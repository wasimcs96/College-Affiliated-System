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

    <section class="breadcrumb-area bread-bg-4 py-0" @if(isset( $universitycourse->university->cover_image) && file_exists( $universitycourse->university->cover_image)) style="background-image: url('{{asset( $universitycourse->university->cover_image)}}');" @else style="background-image: url('{{asset('frontEnd/assets/images/universityall.jpg')}}');" @endif>
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="position: absolute;bottom: 8px;left: 16px;" >

                </div>
                    <div class="breadcrumb-btn">
                        <div class="btn-box"  style="
                        position: absolute;
                        bottom: 18px;
                        left: 151px;
                        margin-bottom: 8px;
                    ">
                            {{-- <a href="{{asset($university->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload">Brochure</a> --}}
                 </div>


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
                            <li><a data-scroll="description" href="#description" class="scroll-link active">About This Course</a></li>
                            <li><a data-scroll="itinerary" href="#staterooms" class="scroll-link">More Universities</a></li>
                            <li><a data-scroll="staterooms" href="#staterooms" class="scroll-link"></a></li>


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
                                <h3 class="title font-size-26">{{ $universitycourse->title ?? ''}}</h3>
                                {{-- <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">Discipline  : {{ $universitycourse->category->title}}</p>
                                </div> --}}
                                {{-- <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">Course Type  : @if(isset($universitycourse->type)&&$universitycourse->type == 0)Under-Graduation
                                        @elseif($universitycourse->type == 1) Post-Graduation
                                        @elseif($universitycourse->type == 2)Diploma @endif</p>
                                </div> --}}


                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Description</h3>
                                <p class="pt-3">{{ $universitycourse->description ?? ''}}</p>
                            </div><!-- end single-content-item -->
                            <div class="single-content-item padding-bottom-30px">
                                <h3 class="title font-size-20">Course Detail</h3>
                                <div class="row pt-4">
                                    <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">

                                            {{-- <li><span>Country:</span>{{ $universitycourse->country->countries_name}}</li> --}}
                                            {{-- {{dd( $universitycourse->users->university->type)}} --}}
                                            <li><span>University Type:</span> @if(isset(  $universitycourse->users->university->type)&&(  $universitycourse->users->university->type == 0))
                                                Private
                                                @else Govenment</p>
                                                @endif</li>
                                            <li><span>Discipline:</span> {{ $universitycourse->category->title}}</li>
                                            <li><span>Type:</span> @if(isset($universitycourse->type)&&$universitycourse->type == 0)Under-Graduation
                                                @elseif($universitycourse->type == 1) Post-Graduation
                                                @elseif($universitycourse->type == 2)Diploma @endif</li>
                                            {{-- <li><span>Admission Opens:</span>19/09/20</li>
                                            <li><span>Campus:</span>93,558 grt</li> --}}
                                            {{-- <li><span>Opening time:</span>105 ft</li>
                                            <li><span>Closeing time:</span>28 ft</li>
                                            <li><span>brachs</span>22.5 knots</li> --}}
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                   <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">
                                            <li><span>Fees:</span> @if(isset( $universitycourse->fees)){{ $universitycourse->fees}} @else N/A @endif</li>

                                            <li><span>Start Date:</span> @if(isset( $universitycourse->start_date)) {{ $universitycourse->start_date}} @else N/A @endif</li>
                                            <li><span>End Date:</span>@if(isset( $universitycourse->start_date)) {{ $universitycourse->start_date}} @else N/A @endif</li>
                                            {{-- <li><span>Total Staff:</span>9,078 crew</li>
                                            <li><span>Counsellor:</span>Italian</li>
                                            <li><span>Hostels:</span>International</li>
                                            <li><span>affiliated collages:</span>International</li>
                                            <li><span>Registry:</span>Panama</li> --}}

                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="single-content-item padding-bottom-30px">
                                <h3 class="title font-size-20">University  Detail <a href="{{asset($university->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" style="
                                    float: right;
                                " download class="buttonDownload">Brochure</a> </h3>

                                <div class="row pt-4">
                                    <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">

                                            <li><span>University Name:</span>{{$universitycourse->users->university->university_name ?? ''}}</li>

                                            <li><span>University Type:</span> @if(isset(  $universitycourse->users->university->type)&&(  $universitycourse->users->university->type == 0))
                                                Private
                                                @else Govenment</p>
                                                @endif</li>
                                                <li><span>Average Fees:</span>{{$universitycourse->users->university->average_fees ?? ''}}</li>

                                            {{-- <li><span>Admission Opens:</span>19/09/20</li>
                                            <li><span>Campus:</span>93,558 grt</li> --}}

                                            {{-- <li><span>Opening time:</span>105 ft</li>
                                            <li><span>Closeing time:</span>28 ft</li>
                                            <li><span>brachs</span>22.5 knots</li> --}}
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                   <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">

                                            <li><span>Country:</span>@if(isset($universitycourse->users->countries_id))
                                                <?php $country = DB::table('countries')->where('countries_id',$universitycourse->users->countries_id)->get()->first();?>
                                                {{$country->countries_name ?? ''}} @else N/A @endif
                                                </li>
                                            <li><span>City:</span>{{$universitycourse->users->city ?? ''}}</li>
                                            {{-- <li><span>Consultants:</span>{{$universitycourse->users->university->universityConsultant->count() ?? ''}}</li> --}}
                                            <li><span>Website:</span><a  style="color:blue;" target="_blank" href="{{$universitycourse->users->university->website ?? ''}}" URL>Visit site</a></li>
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
                        <div id="itinerary" class="page-scroll">
                            <div class="section-block margin-top-40px"></div>
                            <div class="single-content-item padding-top-40px padding-Rbottom-40px">
                                <h3 class="title font-size-20">More Courses of {{$universitycourse->users->university->university_name}}</h3>
                               <div class="table-form table-responsive padding-top-30px">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th scope="col">Course Name</th>
                                               <th scope="col">Type</th>
                                               <th scope="col"> Fees</th>
                                               <th scope="col">Start Date</th>
                                               <th scope="col">End Date</th>
                                                <th scope="col">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @if( $universitycourse->users->universityCourse->count() > 0)
                                              <?php $courses= $universitycourse->users->universityCourse?>
                                             @foreach($courses as $course)
                                           <tr>
                                               <th scope="row"><div class="table-content d-flex align-items-center">
                                                {{-- <img src="{{asset('frontEnd/assets/images/small-img4.jpg')}}" alt="" class="flex-shrink-0"> --}}
                                                <h3 class="title">{{$course->title ?? ''}}</h3>
                                            </div>
                                            </th>
                                               <td>
                                                @if($course->type == 0) UG @endif
                                                @if($course->type == 1) PG @endif
                                                @if($course->type == 2) Diploma @endif
                                               </td>
                                               <td>₹ {{$course->fees ?? ''}}</td>
                                               <td>@if(isset($course->start_date)) {{ Carbon\Carbon::parse($course->start_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }} @else N/A @endif</td>
                                               <td>@if(isset($course->end_date)){{ Carbon\Carbon::parse($course->end_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif</td>

                                                <td> <div>
                                                <a href="{{route('course_detail',['id'=> $course->id])}}" class="btn btn-primary text-light">Detail<i class="las la-angle-double-right"></i></a>
                                            </div></td>
                                        </tr>
                                        @endforeach
                                        @else<td> No Course Available</td> @endif
                                    </tbody>
                                   </table>

                               </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end itinerary -->

                        <!-- end reviews -->
                        <!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->




                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                        <td>
    @if (isset($universitycourse->category))
                        <?php  $coursecategory=$universitycourse->category->universityCourses; ?>
            {{-- {{dd($coursecategory)}} --}}

                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Related Courses</h3>
                            <!-- Example split danger button -->
                            <div class="sidebar-list" style="

                            height: 530px;
                            overflow: scroll;">
                                <ul class="list-items">
            @foreach( $coursecategory as $category)

                                    <li><div class="author-content d-flex">
                                        {{-- <div class="author-img">
                                            <a href="#">@if(isset($category->courseMedia->media) && file_exists($category->courseMedia->media))
                                                <img style=" width: 70px;
                                                height: 70px;" src="{{asset($category->courseMedia->media)}}" alt="">
                                                    @else
                                                    <img style=" width: 70px; height: 70px;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                                    @endif</a>
                                        </div> --}}
                                        <div class="author-bio">
                                            {{-- {{dd($consultant)}} --}}
                                            <h4 class="author__title"><a href="{{route('course_detail',['id'=> $category->id])}}">{{$category->title}}</a></h4>
                                            <span class="author__meta">Course Type :@if(isset($category->type)&&$category->type == 0)Under-Graduation
                                                @elseif($category->type == 1) Post-Graduation
                                                @elseif($category->type == 2)Diploma @endif</span>
                                            <div class="d-flex flex-wrap align-items-center ">

                                                {{-- </p> --}}
                                            </div>
                                            <div>
                                          <a href="{{route('course_detail',['id'=> $category->id])}}" class="btn btn-primary text-light"  ><span style="color: white;">Detail<i class="las la-angle-double-right"></i></span><a>


                                            </div>
                                        </div>
                                    </div></li>
                                    {{-- @endif --}}
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
                    <h2 class="sec__title line-height-55">More Universities</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="hotel-card-carousel-2 carousel-action">
                        @if (isset($universities))

                        @foreach($universities as $courseuniversity)
                        {{-- {{dd($courseuniversity)}} --}}
                        @if($courseuniversity)
                        @if($courseuniversity->status == 1)
                        <div class="card-item car-card border" style=" margin-bottom: 22px;">
                            <div class="card-img" style="text-align: center; height:185px;">

                                <a href="{{route('university_detail',['id' => $courseuniversity->id])}}" class="d-block">
                                    @if(isset($courseuniversity->university->cover_image) && file_exists($courseuniversity->university->cover_image))
                                                        <img
                                                        style=" width: 368px;
                                                        height: 245px;"
                                                        src="{{asset($courseuniversity->university->cover_image)}}" alt="">
                                                            @else
                                                            <img     style=" width: 368px;
                                                            height: 245px;" src="{{asset('frontEnd/assets/images/img21.jpg')}}" >
                                                            @endif
                                </a>
                                <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($courseuniversity->profile_image) && file_exists($courseuniversity->profile_image))
                                    <img
                                    style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                                    src="{{asset($courseuniversity->profile_image)}}" alt="">
                                        @else
                                        <img  style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                        @endif</div>
                                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                        @if($courseuniversity->Premium_expire_date > $mytime)<span style="
                                        background-color: #073975;
                                    " class="badge">Premium</span> @endif

                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="{{route('university_detail',['id' => $courseuniversity->id])}}">{{$courseuniversity->university->university_name}}</a>   @if($courseuniversity->is_verified == 1)
                                    <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>
                                @endif</h3>
                                <p class="card-meta">{{$courseuniversity->city ?? ''}}</p>
                                  <div class="d-flex flex-wrap align-items-center ">
                                                <p class="mr-2">Rating:</p>

                                                    <span>@if($courseuniversity->rating == 3 ?? '' )
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($courseuniversity->rating == 4 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($courseuniversity->rating == 5 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($courseuniversity->rating == 1?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($courseuniversity->rating == 2 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif</span> {!!"&nbsp;"!!} <span class="badge badge-warning text-white font-size-16">@if($courseuniversity->rating == null) - @else{{$courseuniversity->rating ?? ''}}/5 @endif</span>

                                            </div>
                                            <div class="card-attributes">
                                                <ul class="d-flex align-items-center">
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated Since"><i class="las la-university"></i><span>   @if(isset($courseuniversity->created_at))
                                                        {{$courseuniversity->created_at->Format("Y")}}
                                                        @else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="On Going Booking"><i class="la la-book"></i><span>
                                                        @if(isset($courseuniversity->userConsultant->consultantBooking))
                                                        {{$courseuniversity->userConsultant->consultantBooking->count()}}@else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Affiliated university"><i class="las la-university"></i><span>   @if(isset($courseuniversity->userConsultant->consultantUniversity))
                                                        {{$courseuniversity->userConsultant->consultantUniversity->count()}}
                                                        @else N/A @endif</span></li>
                                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Client"><i class="las la-users"></i><span>45</span></li>
                                                </ul>
                                            </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__text">Average Fees :</span>
                                        <span class="price__num">{{$courseuniversity->university->average_fees}}</span>
                                        {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                                    </p>

                           <a href="{{route('university_detail',['id'=>$courseuniversity->id])}}"><label for="chb4" class="theme-btn theme-btn-small mt-2">Detail<i class="las la-angle-double-right"></i></label></a>


                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
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
