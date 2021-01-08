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
                            <li><a data-scroll="faq" href="#faq" class="scroll-link">FAQ</a></li>
                            <li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
                        {{-- <li> --}}
                            <?php
                            $consultant = DB::table('university_consultants')
                                      ->where('university_id', '=', $university->id)->where('consultant_id','=',auth()->user()->id)
                                      ->get()->first();
                                $consults = DB::table('consultants')->get();
                                     ?>


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
                                    @else Govenment</p>
                                    @endif
                                    <p>
                                        <span class="badge badge-warning text-white font-size-16">4.6</span>
                                        <span>(4,209 Reviews)</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Description</h3>
                                <p class="pt-3">Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
                            </div><!-- end single-content-item -->
                            <div class="single-content-item padding-bottom-30px">
                                <h3 class="title font-size-20">University  Statistics</h3>
                                <div class="row pt-4">
                                    <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">
                                            <li><span>Estabilished:</span>29 years ago</li>
                                            <li><span>Since:</span>01/01/2017</li>
                                            <li><span>Admission Opens:</span>19/09/20</li>
                                            <li><span>Campus:</span>93,558 grt</li>
                                            <li><span>Courses:</span>965 ft</li>
                                            <li><span>Opening time:</span>105 ft</li>
                                            <li><span>Closeing time:</span>28 ft</li>
                                            <li><span>brachs</span>22.5 knots</li>
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                   <div class="col-lg-6 responsive-column">
                                        <ul class="list-items list-items-2">
                                            <li><span>Consultants:</span>23,400</li>
                                            <li><span>Total Staff:</span>9,078 crew</li>
                                            <li><span>Counsellor:</span>Italian</li>
                                            <li><span>Hostels:</span>International</li>
                                            <li><span>affiliated collages:</span>International</li>
                                            <li><span>Registry:</span>Panama</li>
                                            <li><span>University Type:</span>Managment</li>
                                        </ul><!-- end list-items -->
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            {{-- <div class="single-content-item padding-bottom-40px">
                                <h3 class="title font-size-20 d-flex align-items-center justify-content-between">
                                    What's Included
                                    <a class="btn collapse-btn theme-btn-hover-gray font-size-15" data-toggle="collapse" href="#viewIncludedExample" role="button" aria-expanded="false" aria-controls="viewIncludedExample">
                                        View<i class="la la-angle-down ml-1"></i>
                                    </a>
                                </h3>
                                <div class="collapse" id="viewIncludedExample">
                                    <div class="cruise-included-feature-wrap">
                                        <div class="cruise-include-feature pt-3">
                                            <h3 class="title font-size-15 font-weight-medium pb-2">Included</h3>
                                            <p class="pb-3 font-size-15">Unless otherwise indicated on your itinerary, a Holland America Line includes the following on final confirmation. Taxes and fees are typically not included in the advertised price, but included in your final booking prices.</p>
                                            <ul class="list-items">
                                                <li><i class="la la-check text-success mr-2"></i>Your choice of inside, oceanview, balcony or suite accommodations</li>
                                                <li><i class="la la-check text-success mr-2"></i>All meals onboard including 24 hour room service</li>
                                                <li><i class="la la-check text-success mr-2"></i>Coffee, tea, milk, juice and non-bottled water</li>
                                                <li><i class="la la-check text-success mr-2"></i>Onboard entertainment including shows, discos, comedy clubs, bars, lounges, etc.</li>
                                                <li><i class="la la-check text-success mr-2"></i>Age appropriate kids programming for toddlers, kids, and teens.</li>
                                                <li><i class="la la-check text-success mr-2"></i>Use of all fitness facilities, pools, hot tubs, sports courts, etc.</li>
                                                <li><i class="la la-check text-success mr-2"></i>Taxes and Fees (included in the final price but typically not advertised price)</li>
                                            </ul>
                                        </div>
                                        <div class="cruise-include-feature pt-3">
                                            <h3 class="title font-size-15 font-weight-medium pb-2">Not Included</h3>
                                            <p class="pb-3 font-size-15">Unless otherwise indicated above or on your final confirmation, your cruise price does not include:</p>
                                            <ul class="list-items">
                                                <li><i class="la la-times text-danger mr-2"></i>Airfare and transfers to the ship</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Gratuities</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Casino gambling or Bingo</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Meals in any alternative or special dining restaurants or venues</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Soft drinks, bottled water, specialty coffees, or alcoholic beverages including beer, wine, spirits.</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Shore Excursions and sightseeing tours</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Spa or Salon Services</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Items of a personal nature like souvenirs, photos</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Internet access</li>
                                                <li><i class="la la-times text-danger mr-2"></i>Travel Insurance (recommended)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end single-content-item --> --}}
                            {{-- <div class="single-content-item">
                                <h3 class="title font-size-20 d-flex align-items-center justify-content-between">
                                    University Amenities
                                    <a class="btn collapse-btn theme-btn-hover-gray font-size-15" data-toggle="collapse" href="#viewAmenitiesExample" role="button" aria-expanded="false" aria-controls="viewAmenitiesExample">
                                        View Amenities<i class="la la-angle-down ml-1"></i>
                                    </a>
                                </h3>
                                <div class="collapse" id="viewAmenitiesExample">
                                    <div class="row pt-4">
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-glass"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Bars and Lounges</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Bars and Lounges</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Disco / Night Club</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Library</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Piano Bar</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Wine / Champagne Bar</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-music"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Entertainment and Nightlife</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Bars and Lounges</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Broadway / Las Vegas Style Productions</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Disco / Night Club</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Movie Theater / Cinema</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Piano Bar</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-users"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Groups and Meetings</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Business Center</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Conference / Meeting Rooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Private Dining Room</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-wifi"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Internet and Communications</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Computer Classes</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Internet Center</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-users"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Kids and Family</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Age Group Specific Youth Programs</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Arcade / Video Games</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Childrens' Play Area</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Connecting Staterooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Dedicated Teen Center</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Family Staterooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Group Babysitting</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Private Babysitting</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Sports Court</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Teen Staff</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Youth Staff</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gear"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Other Facilities and Services</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Concierge Desk</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Dry Cleaning / Laundry Service</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Elevators</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Infirmary / Medical Center</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Self Service Laundry</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-swimming-pool"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Pools & Hot Tubs</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Hot Tubs</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Outdoor Pool</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Solarium</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-cutlery"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Restaurants and Dining</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Culinary Programs</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Private Dining Room</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Special Diets</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Specialty Restaurants</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-bars"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Shipboard Activities</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Shopping</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Arcade / Video Games</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Basketball</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Card Room / Game Room</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Casino</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Computer Classes</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Culinary Programs</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Movie Theater / Cinema</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Sports Court</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Tennis</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-spa"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Spas and Wellness</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Beauty Salon</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Full Service Spa</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Health / Nutrition Evaluations</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Medspa Services</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Sauna / Steam Room</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Yoga</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-wheelchair"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Special Needs</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Accessible Gaming</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Accessible Public Areas</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Accessible Showrooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Accessible Staterooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Accessible Tendering</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Auditory Assistance (TTY/TTD)</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Braille Signage</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Close Captioned TV</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Decks with Ramps</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Elevators to Accommodate Wheelchairs </li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Oxygen</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Sharps Disposal</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Special Diets</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Visual Assistance (Visually Impaired) </li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Wheelchairs Accepted </li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gamepad"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Sports and Fitness</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Aerobics</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Basketball</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Fitness Center / Gym</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Health / Nutrition Evaluations</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Jogging Track</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Pilates</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Sauna / Steam Room</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Sports Court</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Tennis</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Yoga</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-bed"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Staterooms and Suites</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Accessible Staterooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Concierge Services</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Connecting Staterooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Exclusive Suite Area</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Family Staterooms</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>In-Room Movies</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>In-Room Safe</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Priority Check-In & Boarding for Suite Guests</li>
                                                        <li><i class="la la-check mr-2 text-success"></i>Refrigerator in Staterooms</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="single-tour-feature d-flex mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-lightbulb"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium pb-2">Weddings & Special Occasions</h3>
                                                    <ul class="list-items">
                                                        <li><i class="la la-check mr-2 text-success"></i>Private Dining Room</li>
                                                    </ul>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end single-content-item --> --}}
                        </div><!-- end description -->
                        <div id="itinerary" class="page-scroll">
                            <div class="section-block margin-top-40px"></div>
                            <div class="single-content-item padding-top-40px padding-Rbottom-40px">
                                <h3 class="title font-size-20">Courses</h3>
                               <div class="table-form table-responsive padding-top-30px">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th scope="col">tenure</th>
                                               <th scope="col">Course</th>
                                               <th scope="col">Branch no.</th>
                                               <th scope="col">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php $courses=$university->universityCourse?>
                                          @foreach($courses as $course)
                                           <tr>
                                               <th scope="row">4 years</th>
                                               <td>
                                                   <div class="table-content d-flex align-items-center">
                                                       <img src="{{asset('frontEnd/assets/images/small-img4.jpg')}}" alt="" class="flex-shrink-0">
                                                       <h3 class="title">{{$course->course->name}}</h3>
                                                   </div>
                                               </td>
                                               <td>5</td>
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
                                            <img    style=" width: 152px;
                                            height: 115px;" src="{{asset($consultant->userConsultant->profile_image)}}" alt="">
                                        </div>
                                       <div class="cabin-type-detail">
                                            {{-- <h3 class="title">{{$consultant->consultant->company_name}}</h3> --}}
                                           <ul class="list-items pt-2 pb-2">
                                               <li><span>Admission Done:</span>139</li>
                                               <li><span>affiliated since:</span>2000</li>
                                        <li><span>Location:</span>{{$consultant->userConsultant->address}}.</li>
                                           </ul>
                                       </div>
                                       <div class="cabin-price">
                                           <ul><li>
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                            </span></li>
                                               <li> <span class="ml-2">305 Reviews</span>
                                          </li>
                                           </ul>
                                           <div class="custom-checkbox mb-0">
                                               <input type="checkbox" id="chb2">
                                               @if(auth()->user())

<form action="{{route('consultant_book',['id'=>$consultant->userConsultant->id])}}" method="POST">
    @csrf
    <input type="text" name="universityid" value="{{$university->id}}" hidden>
    <input type="text" name="consultantid" value="{{$consultant->userConsultant->id}}" hidden>

                                           {{-- <a href="{{route('consultant_book',['id'=>$consultant->consultant->id])}}"><label for="chb4" class="theme-btn theme-btn-small">Book Now</label></a> --}}
                                           <button type="submit" class="theme-btn theme-btn-small">Book Now</button>

</form>
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
                        <div id="reviews" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="review-container padding-top-30px">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8">
                                            <div class="review-summary">
                                                <h2>4.5<span>/5</span></h2>
                                                <p>Excellent</p>
                                                <span>Based on 4 reviews</span>
                                            </div>
                                        </div><!-- end col-lg-4 -->

                                    </div>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end reviews -->
                        <div class="review-box">
                            <div class="single-content-item padding-top-40px">
                                <h3 class="title font-size-20">Showing 3 guest reviews</h3>
                                <div class="comments-list padding-top-50px">
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team8.jpg')}}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author">Jenny Doe</h3>
                                                <div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    <p class="comment__date">April 5, 2019</p>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                                Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis
                                            </p>
                                            <div class="comment-reply d-flex align-items-center justify-content-between">
                                                <a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
                                                    <span class="la la-mail-reply mr-1"></span>Reply
                                                </a>
                                                <div class="reviews-reaction">
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                    <a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end comments -->
                                    <div class="comment comment-reply-item">
                                        <div class="comment-avatar">
                                            <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team9.jpg')}}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author">Jenny Doe</h3>
                                                <div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    <p class="comment__date">April 5, 2019</p>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                                Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis
                                            </p>
                                            <div class="comment-reply d-flex align-items-center justify-content-between">
                                                <a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
                                                    <span class="la la-mail-reply mr-1"></span>Reply
                                                </a>
                                                <div class="reviews-reaction">
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                    <a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end comments -->
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team10.jpg')}}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author">Jenny Doe</h3>
                                                <div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                    <p class="comment__date">April 5, 2019</p>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                                Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis
                                            </p>
                                            <div class="comment-reply d-flex align-items-center justify-content-between">
                                                <a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
                                                    <span class="la la-mail-reply mr-1"></span>Reply
                                                </a>
                                                <div class="reviews-reaction">
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                    <a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end comments -->
                                    <div class="btn-box load-more text-center">
                                        <button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Load More Review</button>
                                    </div>
                                </div><!-- end comments-list -->
                                <div class="comment-forum padding-top-40px">
                                    <div class="form-box">
                                        <div class="form-title-wrap">
                                            <h3 class="title">Write a Review</h3>
                                        </div><!-- form-title-wrap -->
                                        <div class="form-content">
                                            <div class="rate-option p-2">
                                                <div class="row">
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="rate-option-item">
                                                            <label>Service</label>
                                                            <div class="rate-stars-option">
                                                                <input type="checkbox" id="lst1" value="1">
                                                                <label for="lst1"></label>
                                                                <input type="checkbox" id="lst2" value="2">
                                                                <label for="lst2"></label>
                                                                <input type="checkbox" id="lst3" value="3">
                                                                <label for="lst3"></label>
                                                                <input type="checkbox" id="lst4" value="4">
                                                                <label for="lst4"></label>
                                                                <input type="checkbox" id="lst5" value="5">
                                                                <label for="lst5"></label>
                                                            </div>
                                                        </div>
                                                    </div><!-- col-lg-4 -->
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="rate-option-item">
                                                            <label>Location</label>
                                                            <div class="rate-stars-option">
                                                                <input type="checkbox" id="l1" value="1">
                                                                <label for="l1"></label>
                                                                <input type="checkbox" id="l2" value="2">
                                                                <label for="l2"></label>
                                                                <input type="checkbox" id="l3" value="3">
                                                                <label for="l3"></label>
                                                                <input type="checkbox" id="l4" value="4">
                                                                <label for="l4"></label>
                                                                <input type="checkbox" id="l5" value="5">
                                                                <label for="l5"></label>
                                                            </div>
                                                        </div>
                                                    </div><!-- col-lg-4 -->
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="rate-option-item">
                                                            <label>Value for Money</label>
                                                            <div class="rate-stars-option">
                                                                <input type="checkbox" id="vm1" value="1">
                                                                <label for="vm1"></label>
                                                                <input type="checkbox" id="vm2" value="2">
                                                                <label for="vm2"></label>
                                                                <input type="checkbox" id="vm3" value="3">
                                                                <label for="vm3"></label>
                                                                <input type="checkbox" id="vm4" value="4">
                                                                <label for="vm4"></label>
                                                                <input type="checkbox" id="vm5" value="5">
                                                                <label for="vm5"></label>
                                                            </div>
                                                        </div>
                                                    </div><!-- col-lg-4 -->
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="rate-option-item">
                                                            <label>Cleanliness</label>
                                                            <div class="rate-stars-option">
                                                                <input type="checkbox" id="cln1" value="1">
                                                                <label for="cln1"></label>
                                                                <input type="checkbox" id="cln2" value="2">
                                                                <label for="cln2"></label>
                                                                <input type="checkbox" id="cln3" value="3">
                                                                <label for="cln3"></label>
                                                                <input type="checkbox" id="cln4" value="4">
                                                                <label for="cln4"></label>
                                                                <input type="checkbox" id="cln5" value="5">
                                                                <label for="cln5"></label>
                                                            </div>
                                                        </div>
                                                    </div><!-- col-lg-4 -->
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="rate-option-item">
                                                            <label>Facilities</label>
                                                            <div class="rate-stars-option">
                                                                <input type="checkbox" id="f1" value="1">
                                                                <label for="f1"></label>
                                                                <input type="checkbox" id="f2" value="2">
                                                                <label for="f2"></label>
                                                                <input type="checkbox" id="f3" value="3">
                                                                <label for="f3"></label>
                                                                <input type="checkbox" id="f4" value="4">
                                                                <label for="f4"></label>
                                                                <input type="checkbox" id="f5" value="5">
                                                                <label for="f5"></label>
                                                            </div>
                                                        </div>
                                                    </div><!-- col-lg-4 -->

                                                </div><!-- end row -->
                                            </div><!-- end rate-option -->
                                            <div class="contact-form-action">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Name</label>
                                                                <div class="form-group">
                                                                    <span class="la la-user form-icon"></span>
                                                                    <input class="form-control" type="text" name="text" placeholder="Your name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Email</label>
                                                                <div class="form-group">
                                                                    <span class="la la-envelope-o form-icon"></span>
                                                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="input-box">
                                                                <label class="label-text">Message</label>
                                                                <div class="form-group">
                                                                    <span class="la la-pencil form-icon"></span>
                                                                    <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button type="button" class="theme-btn">Leave a Review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- end contact-form-action -->
                                        </div><!-- end form-content -->
                                    </div><!-- end form-box -->
                                </div><!-- end comment-forum -->
                            </div><!-- end single-content-item -->
                        </div><!-- end review-box -->
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
                                            <a href="#"><img src="{{asset($consultant->userConsultant->profile_image)}}" alt="testimonial image"></a>
                                        </div>
                                        <div class="author-bio">
                                            {{-- {{dd($consultant)}} --}}
                                            <h4 class="author__title"><a href="#">{{$consultant->userConsultant->consultant->company_name}}</a></h4>
                                            <span class="author__meta">Member Since {{$consultant->userConsultant->consultant->created_at}}</span>
                                            <span class="ratings d-flex align-items-center">
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star-o"></i>
                                                     <span class="ml-2">305 Reviews</span>
                                                </span>
                                            <div>
                                                @if(auth()->user())
                                                <form action="{{route('consultant_book',['id'=>$consultant->userConsultant->id])}}" method="POST">
                                                    @csrf
                                                    <input type="text" name="universityid" value="{{$university->id}}" hidden>
                                                    {{-- {{dd($university->id)}} --}}
                                                    <input type="text" name="consultantid" value="{{$consultant->userConsultant->id}}" hidden>

                                                                                           {{-- <a href="{{route('consultant_book',['id'=>$consultant->consultant->id])}}"><label for="chb4" class="theme-btn theme-btn-small">Book Now</label></a> --}}
                                                                                           <button type="submit" class="theme-btn theme-btn-small">Book Now</button>

                                                </form>
                                                                                         @else
                                                                                         <button type="submit" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#loginPopupForm">Book Now</button>
                                                @endif                                            </div>
                                        </div>
                                    </div></li>
@endforeach

                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        @endif


                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Enquiry Form</h3>
                            <div class="enquiry-forum">
                                <div class="form-box">
                                    <div class="form-content">
                                        <div class="contact-form-action">
                                            <form method="post">
                                                <div class="input-box">
                                                    <label class="label-text">Your Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text" name="text" placeholder="Your name">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Your Email</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope-o form-icon"></span>
                                                        <input class="form-control" type="email" name="email" placeholder="Email address">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="label-text">Message</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <div class="form-group">
                                                        <div class="custom-checkbox mb-0">
                                                            <input type="checkbox" id="agreeChb">
                                                            <label for="agreeChb">I agree with <a href="#">Terms of Service</a> and
                                                                <a href="#">Privacy Statement</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-box">
                                                    <button type="button" class="theme-btn">Submit Enquiry</button>
                                                </div>
                                            </form>
                                        </div><!-- end contact-form-action -->
                                    </div><!-- end form-content -->
                                </div><!-- end form-box -->
                            </div><!-- end enquiry-forum -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Why Book With Us?</h3>
                            <div class="sidebar-list">
                                <ul class="list-items">
                                    <li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee</li>
                                    <li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7</li>
                                    <li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities</li>
                                    <li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Get a Question?</h3>
                            <p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
                            <div class="sidebar-list pt-3">
                                <ul class="list-items">
                                    <li><i class="la la-phone icon-element mr-2"></i><a href="#">+ 61 23 8093 3400</a></li>
                                    <li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@dc.com">info@dc.com</a></li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->

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
