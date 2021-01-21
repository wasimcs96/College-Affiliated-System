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

    <section class="breadcrumb-area bread-bg-4 py-0" style="background-image: url('{{asset($university->profile_image)}}');">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-fancybox="video" data-src="https://www.youtube.com/embed?v=S5WFxUDs0pE"
                               data-speed="700">
                                <i class="la la-video-camera mr-2"></i>Video
                            </a>
                            <a class="theme-btn" data-src="{{asset($university->profile_image)}}"
                               data-fancybox="gallery"
                               data-caption="Showing image - 01"
                               data-speed="700">
                                <i class="la la-photo mr-2"></i>More Photos
                            </a>

                        </div>
                      <?php
                      $medias = $university->universityMedia;
                    //   dd($medias);
                ?>
                        @foreach($medias as $media)
                        <a class="d-none"
                             data-fancybox="gallery"
                             data-src="{{asset($media->media)}}"

                             data-caption="Showing image - {{$media->id}}"
                             data-speed="700"></a>
                             @endforeach

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
                            <li><a data-scroll="description" href="#description" class="scroll-link active">About This University</a></li>
                            <li><a data-scroll="itinerary" href="#itinerary" class="scroll-link">Courses</a></li>
                            <li><a data-scroll="staterooms" href="#staterooms" class="scroll-link">Consultants</a></li>

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
                                         <input type="text" name="unviersity_id"  value="{{$university->id}}" hidden>
                                         <input type="text" name="consultant_id"  value="{{auth()->user()->id}}" hidden>
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
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$university->university->university_name ?? ''}}</h3>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">University Type:       @if($university->university->type==0 ?? '' )
                                        Private
                                    @else Govenment
                                    @endif</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">Rating:</p>
                                        <span class="badge badge-warning text-white font-size-16">{{$university->rating ?? ''}}/5</span>{!!"&nbsp;"!!}
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
                                        @endif</span>
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
                                            <li><span>Country:</span>{{$country->countries_name ?? ''}}</li>
                                            <li><span>City:</span>{{$university->city}}</li>
                                            {{-- <li><span>Admission Opens:</span>19/09/20</li>
                                            <li><span>Campus:</span>93,558 grt</li> --}}
                                            <li><span>University Type:</span> @if($university->university->type==0 ?? '' )
                                                Private
                                                @else Govenment</p>
                                                @endif</li>
                                            {{-- <li><span>Opening time:</span>105 ft</li>
                                            <li><span>Closeing time:</span>28 ft</li>
                                            <li><span>brachs</span>22.5 knots</li> --}}
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                   <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">
                                            <li><span>Courses:</span>{{$university->universityCourse->count()}}</li>

                                            <li><span>Consultants:</span>{{$university->universityConsultant->count()}}</li>
                                            <li><span>Website:</span>{{$university->university->website}}</li>
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
                                <h3 class="title font-size-20">Courses</h3>
                               <div class="table-form table-responsive padding-top-30px">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th scope="col">Type</th>
                                               <th scope="col">Course</th>
                                               <th scope="col">1st Year Fees</th>
                                               <th scope="col">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php $courses=$university->universityCourse?>
                                          @foreach($courses as $course)
                                           <tr>
                                               <th scope="row">@if($course->course->type == 0) UG @endif
                                                @if($course->course->type == 1) PG @endif
                                                @if($course->course->type == 2) Diploma @endif
                                            </th>
                                               <td>
                                                   <div class="table-content d-flex align-items-center">
                                                       <img src="{{asset('frontEnd/assets/images/small-img4.jpg')}}" alt="" class="flex-shrink-0">
                                                       <h3 class="title">{{$course->course->name}}</h3>
                                                   </div>
                                               </td>
                                               <td>{{$course->fees}}</td>
                                               <td> <div>
                                                <a href="{{route('course_detail')}}" class="btn btn-primary text-light">Detail</a>
                                            </div></td>
                                           </tr>
                                           @endforeach
                                    </tbody>
                                   </table>
                                   <p class="font-size-14 line-height-26"><strong class="text-black">Please note:</strong>sdfsdfsdfsdfjjsdhfsjdhfjshsjhdfkjhsjdfhjsdfhsdhfdsfksfksdfjkdshfjshfjshdjkfdshfjhdfhdsjhfdsfkdsfksdkfh.</p>
                               </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end itinerary -->
                        <div  class="page-scroll">
                            {{-- <!-- end single-content-item --> --}}
                            @if (isset($university->universityConsultant))
                            <?php $universityconsultant=$university->universityConsultant; ?>
                            <div class="section-block" id="staterooms"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h2 class="title font-size-23" >Select a Consutant </h2>
                                @foreach($universityconsultant as $consultant)
                                @if($consultant->status == 1)
                                <div class="cabin-type padding-top-30px">
                                    <div class="cabin-type-item d-flex pt-4">
                                        <div class="cabin-type-img flex-shrink-0">
                                            @if(isset($consultant->userConsultant->profile_image) && file_exists($consultant->userConsultant->profile_image))
                                            <img style=" width: 152px;
                                            height: 115px;" src="{{asset($consultant->userConsultant->profile_image)}}" alt="">
                                                @else
                                                <img style=" width: 152px; height: 115px;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                                @endif
                                        </div>
                                       <div class="cabin-type-detail">
                                            <h3 class="title">{{$consultant->userConsultant->consultant->company_name}}</h3>
                                           <ul class="list-items pt-2 pb-2">
                                               <li><span>On Going Applications:</span>{{$consultant->userConsultant->consultantBooking->count()}}</li>
                                               <li><span>Affiliated Since:{!! "&nbsp;" !!}{{$consultant->created_at->format('Y','M','D')}}</span></li>
                                        <li><span>Location:</span>{{$consultant->userConsultant->address ?? ''}}.</li>
                                           </ul>
                                       </div>
                                       <div class="cabin-price">
                                           <ul><li>
                                            <div class="d-flex flex-wrap align-items-center pt-2">
                                                <p class="mr-2">Rating:</p>
                                                    <span class="badge badge-warning text-white font-size-16">@if($consultant->userConsultant->rating == null) - @else{{$consultant->userConsultant->rating ?? ''}}/5 @endif</span>{!!"&nbsp;"!!}
                                                    <span>@if($consultant->userConsultant->rating == 3 ?? '' )
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($consultant->userConsultant->rating == 4 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 5 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 1 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 2 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif</span>
                                                </p>
                                            </div></li>
                                           </ul>
                                           <div class="custom-checkbox mb-0">
                                               <input type="checkbox" id="chb2">
                                               @if(auth()->user())
                                               @if(auth()->user()->isClient())

<form action="{{route('consultant_book',['id'=>$consultant->userConsultant->id])}}" method="POST">
    @csrf
    <input type="text" name="universityid" value="{{$university->id}}" hidden>
    <input type="text" name="consultantid" value="{{$consultant->userConsultant->id}}" hidden>

                                           {{-- <a href="{{route('consultant_book',['id'=>$consultant->consultant->id])}}"><label for="chb4" class="theme-btn theme-btn-small">Book Now</label></a> --}}
                                           <button type="submit" class="theme-btn theme-btn-small">Book Now</button>

</form>
                                         @else
                                      <a href="{{route('consultant_detail',['id'=>$consultant->userConsultant->id])}}"><label for="chb4" class="theme-btn theme-btn-small">Detail</label></a>
                                         @endif
                                         @else
                                         <button type="submit" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#loginPopupForm">Book Now</button>
                                         @endif

                                        </div>
                                       </div>
                                    </div><!-- end cabin-type-item -->
                                </div><!-- end cabin-type -->
                                @else
                               <h4 class="mt-5" style="text-align:center;"> No consultant Affiliated</h4 >
                                @endif
                                @endforeach

                            </div>
                            @endif<!-- end single-content-item -->
                            <p class="font-size-14 line-height-26 padding-bottom-40px"><strong class="text-black">Please note:</strong>Above Consultants are affiliated to this University.</p>
                            <div class="section-block"></div>
                        </div>
                        <!-- end reviews -->
                        <!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">


                    <div class="sidebar single-content-sidebar mb-0">
    @if ($university->universityConsultant)
                        <?php $universityconsultant=$university->universityConsultant; ?>
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Featured Consultant</h3>
                            <!-- Example split danger button -->

                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                  <button class="btn btn-outline-primary btn-sm" type="button" id="button-addon1">Country</button>
                                </div>
                                <input type="text" class="form-control col-xs-2" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              </div>
                            <div class="sidebar-list">
                                <ul class="list-items">
            @foreach($universityconsultant as $consultant)
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
                                            <h4 class="author__title"><a href="#">{{$consultant->userConsultant->consultant->company_name}}</a></h4>
                                            <span class="author__meta">Member Since {{$consultant->userConsultant->consultant->created_at}}</span>
                                            <div class="d-flex flex-wrap align-items-center pt-2">
                                                <p class="mr-2">Rating:</p>
                                                    <span class="badge badge-warning text-white font-size-16">@if($consultant->userConsultant->rating == null) - @else{{$consultant->userConsultant->rating ?? ''}}/5 @endif</span>{!!"&nbsp;"!!}
                                                    <span>@if($consultant->userConsultant->rating == 3 ?? '' )
                                                            <span class="ratings ">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star-o"></i>
                                                                <i class="la la-star-o"></i>
                                                            </span>
                                                    @elseif($consultant->userConsultant->rating == 4 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 5 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 1?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @elseif($consultant->userConsultant->rating == 2 ?? '' )
                                                    <span class="ratings ">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                        <i class="la la-star-o"></i>
                                                    </span>
                                                    @endif</span>
                                                </p>
                                            </div>
                                            <div>
                                                @if(auth()->user())
                                                @if(auth()->user()->isClient())

 <form action="{{route('consultant_book',['id'=>$consultant->userConsultant->id])}}" method="POST">
     @csrf
     <input type="text" name="universityid" value="{{$university->id}}" hidden>
     <input type="text" name="consultantid" value="{{$consultant->userConsultant->id}}" hidden>

                                            {{-- <a href="{{route('consultant_book',['id'=>$consultant->consultant->id])}}"><label for="chb4" class="theme-btn theme-btn-small">Book Now</label></a> --}}
                                            <button type="submit" class="theme-btn theme-btn-small">Book Now</button>

 </form>
                                          @else
                                       <a href="{{route('consultant_detail',['id'=>$consultant->userConsultant->id])}}"><label for="chb4" class="theme-btn theme-btn-small">Detail</label></a>
                                          @endif
                                          @else
                                          <button type="submit" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#loginPopupForm">Book Now</button>
                                          @endif

                                            </div>
                                        </div>
                                    </div></li>
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
<!-- ================================
    END CRUISE DETAIL AREA
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
</section><!-- end cta-area -->
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
