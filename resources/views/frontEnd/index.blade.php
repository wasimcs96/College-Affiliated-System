@extends('frontEnd.layout.master')
@section('title','Campus Interest')
@section('content')
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START HERO-WRAPPER AREA
================================= -->

<section class="hero-wrapper">
    <div class="hero-box  hero-bg "  style="z-index: 1; top: -76px;">
        {{-- style="background-image: url('{{ asset('frontEnd/assets/images/svvg.svg')}}');" --}}
        <span class="line-bg line-bg1"></span>
        <span class="line-bg line-bg2"></span>
        <span class="line-bg line-bg3"></span>
        <span class="line-bg line-bg4"></span>
        <span class="line-bg line-bg5"></span>
        <span class="line-bg line-bg6"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto responsive--column-l">
                    <div class="hero-content pb-5">
                        <div class="section-heading text-center" >
                            {{-- #073975; --}}
                            <h2 class="sec__title cd-headline zoom" style="color: white">
                                Amazing <span class="cd-words-wrapper" style="color:#ff7300">
                                <b class="is-visible">Education</b>
                                <b>Courses</b>
                                <b>Colleges</b>
                                <b>Universities</b>
                                <b>Consultants</b>
                                <b>Services</b>
                                <b>Guidance</b>
                                <b>Assistance</b>
                                {{-- <b>People</b> --}}
                                </span>
                                Waiting for You
                            </h2>
                        </div>
                    </div><!-- end hero-content -->
                    <div class="section-tab text-center " style="font-size: 86%; padding-left: 1.5625vw">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link d-flex align-items-center active homebuttonoption" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">
                                    <i class="la la-book mr-1"></i>Courses
                                </a>
                            </li>
                            <li class="nav-item" style="margin-bottom: 0;">
                                <a class="nav-link d-flex align-items-center" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false" style="height: 100%;">
                                    <i class="la la-university mr-1"></i>Universities
                                </a>
                            </li>

                            <li class="nav-item" style="margin-bottom: 0;">
                                <a class="nav-link d-flex align-items-center" id="car-tab" data-toggle="tab" href="#car" role="tab" aria-controls="car" aria-selected="true" style="height: 100%;">
                                    <i class="la la-user mr-1"></i>Consultants
                                </a>
                            </li>

                            {{-- <li class="nav-item" style="margin-bottom: 0;">
                                <a class="nav-link d-flex align-items-center" id="tour-tab" data-toggle="tab" href="#tour" role="tab" aria-controls="tour" aria-selected="false" style="height: 100%;">
                                    <i class="la la-globe mr-1"></i>Abroad
                                </a>
                            </li> --}}
                        </ul>
                    </div><!-- end section-tab -->
                    <div class="tab-content search-fields-container" id="myTabContent">
                        <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                     <!-- end section-tab -->
                            <div class="tab-content" id="myTabContent3">
                                <div class="tab-pane fade show active" id="one-way" role="tabpanel" aria-labelledby="one-way-tab">
                                    <div class="contact-form-action">
                                        <form action="{{route('university_fetch.coursewise')}}" method="POST" class="row align-items-center">
                                            @csrf

                                            <div class="col-lg-3 col-sm-2 pr-0">
                                                <div class="input-box">
                                                    <label class="label-text" id="ali">Discipline</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select id="categoryselect" name="category" class="form-control typeselect" required style="
                                                            padding: 15px;
                                                        ">
                                                                <option value="">
                                                                    Select Discipline
                                                                </option>
                                                                <?php $categories = App\Models\Category::all();?>
                                                    @if($categories->count() > 0)
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id ?? ''}}">{{$category->title ?? ''}}</option>
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
                                                    <label class="label-text">Sub Discipline</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select id="selectcourse" name="sub_category" class="form-control ert"   style="
                                                            height: 52px;
                                                            padding: 15px;
                                                        ">
                                                                <option value="" selected>Select Sub Discipline</option>



                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-2 pr-0" >
                                                <div class="input-box">
                                                    <label class="label-text">Study Level</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select  name="study_level" class="form-control"   style="
                                                            height: 52px;
                                                            padding: 15px;
                                                        ">
                                                                <option value="" selected>Select Study Level</option>
                                                                @php
                                                                $levels=Config::get('level.study_level');
                                                                @endphp

                                                                @foreach($levels as $key=>$level)
                                                                        <option value="{{$key}}" >{{$level}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-2">
                                                <button type="submit"  class="theme-btn w-100 text-center "style="margin-top: 4px">Search Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end tab-pane -->
                                <!-- end tab-pane -->
                              <!-- end tab-pane -->
                            </div>
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                            <div class="contact-form-action">
                                <form action="{{route('university_fetch.countrywise')}}" method="POST" class="row align-items-center">
                                    @csrf
                                    <div class="col-lg-6 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Destination Country</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                <select class="select-contain-select" name="countries_id" required>
                                                    <option>Select Country</option>

                                                    <?php $countries = App\Models\Country::all();?>
                                                    @if($countries->count() > 0)
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->countries_id}}" >{{$country->countries_name}}</option>
                                                    @endforeach

                                                    @else

                                                        <option value="">Currently Unavailable</option>

                                                    @endif

                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->

                                    <div class="col-lg-4 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Study Level</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="universitystudylevel">
                                                        <option value="" selected>Select Study Level</option>
                                                        @php
                                                        $levels=Config::get('level.study_level');
                                                        @endphp

                                                        @foreach($levels as $key=>$level)
                                                                <option value="{{$key}}" >{{$level}}</option>
                                                        @endforeach
                                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->

                            <div class="btn-box col-lg-2">
                                <button type="submit"  style="
                                margin-bottom: -4px;
                            " class="theme-btn">Search Now</button>
                            </div>
                        </form>
                            </div>
                        </div><!-- end tab-pane -->
                 <!-- end tab-pane -->
                        <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
                            <div class="contact-form-action">
                                <form action="{{route('consultant_fetch_selected.universitywise')}}" method="GET" class="row align-items-center">
                                    @csrf
                                    <div class="col-lg-3 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Service Type</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" data-live-search="true"  placeholder="Exam" id="university" name="service" required>
                                                        <option value="">Select Service</option>
                                                        <option value="0">PR Migration</option>
                                                        <option value="1">Student Visa</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $countries = App\Models\Country::all();?>
                                    <div class="col-lg-3 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Destination Country</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <div class="select-contain w-auto">
                                                    {{-- <select class="select-contain-select" id="salazar" name="countries_id" data-live-search="true" required>
                                                        <option>Select Country</option>
                                                        @if($countries->count() > 0)
                                                         @foreach($countries as $country)
                                                            <option value="{{$country->countries_id}}" >{{$country->countries_name}}</option>
                                                         @endforeach

                                                        @else

                                                            <option value="">Currently Unavailable</option>

                                                        @endif

                                                    </select> --}}
                                                    <select class="select-contain-select" data-live-search="true"  name="countries_id" required>
                                                        <option value="">Select Country</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->countries_id}}" >{{$country->countries_name}}</option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-3 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text"
                                        >Enter Your Location</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <div id="locationField">
                                                    <input class="form-control"
                                                      id="autocomplete"
                                                      name="googleAddress"
                                                      value=""
                                                      placeholder="Enter your Location"
                                                      onFocus="geolocate()"
                                                      type="text"
                                                     />
                                                  </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->

                                    <div class="btn-box pt-3 col-lg-2">
                                        <button type="submit" class="theme-btn" style="
                                        margin-bottom: 8px;
                                    ">Search Now</button>
                                    </div>
                                </form>
                               <!-- end row -->
                            </div>
                           <!-- end advanced-wrap -->
                        </div><!-- end tab-pane -->
                      <!-- end tab-pane -->

                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        {{-- <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg> --}}
    </div>
</section><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

    {{-- <div class="jumbotron jumbotron-fluid" style="margin-top: 60px; background-image: url('{{asset("frontEnd/assets/images/color-bg3.png")}}');">
    <div class="container">
           <div class="container">


        <div class="section-heading" >
    <h3 style=" font-size: 32px; color:dodgerblue ">Status</h3>


        <div class="form-title-wrap">
    <div class="step-bar-wrap text-center">


        <ul class="step-bar-list d-flex align-items-center justify-content-around">

            <li class="step-bar flex-grow-1 step-bar-active col-lg-3">

                <span class="icon-element">1</span>
                <p class="pt-2 color-text-2">Booking Submitted</p>
            </li>

            <li class="step-bar flex-grow-1  col-lg-3 " >
                <span class="icon-element"><i  style=" color:blue;" class="las la-cloud-upload-alt"></i></span>
                <p class="pt-2 color-text-2">Applied Universities</p>
            </li>

            <li class="step-bar flex-grow-1 col-lg-3">
                <span class="icon-element"><i   style=" color:blue;"class="las la-file-invoice"></i></span>
                <p class="pt-2 color-text-2">Offer Receipt</p>
            </li>

            <li class="step-bar col-lg-3 ">
                <span class="icon-element"><i   style=" color:blue;"class="las la-plane-departure"></i></span>
                <p class="pt-2 color-text-2">Ready to fly</p>
            </li>

        </ul>

    </div>
    </div>

    </div>

        </div>

    </div>
  </div> --}}

  <section class="col1 wrapped XXsnipcss_extracted_selector_selectionXX pt-5">
    <div class="colblock" style="margin-top: 65px;display: contents;">
      <div data-module="Onboarding:OnboardingBar" class="Module StudyPortals_Shared_Modules_Onboarding_OnboardingBar_OnboardingBar">
        <section id="OnboardingBar">
          <ul class="OnboardingList pl-2" id="ulid">
            <li class="OnboardingItem Explore liclss">
              <div class="OnboardingBullet">
                <i class="OnboardingIcon" style="color: #fdac10">
                    <i class="las la-check-circle"  style="color:  #ff7300; font-size:xxx-large;"></i>
                </i>
              </div>
              <div class="OnboardingText">
                <p>
                  <span class="ItemHeader">
                    Book a Consultant
                  </span>
                  Search for courses and universities from all over the world and book verified consultants for Free.
                </p>
              </div>
            </li>
            <li class="OnboardingItem Compare liclss">
              <div class="OnboardingBullet">
                <i class="OnboardingIcon" style="color: #fdac10">
                    <i class="las la-university" style="color:  #ff7300; font-size:xxx-large;" ></i>
                </i>
              </div>
              <div class="OnboardingText">
                <p>
                  <span class="ItemHeader">
                    Apply in Universities
                  </span>
                  Get admitted to your dream course in your preferred university and also get scholarships.
                </p>
              </div>
            </li>
            <li class="OnboardingItem Decide " liclss>
              <div class="OnboardingBullet">
                <i class="OnboardingIcon" style="color: #fdac10">
                    <i class="las la-receipt"  style="color:  #ff7300; font-size:xxx-large;"></i>
                </i>
              </div>
              <div class="OnboardingText">
                <p>
                  <span class="ItemHeader">
                    Accept your offer
                  </span>
                  Get your visa and other formalities completed.
                                </p>
              </div>
            </li>
            <li class="OnboardingItem Apply" liclss>
              <div class="OnboardingBullet">
                <i class="OnboardingIcon " style="color: #fdac10">
                    <i class="las la-plane-departure"  style="color:  #ff7300; font-size:xxx-large;"></i>
                </i>
              </div>
              <div class="OnboardingText">
                <p>
                  <span class="ItemHeader">
                   Ready to Fly
                  </span>
                  Pack your bags and Welcome to your Dream University.
                </p>
              </div>
            </li>
          </ul>
        </section>
      </div>
    </div>
  </section>

{{-- ###################ADVERTISEMENT start --}}

<section class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="testimonial-carousel-ad  carousel-action" data-interval="100" >
    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d'); $advertisement=App\Models\Advertisement::where('status',1)->where('type',1)->where('expire_date','>',$mytime)->get(); ?>
    @foreach($advertisement as $advertise)
                    <div class="col-lg-12">
                   <div>
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
                   </div>
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
{{-- ########################ADVERTISEMENT END  --}}



<?php $universities = App\Models\User::where('status',1)->get();
?>
    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>

{{-- discipline start --}}

<section class="service-area section--padding text-center">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="section-heading text-center">
    <h2 class="sec__title">Browse by Discipline</h2>
    </div><!-- end section-heading -->
    </div><!-- end col-lg-12 -->
    </div><!-- end row -->
    <?php $categories = App\Models\Category::where('status',1)->get() ?>
    @if($categories->count() > 0)
    <div class="row padding-top-80px" style="
    justify-content: center;
    ">

    @foreach($categories as $category)
    @if($category->parent_id == null)
    {{-- @if($category->status == 1) --}}
    <form action="{{route('university_fetch.coursewise')}}" method="POST" >
        @csrf
    <input type="hidden" name="category" value="{{$category->id ?? ''}}">
    <button type="submit" style="border: none">
    <div class="card text-center customhover browsedicipline diciplineblock" style="">
    <div class="card-body customhover dicipline" style=";height: 174px; margin: auto;">
    <h5 class="card-title">
    @if(isset($category->banner) && file_exists($category->banner))
    <img class="dicipline" style="width: 86px;" src="{{asset($category->banner )}}" alt="">
    @else
    <img src="
    {{asset('frontEnd/assets/images/first_aid.png')}}" width="84px" >
    @endif
    </h5>
    <p class="card-text fontdicipline"><a style="color: black;" href="#" value="{{$category->id ?? ''}}">{{$category->title ?? ''}}</a></p>
    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
    </div>
    </button>
    </form>
    {{-- @endif --}}
    @endif
    @endforeach
    </div><!-- end row -->

    @else
    <div>
    <h4 style="margin-top: 50px;">Discipline Unavailable</h4>
    </div>
    @endif
    </div><!-- end container -->
</section>

  {{-- discipline end --}}

<section class="round-trip-flight section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-heading text-center">
<h2 class="sec__title line-height-55">Browse by Destinations</h2>
</div><!-- end section-heading -->
</div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row padding-top-50px">
<div class="col-lg-12">
<div class="flight-filter-tab text-center">
<div class="section-tab section-tab-3">
   <ul class="nav nav-tabs justify-content-center" id="myTab4" role="tablist">
       <li class="nav-item">
           <a class="nav-link active" id="new-york-tab" data-toggle="tab" href="#new-york" role="tab" aria-controls="new-york" aria-selected="false">
               United States
           </a>
       </li>
       <li class="nav-item">
           <a class="nav-link" id="hong-kong-tab" data-toggle="tab" href="#hong-kong" role="tab" aria-controls="hong-kong" aria-selected="false">
             United Kingdom
           </a>
       </li>
       <li class="nav-item">
           <a class="nav-link" id="beijing-tab" data-toggle="tab" href="#beijing" role="tab" aria-controls="beijing" aria-selected="false">
            Australia
           </a>
       </li>
       <li class="nav-item">
           <a class="nav-link" id="tokyo-tab" data-toggle="tab" href="#tokyo" role="tab" aria-controls="tokyo" aria-selected="false">
               Canada
           </a>
       </li>
       <li class="nav-item">
           <a class="nav-link" id="seoul-tab" data-toggle="tab" href="#seoul" role="tab" aria-controls="seoul" aria-selected="false">
               Ireland
           </a>
       </li>
   </ul>
</div><!-- end section-tab -->
</div><!-- end flight-filter-tab -->

@if($universities->count()>0)
<div class="popular-round-trip-wrap padding-top-40px">
<div class="tab-content" id="myTabContent4">
    <div class="tab-pane fade show active" id="new-york" role="tabpanel" aria-labelledby="new-york-tab">
        <div class="row">
            <?php $usa = App\Models\User::where('countries_id',223)->where('status',1)->orderBy('rating', 'DESC')->limit(6)->get();?>
            @if($usa->count()> 0)
            {{-- {{dd($usa)}} --}}
            @foreach($usa as $us)
            @if($us->isUniversity())
            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img" style="text-align: center; height:185px;">
                    <a href="{{route('university_detail',['id'=>$us->id])}}" class="d-block">
                        {{-- @php
                        print_r($university->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($aus->profile_image)}}" alt="university-img" > --}}
                            @if(isset($us->university->cover_image) && file_exists($us->university->cover_image))
                            <img
                              {{-- style=" width: 368px;
                            height: 245px;"  --}}
                            src="{{asset($us->university->cover_image)}}" height="185px;"alt="">
                                @else
                                <img
                                  {{-- style=" width: 368px;
                                height: 245px;"  --}}
                                src="{{asset('frontEnd/assets/images/university.jpg')}}" height="185px;">
                                @endif
                        </a>
                        <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($us->profile_image) && file_exists($us->profile_image))
                            <img
                            style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                            src="{{asset($us->profile_image)}}" alt="">
                                @else
                                <img style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                @endif</div>
                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                @if($us->Premium_expire_date > $mytime)<span style="
                                background-color: #073975;
                            " class="badge">Premium</span> @endif

                    </div>
                    <div class="card-body">


                        <h3 class="card-title" title="{{$us->university->university_name ?? ''}}" style="
                        white-space: nowrap;
                        overflow: hidden;
                    "><a href="{{route('university_detail',['id'=>$us->id])}}">
                                @if(isset($us->university->university_name)){{$us->university->university_name ?? ''}}@else N/A @endif</a>
                                @if($us->is_verified == 1)
                                    <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>
                               @endif
                                </h3>
                        <p class="card-meta">
                            @if(isset($us->university->type))
                             @if($us->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif

                        <div class="card-rating">
                            <div class="d-flex flex-wrap align-items-center">
                                <p class="mr-2" style="margin:0px;">Rating:</p>

                                    <span>@if($us->rating == 3 ?? '' )
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                                <i class="la la-star-o"></i>
                                            </span>
                                    @elseif($us->rating == 4)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($us->rating == 5)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                    </span>
                                    @elseif($us->rating == 1)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($us->rating == 2)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @endif</span>{!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($us->rating == null)- @else{{$us->rating ?? ''}}/5 @endif</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-attributes">
                            <p>
                                <span class="price__text">Average Fees :</span>
                                <span class="price__num">@if(isset($us->university->average_fees )){{ Config::get('define.currency.currency') }}{{$us->university->average_fees ?? ''}}@else N/A @endif</span>
                                {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                            </p>
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established "><i class="las la-history"></i><span>   @if(isset($us->university->established_at))
                                    {{$us->university->established_at}}
                                    @else N/A @endif</span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="InTakes:{{$us->university->in_takes ?? ''}}"><i class="las la-calendar-day"></i><span>@if(isset($us->university->in_takes)){{$result = count(explode(',',$us->university->in_takes))}} @else N/A @endif</span></li>


                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="IELTS Rating : {{$us->university->iltes}}/10"><i class="las la-clipboard-list"></i><span>   @if(isset($us->university->iltes))
                                        {{$us->university->iltes}}/10
                                        @else -/10 @endif</span></li>
            </ul>
                        </div>

                        <div class="card-price d-flex align-items-center justify-content-between">
                            @if(auth()->user())
                           <a href="{{asset($us->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload" style="
                                height: 38px;
                                padding-top: 9px;
                            ">Brochure</a>
                            @else
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#loginPopupForm" class="buttonDownload" style="
                                height: 38px;
                                padding-top: 9px;
                            ">Brochure</a>
                            @endif



                            <a href="{{route('university_detail',['id'=>$us->id])}}"  class="theme-btn theme-btn-small mt-2">Apply<i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
                <img src="{{asset('frontEnd/assets/images/noresult.gif')}}">
                   </div>
@endif

        </div>
    </div><!-- end tab-pane -->
    <div class="tab-pane fade" id="hong-kong" role="tabpanel" aria-labelledby="hong-kong-tab">
        <div class="row">
            <?php $uka = App\Models\User::where('countries_id',222)->where('status',1)->orderBy('rating', 'DESC')->limit(6)->get();?>
            {{-- {{dd($usa)}} --}}
            @if($uka->count()> 0)
            @foreach($uka as $uk)
            @if($uk->isUniversity())
            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img" style="text-align: center; height:185px;">
                    <a href="{{route('university_detail',['id'=>$uk->id])}}" class="d-block">
                        {{-- @php
                        print_r($uk->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($uk->profile_image)}}" alt="university-img" > --}}
                            @if(isset($uk->university->cover_image) && file_exists($uk->university->cover_image))
                            <img
                              {{-- style=" width: 368px;
                            height: 245px;"  --}}
                            src="{{asset($uk->university->cover_image)}}" height="185px;"alt="">
                                @else
                                <img
                                  {{-- style=" width: 368px;
                                height: 245px;"  --}}
                                src="{{asset('frontEnd/assets/images/university.jpg')}}" height="185px;">
                                @endif
                        </a>
                        <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($uk->profile_image) && file_exists($uk->profile_image))
                            <img
                            style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                            src="{{asset($uk->profile_image)}}" alt="">
                                @else
                                <img style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                @endif</div>
                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                @if($uk->Premium_expire_date > $mytime)<span style="
                                background-color: #073975;
                            " class="badge">Premium</span> @endif

                    </div>
                    <div class="card-body">


                                <h3 class="card-title"  title="{{$uk->university->university_name ?? ''}}" style="
                                    white-space: nowrap;
                                    overflow: hidden;"><a href="{{route('university_detail',['id'=>$uk->id])}}">
                                @if(isset($uk->university->university_name)){{    $uk->university->university_name ?? ''}}@else N/A @endif</a>
                                @if($uk->is_verified == 1)
                                <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>

                                @endif
                                </h3>

                        <p class="card-meta">
                            @if(isset($uk->university->type))
                             @if($uk->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif
                        <div class="card-rating">
                            <div class="d-flex flex-wrap align-items-center pt-2">
                                <p class="mr-2" style="margin:0px;">Rating:</p>


                                    <span>@if($uk->rating == 3 ?? '' )
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                                <i class="la la-star-o"></i>
                                            </span>
                                    @elseif($uk->rating == 4 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($uk->rating == 5 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                    </span>
                                    @elseif($uk->rating == 1 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($uk->rating == 2 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @endif</span>{!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($uk->rating == null)- @else{{$uk->rating ?? ''}}/5 @endif</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-attributes">
                            <p>
                                <span class="price__text">Average Fees :</span>
                                <span class="price__num">@if(isset($uk->university->average_fees )){{ Config::get('define.currency.currency') }}{{$uk->university->average_fees ?? ''}}@else N/A @endif</span>
                                {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                            </p>
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established "><i class="las la-history"></i><span>   @if(isset($uk->university->established_at))
                                    {{$uk->university->established_at}}
                                    @else N/A @endif</span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="InTakes:{{$uk->university->in_takes ?? ''}}"><i class="las la-calendar-day"></i><span>@if(isset($uk->university->in_takes)){{$result = count(explode(',',$uk->university->in_takes))}} @else N/A @endif</span></li>


                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="IELTS Rating : {{$uk->university->iltes}}/10"><i class="las la-clipboard-list"></i><span>   @if(isset($uk->university->iltes))
                                        {{$uk->university->iltes}}/10
                                        @else -/10 @endif</span></li>
            </ul>
                        </div>

                        <div class="card-price d-flex align-items-center justify-content-between">
                            @if(auth()->user())
                            <a href="{{asset($uk->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @else
                             <a href="javascript:void(0)" data-toggle="modal" data-target="#loginPopupForm" class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @endif


                            <a href="{{route('university_detail',['id'=>$uk->id])}}"  class="theme-btn theme-btn-small mt-2">Apply<i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
                <img src="{{asset('frontEnd/assets/images/noresult.gif')}}">
                   </div>
@endif

        </div>
    </div><!-- end tab-pane -->
    <div class="tab-pane fade" id="seoul" role="tabpanel" aria-labelledby="seoul-tab">
        <div class="row">
            <?php $irel = App\Models\User::where('countries_id',103)->where('status',1)->orderBy('rating', 'DESC')->limit(6)->get();?>
            {{-- {{dd($usa)}} --}}
            @if($irel->count()> 0)

            @foreach($irel as $ire)
            @if($ire->isUniversity())
            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img" style="text-align: center; height:185px;">
                    <a href="{{route('university_detail',['id'=>$ire->id])}}" class="d-block">
                        {{-- @php
                        print_r($ire->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($ire->profile_image)}}" alt="university-img" > --}}
                            @if(isset($ire->university->cover_image) && file_exists($ire->university->cover_image))
                            <img
                              {{-- style=" width: 368px;
                            height: 245px;"  --}}
                            src="{{asset($ire->university->cover_image)}}" height="185px;"alt="">
                                @else
                                <img
                                  {{-- style=" width: 368px;
                                height: 245px;"  --}}
                                src="{{asset('frontEnd/assets/images/university.jpg')}}" height="185px;">
                                @endif
                        </a>
                        <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($ire->profile_image) && file_exists($ire->profile_image))
                            <img
                            style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                            src="{{asset($ire->profile_image)}}" alt="">
                                @else
                                <img style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                @endif</div>
                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                @if($ire->Premium_expire_date > $mytime)<span style="
                                background-color: #073975;
                            " class="badge">Premium</span> @endif

                    </div>
                    <div class="card-body">

                       <h3 class="card-title" title="{{$ire->university->university_name ?? ''}}" style="
                        white-space: nowrap;
                        overflow: hidden;"><a href="{{route('university_detail',['id'=>$ire->id])}}">
                                @if(isset($ire->university->university_name)){{  $ire->university->university_name ?? ''}} @else N/A @endif</a>

                                @if($ire->is_verified == 1)
                                    <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>

                               @endif

                                </h3>
                        <p class="card-meta">
                            @if(isset($ire->university->type))
                             @if($ire->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif

                        <div class="card-rating">
                            <div class="d-flex flex-wrap align-items-center pt-2">
                                <p class="mr-2" style="margin:0px;">Rating:</p>

                                    <span>@if($ire->rating == 3 ?? '' )
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                                <i class="la la-star-o"></i>
                                            </span>
                                    @elseif($ire->rating == 4 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($ire->rating == 5 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                    </span>
                                    @elseif($ire->rating == 1 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($ire->rating == 2 ?? '')
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @endif</span>{!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($ire->rating == null)- @else{{$ire->rating ?? ''}}/5 @endif</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-attributes">
                            <p>
                                <span class="price__text">Average Fees :</span>
                                <span class="price__num">@if(isset($ire->university->average_fees )){{ Config::get('define.currency.currency') }}{{$ire->university->average_fees ?? ''}} @else N/A @endif</span>
                                {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                            </p>
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established "><i class="las la-history"></i><span>   @if(isset($ire->university->established_at))
                                    {{$ire->university->established_at}}
                                    @else N/A @endif</span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="InTakes:{{$ire->university->in_takes ?? ''}}"><i class="las la-calendar-day"></i><span>@if(isset($ire->university->in_takes)){{$result = count(explode(',',$ire->university->in_takes))}} @else N/A @endif</span></li>


                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="IELTS Rating : {{$ire->university->iltes}}/10"><i class="las la-clipboard-list"></i><span>   @if(isset($ire->university->iltes))
                                        {{$ire->university->iltes}}/10
                                        @else -/10 @endif</span></li>
            </ul>
                        </div>

                        <div class="card-price d-flex align-items-center justify-content-between">
                            @if(auth()->user())
                            <a href="{{asset($ire->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @else
                             <a href="javascript:void(0)" data-toggle="modal" data-target="#loginPopupForm" class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @endif



                            <a href="{{route('university_detail',['id'=>$ire->id])}}"  class="theme-btn theme-btn-small mt-2">Apply<i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
                <img src="{{asset('frontEnd/assets/images/noresult.gif')}}">
                   </div>
@endif

        </div>
    </div><!-- end tab-pane -->
    <div class="tab-pane fade" id="tokyo" role="tabpanel" aria-labelledby="tokyo-tab">
        <div class="row">
            <?php $cana = App\Models\User::where('countries_id',38)->where('status',1)->orderBy('rating', 'DESC')->limit(6)->get();?>
            {{-- {{dd($usa)}} --}}
            @if($cana->count()> 0)
            @foreach($cana as $can)
            @if($can->isUniversity())
            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img" style="text-align: center; height:185px;">
                    <a href="{{route('university_detail',['id'=>$can->id])}}" class="d-block">
                        {{-- @php
                        print_r($can->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($can->profile_image)}}" alt="university-img" > --}}
                            @if(isset($can->university->cover_image) && file_exists($can->university->cover_image))
                            <img
                              {{-- style=" width: 368px;
                            height: 245px;"  --}}
                            src="{{asset($can->university->cover_image)}}" height="185px;"alt="">
                                @else
                                <img
                                  {{-- style=" width: 368px;
                                height: 245px;"  --}}
                                src="{{asset('frontEnd/assets/images/university.jpg')}}" height="185px;">
                                @endif
                        </a>
                        <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($can->profile_image) && file_exists($can->profile_image))
                            <img
                            style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                            src="{{asset($can->profile_image)}}" alt="">
                                @else
                                <img style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                @endif</div>
                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                @if($can->Premium_expire_date > $mytime)<span style="
                                background-color: #073975;
                            " class="badge">Premium</span> @endif

                    </div>
                    <div class="card-body">

                                <h3 class="card-title" title="{{$can->university->university_name ?? ''}}" style="
                                    white-space: nowrap;
                                    overflow: hidden;"><a href="{{route('university_detail',['id'=>$can->id])}}">
                                @if(isset($can->university->university_name))  {{$can->university->university_name ?? ''}} @else N/A @endif</a>

                                @if($can->is_verified == 1)
                                <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>

                           @endif

                                </h3>
                        <p class="card-meta">
                            @if(isset($can->university->type))
                             @if($can->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif

                        <div class="card-rating">
                            <div class="d-flex flex-wrap align-items-center pt-2">
                                <p class="mr-2" style="margin:0px;">Rating:</p>

                                    <span>@if($can->rating == 3 ?? '' )
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                                <i class="la la-star-o"></i>
                                            </span>
                                    @elseif($can->rating == 4)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($can->rating == 5)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                    </span>
                                    @elseif($can->rating == 1)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($can->rating == 2)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @endif</span>{!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($can->rating == null)- @else{{$can->rating ?? ''}}/5 @endif</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-attributes">
                            <p>
                                <span class="price__text">Average Fees :</span>
                                <span class="price__num">@if(isset($can->university->average_fees )){{ Config::get('define.currency.currency') }}{{$can->university->average_fees ?? ''}} @else N/A @endif</span>
                                {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                            </p>
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established "><i class="las la-history"></i><span>   @if(isset($can->university->established_at))
                                    {{$can->university->established_at}}
                                    @else N/A @endif</span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="InTakes:{{$can->university->in_takes ?? ''}}"><i class="las la-calendar-day"></i><span>@if(isset($can->university->in_takes)){{$result = count(explode(',',$can->university->in_takes))}} @else N/A @endif</span></li>


                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="IELTS Rating : {{$can->university->iltes}}/10"><i class="las la-clipboard-list"></i><span>   @if(isset($can->university->iltes))
                                        {{$can->university->iltes}}/10
                                        @else -/10 @endif</span></li>
            </ul>
                        </div>

                        <div class="card-price d-flex align-items-center justify-content-between">
                            @if(auth()->user())
                            <a href="{{asset($can->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @else
                             <a href="javascript:void(0)" data-toggle="modal" data-target="#loginPopupForm" class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @endif



                            <a href="{{route('university_detail',['id'=>$can->id])}}"  class="theme-btn theme-btn-small mt-2">Apply<i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
                <img src="{{asset('frontEnd/assets/images/noresult.gif')}}">
                   </div>
@endif
        </div>
    </div><!-- end tab-pane -->
    <div class="tab-pane fade" id="beijing" role="tabpanel" aria-labelledby="beijing-tab">
        <div class="row">
            <?php $aust = App\Models\User::where('countries_id',13)->where('status',1)->orderBy('rating', 'DESC')->limit(6)->get();?>
            {{-- {{dd($usa)}} --}}
            @if($aust->count()> 0)

            @foreach($aust as $aus)
            @if($aus->isUniversity())
            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img" style="text-align: center; height:185px;">
                    <a href="{{route('university_detail',['id'=>$aus->id])}}" class="d-block">
                        {{-- @php
                        print_r($aus->user->profile_image);
                    @endphp --}}
                            {{-- <img src="{{asset($aus->profile_image)}}" alt="university-img" > --}}
                            @if(isset($aus->university->cover_image) && file_exists($aus->university->cover_image))
                            <img
                              {{-- style=" width: 368px;
                            height: 245px;"  --}}
                            src="{{asset($aus->university->cover_image)}}" height="185px;"alt="">
                                @else
                                <img
                                  {{-- style=" width: 368px;
                                height: 245px;"  --}}
                                src="{{asset('frontEnd/assets/images/university.jpg')}}" height="185px;">
                                @endif
                        </a>
                        <div style="position: absolute;bottom: 8px;left: 16px;" >@if(isset($aus->profile_image) && file_exists($aus->profile_image))
                            <img
                            style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;"
                            src="{{asset($aus->profile_image)}}" alt="">
                                @else
                                <img style="width: 106px;height: 98px;border-radius: 50%;border-image-width: 151px;border-style: solid;border-color: white;border-width: thick;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                @endif</div>
                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                @if($aus->Premium_expire_date > $mytime)<span style="
                                background-color: #073975;
                            " class="badge">Premium</span> @endif

                    </div>
                    <div class="card-body">




                                <h3 class="card-title" title="{{$aus->university->university_name ?? ''}}" style="
                                    white-space: nowrap;
                                    overflow: hidden;">
                                <a href="{{route('university_detail',['id'=>$aus->id])}}">
                                @if(isset($aus->university->university_name)){{  $aus->university->university_name ?? ''}} @else N/A @endif</a>

                                @if($aus->is_verified == 1)
                                <span style="background: #2dd12d;float:right;border-radius: 12px;padding: 6px;     color: white;" class="badge">Verified</span>
                                @endif

                                </h3>
                        <p class="card-meta">
                            @if(isset($aus->university->type))
                             @if($aus->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif

                        <div class="card-rating">
                            <div class="d-flex flex-wrap align-items-center pt-2">
                                <p class="mr-2" style="margin:0px;">Rating:</p>

                                    <span>@if($aus->rating == 3 ?? '' )
                                            <span class="ratings ">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star-o"></i>
                                                <i class="la la-star-o"></i>
                                            </span>
                                    @elseif($aus->rating == 4)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($aus->rating == 5)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                    </span>
                                    @elseif($aus->rating == 1)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @elseif($aus->rating == 2)
                                    <span class="ratings ">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                    </span>
                                    @endif</span>{!!"&nbsp;"!!}<span class="badge badge-warning text-white font-size-16">@if($aus->rating == null)- @else{{$aus->rating ?? ''}}/5 @endif</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-attributes">
                            <p>
                                <span class="price__text">Average Fees :</span>
                                <span class="price__num">@if(isset($aus->university->average_fees )){{ Config::get('define.currency.currency') }}{{$aus->university->average_fees ?? ''}} @else N/A @endif</span>
                                {{-- <span class="price__num before-price color-text-3">$120.00</span> --}}
                            </p>
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Established "><i class="las la-history"></i><span>   @if(isset($aus->university->established_at))
                                    {{$aus->university->established_at}}
                                    @else N/A @endif</span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="InTakes:{{$aus->university->in_takes ?? ''}}"><i class="las la-calendar-day"></i><span>@if(isset($aus->university->in_takes)){{$result = count(explode(',',$aus->university->in_takes))}} @else N/A @endif</span></li>


                                    <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="IELTS Rating : {{$aus->university->iltes}}/10"><i class="las la-clipboard-list"></i><span>   @if(isset($aus->university->iltes))
                                        {{$aus->university->iltes}}/10
                                        @else -/10 @endif</span></li>
            </ul>
                        </div>

                        <div class="card-price d-flex align-items-center justify-content-between">
                            @if(auth()->user())
                            <a href="{{asset($aus->university->brochure ?? '')}}" data-toggle="tooltip" data-placement="top"  title="Download Brochure" target="_blank" download class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @else
                             <a href="javascript:void(0)" data-toggle="modal" data-target="#loginPopupForm" class="buttonDownload" style="
                                 height: 38px;
                                 padding-top: 9px;
                             ">Brochure</a>
                             @endif


                            <a href="{{route('university_detail',['id'=>$aus->id])}}"  class="theme-btn theme-btn-small mt-2">Apply<i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endif
            @endforeach
            @else
            <div class="container" style="text-align: center;">
                <img src="{{asset('frontEnd/assets/images/noresult.gif')}}">
                   </div>
@endif
        </div>
    </div><!-- end tab-pane -->
</div><!-- end tab-content -->

@else
<h2 class="mt-5" style="text-align: center"> No Data Available</h2>

@endif
</div>
</div><!-- end col-lg-12 -->
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end round-trip-flight -->
<!-- ================================
END ROUND-TRIP AREA
================================= -->




<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="section-heading ">

                    <h4>Featured University <span style="
                        float: right;
                    "><a  href="{{route('university_all')}}" class="theme-btn theme-btn-small mt-2">View all</a></span></h4>
                    <hr>

                    <?php $universities = App\Models\User::where('status',1)->get();
                    ?>
                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>

                   @if($universities->count()>0)

                    <div class="testimonial-carousel carousel-action">
                        @foreach($universities as $key => $university)
                        {{-- {{dd($university)}} --}}
                        @if($university->isUniversity())
                        @if($university->Premium_expire_date >$mytime)
                        <div class="testimonial-card  .btn-img .btn-img-combo">

                            <div class="author-content d-flex align-items-center">
                                <div class="author-img">
                                    {{-- @php
                                        print_r($consultant->user);
                                    @endphp --}}
                                   <a href="{{route('university_detail',['id'=>$university->id])}}">
                                    @if(isset($university->profile_image) && file_exists($university->profile_image))
                                    <img  src="{{asset($university->profile_image)}}" alt="" class="d-block w-100">
                                        @else
                                        <img  src="{{asset('frontEnd/assets/images/university.jpg')}} " class="d-block w-100">
                                        @endif</a>
                                </div>
                                <div class="author-bio">
                                    <a href="{{route('university_detail',['id'=>$university->id])}}"><h4 class="author__title">{{$university->university->university_name  ?? ''}}        @if($university->is_verified == 1)
                                        <span data-toggle="tooltip"  data-url=""  data-title="Verified" style="background: #2dd12d;border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-certificate"></i></span>
                                    @endif</h4></a>
                                    {{-- <span class="author__meta">{{$university->userUniversity->type ?? ''}}</span> --}}
                                    <span class="ratings d-flex align-items-center">
                                        @if($university->rating == 3 ?? '' )

                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>

                                                @elseif($university->rating == 4 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>

                                                @elseif($university->rating == 5 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>

                                                @elseif($university->rating == 1 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                </span>
                                                @elseif($university->rating == 2 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>

                                                @endif


                                    </span>
                                </div>
                            </div>
                            <div class="testi-desc-box">
                                <?php
                                $myvalue =$university->university->about_me ?? '';
                                if (strlen($myvalue) > 140)
                                    {
                                        $myvalue = substr($myvalue, 0, 140);
                                        $myvalue = explode(' ', $myvalue);
                                        array_pop($myvalue); // remove last word from array
                                        $myvalue = implode(' ', $myvalue);
                                        // $myvalue = $myvalue . ' ...';
                                    } ?>
                                <p class="testi__desc">@if(isset($university->university->about_me)) <?php echo ($myvalue . '...')?> @else N/A @endif</p>



                                <span class="price__text"><b>Average Fees :</b></span>
                                <span class="price__num">@if(isset($university->university->average_fees)) {{ Config::get('define.currency.currency') }}{{$university->university->average_fees ?? ''}}@else N/A @endif</span>

                                <a  style="
                                float: right;
                            " class="theme-btn theme-btn-small mt-2" href="{{route('university_detail',['id'=>$university->id])}}">Apply<i class="las la-angle-double-right"></i></a>


                            </div>

                        </div><!-- end testimonial-card -->
                        @endif
                        @endif
                        @endforeach


                    </div><!-- end testimonial-carousel -->
@else
<h2 class="mt-5" style="text-align: center"> No Data Available</h2>
@endif


            </div><!-- end col-lg-8 -->
        </div>
            <div class="col-lg-12">
                <div class="section-heading "  style="
                margin-top: 27px;
            ">

                    <h4> Featured Consultants</h4>
                    <hr>
                    <?php $consultanttime=Carbon\Carbon::now()->format('Y-m-d');?>

                    <?php $consultants = App\Models\User::where('status',1)->get();
                    ?>
                    @if($consultants->count()>0)
                    <div class="testimonial-carousel carousel-action">
                        @foreach($consultants as $consultant)
                        @if($consultant->isConsultant())
                        @if($consultant->Premium_expire_date >$consultanttime)

                        <div class="testimonial-card">

                            <div class="author-content d-flex align-items-center">
                                <div class="author-img">
                                    {{-- @php
                                        print_r($consultant->user);
                                    @endphp --}}
                                   <a href="{{route('consultant_detail',['id' => $consultant->id])}}">
                                    @if(isset($consultant->profile_image) && file_exists($consultant->profile_image))
                                    <img src="{{ asset($consultant->profile_image ) }}" alt="testimonial image">
                                        @else
                                        <img style="" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                        @endif </a>
                                </div>
                                <div class="author-bio">
                                    <a href="{{route('consultant_detail',['id' => $consultant->id ?? ''])}}"><h4 class="author__title">{{$consultant->first_name ?? ''}}{{$consultant->last_name ?? ''}}   @if($consultant->is_verified == 1)
                                        <span data-toggle="tooltip"  data-url=""  data-title="Verified" style="background: #2dd12d;border-radius: 12px;padding: 6px;     color: white;" class="badge"><i class="las la-certificate"></i></span>
                                    @endif</h4></a>
                                    {{-- <span class="author__meta">{{$consultant->last_name}}</span> --}}
                                    <span class="ratings d-flex align-items-center">
                                        @if($consultant->rating == 3 ?? '' )

                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>

                                                @elseif($consultant->rating == 4 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>

                                                @elseif($consultant->rating == 5 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>

                                                @elseif($consultant->rating == 1 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>

                                                @elseif($consultant->rating == 2 ?? '' )

                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>
                                                    <i class="la la-star-o"></i>

                                                @endif


                                    </span>
                                </div>
                            </div>
                            <div class="testi-desc-box">
                                <?php
                                $myvalue =$consultant->consultant->about_me ?? '';
                                if (strlen($myvalue) > 140)
                                    {
                                        $myvalue = substr($myvalue, 0, 140);
                                        $myvalue = explode(' ', $myvalue);
                                        array_pop($myvalue); // remove last word from array
                                        $myvalue = implode(' ', $myvalue);
                                        // $myvalue = $myvalue . ' ...';
                                    } ?>
                                <p class="testi__desc"> @if(isset($consultant->consultant->about_me))<?php echo ($myvalue . '...')?> @else N/A @endif</p>
                                <span class="price__text"><b>City :</b></span>
                                <span class="price__num">{{$consultant->city ?? ''}}</span>
                                <a style="
                                float: right;
                            " class="theme-btn theme-btn-small mt-2" href="{{route('consultant_detail',['id'=>$consultant->id])}}">Details<i class="las la-angle-double-right"></i></a>
                            </div>

                        </div><!-- end testimonial-card -->
                        @endif

                        @endif
                        @endforeach
                    </div><!-- end testimonial-carousel -->
@else
<h2 class="mt-5" style="text-align: center"> No Data Available</h2>
@endif


            </div><!-- end col-lg-8 -->
        </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonial-area -->

                    {{-- works start --}}

     <section class="testimonial-area section-padding">
      <div class="container">
        <div class="section-heading text-center" >
            <h2> How it works</h2>
            <hr>
        {{-- <div class="row">

            <div class="col-lg-6">
                <lottie-player src="{{asset('frontEnd/assets/json/book_loti.json')}}"  background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop  autoplay></lottie-player>


                <!-- end section-heading -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-6 ">


                    <div class="embed-responsive embed-responsive-4by3" style="height: 416px;">
                        <iframe width="420" height="315"
                        src="https://www.youtube.com/embed/IsobKug-8bc">
                        </iframe>
                    </div>
                    <!-- end testimonial-carousel -->
            </div><!-- end col-lg-8 -->
        </div> --}}
        <div class="container" style="
    padding-right: 10px;
    padding-left: 10px;
">

            <div class="row padding-top-50px">
                <div class="col-lg-3 milestonewidth"style="padding-left: 0.9765625vw;padding-right: 0.9765625vw;">
                    <div class="deal-list">
                    <div class="d-flex align-items-center justify-content-between mb-3">

                    </div>
                        <lottie-player src="{{asset('frontEnd/assets/json/lf30_editor_cum0oz6f.json')}}"  background="transparent"  speed="1"  style="width: 100%; height: 23.14814814814815vh; margin: auto;"  loop  autoplay></lottie-player>
                       <h3 style="text-align: center">Hire Nearby Consultant</h3>
                    </div>
                </div><!-- end col-lg-3 -->
                 <div class="col-lg-3 milestonewidth" style="padding-left: 0.9765625vw;padding-right: 0.9765625vw;">
                    <div class="deal-list">
                        <div class="d-flex align-items-center justify-content-between mb-3">

                        </div>

                        <lottie-player src="{{asset('frontEnd/assets/json/30304-back-to-school.json')}}"  background="transparent"  speed="1"  style="width: 100%; height: 23.14814814814815vh;margin: auto; "  loop  autoplay></lottie-player>
                        <h3 style="text-align: center">Choose University</h3>
                    </div>
                </div><!-- end col-lg-3 -->


                 <div class="col-lg-3 milestonewidth" style="padding-left: 0.9765625vw;padding-right: 0.9765625vw;">
                    <div class="deal-list">
                        <div class="d-flex align-items-center justify-content-between mb-3">

                        </div>

                        <lottie-player src="{{asset('frontEnd/assets/json/27490-documentscan.json')}}"  background="transparent"  speed="1"  style="width: 100%; height: 23.14814814814815vh;margin: auto;"  loop  autoplay></lottie-player>
                        <h3 style="text-align: center">Verify Documents</h3>

                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 milestonewidth" style="padding-left: 0.9765625vw;padding-right: 0.9765625vw;">
                    <div class="deal-list">
                        <div class="d-flex align-items-center justify-content-between mb-3">

                        </div>
                        <lottie-player src="{{asset('frontEnd/assets/json/lf30_editor_ggnpfgjn.json')}}"  background="transparent"  speed="1"  style="width: 100%; height:23.14814814814815vh;margin: auto;"  loop  autoplay></lottie-player>
                        <h3 style="text-align: center">Get Ready<br> to Fly</h3>
                    </div>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<section class="hide-on-mobile testimonial-area section-padding">
    <div class="container">
      <div class="section-heading text-center" >
          {{-- <h2> How it works</h2>
          <hr> --}}
      <div class="row">

          <div class="col-lg-6">
              <lottie-player src="{{asset('frontEnd/assets/json/book_loti.json')}}"  background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop  autoplay></lottie-player>


              <!-- end section-heading -->
          </div><!-- end col-lg-4 -->
          <div class="col-lg-6 ">


                  <div class="embed-responsive embed-responsive-4by3" style="height: 416px;">
                      <iframe width="420" height="315"
                      src="https://www.youtube.com/embed/IsobKug-8bc">
                      </iframe>
                  </div>
                  <!-- end testimonial-carousel -->
          </div><!-- end col-lg-8 -->
      </div>

      </div><!-- end row -->
  </div><!-- end container -->
</section>
                      {{-- works end --}}

<!--<section class="funfact-area padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Milestone of 10 Years</h2>
                </div>
            </div>
        </div>
        <div class="counter-box counter-box-2 margin-top-60px mb-0">
            <div class="row">

            <?php $users = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'client');
                })->count();
                $university = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'university');
                })->count();
                $consultant = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'consultant');
                })->count();

                ?>

                <div class="col-lg-3 milestonewidth">
                    <div class="counter-item counter-item-layout-2 display-flex">
                        <div class="counter-icon flex-shrink-0 m-auto">
                            <i class="la la-users"></i>
                        </div>
                        <div class="counter-content text-center m-auto">

                                <div class="text-center">
                                    <span class="counter" data-from="0" data-to="{{$users}}"  data-refresh-interval="6">0</span>
                                    <span class="count-symbol">+</span>
                                </div>
                                <p class="counter__title"> Satisfied Students </p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 milestonewidth">
                    <div class="counter-item counter-item-layout-2 display-flex">
                        <div class="counter-icon flex-shrink-0 m-auto">
                            <i class="la la-building"></i>
                        </div>
                        <div class="counter-content text-center m-auto">
                            <div class="text-center">
                                <span class="counter" data-from="0" data-to="{{$university}}"  data-refresh-interval="6">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Universities</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 milestonewidth">
                    <div class="counter-item counter-item-layout-2 display-flex">
                        <div class="counter-icon flex-shrink-0 m-auto">
                            <i class="las la-user-tie"></i>
                        </div>
                        <div class="counter-content text-center m-auto">
                            <div class="text-center">
                                <span class="counter" data-from="0" data-to="{{$consultant}}"  data-refresh-interval="6">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Consultants</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 milestonewidth">
                    <div class="counter-item counter-item-layout-2 display-flex">
                        <div class="counter-icon flex-shrink-0 m-auto">
                            <i class="la la-check-circle"></i>
                        </div>
                        <div class="counter-content text-center m-auto">
                            <?php $bookings = DB::table('bookings')->count(); ?>
                            <div class="text-center">
                                <span class="counter" data-from="0" data-to="{{$bookings}}"  data-refresh-interval="6">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Booking</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->


<section class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="testimonial-carousel-ad carousel-action">
    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d'); $advertisement=App\Models\Advertisement::where('status',1)->where('type',1)->where('expire_date','>',$mytime)->get(); ?>
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
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area padding-top-30px padding-bottom-90px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Latest Blogs & Articles <br> You Might Like</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <?php $blogs=App\Models\Blog::where('status',1)->limit(3)->get()?>
@if($blogs->count() > 0)
            @foreach($blogs as $blog)
            {{-- @if($blog->status == 1) --}}
            <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <a href="{{route('blog_detail', $blog->id ?? '')}}">
                    <div class="card-img">
                        <a href="{{route('blog_detail', $blog->id ?? '')}}">
                            @if(isset($blog->main_image) && file_exists($blog->main_image))
                            <img style="height: auto; width: 100%;" src="{{asset($blog->main_image ?? '')}}" alt="blog-img">
                           @else
                           <img style="height: auto; width: 100%;" src="{{asset('assets/default/default-blog.jpg')}}" alt="blog-img">
                           @endif
                        </a>
                        <div class="post-format icon-element">
                            <a href="{{route('blog_detail', $blog->id ?? '')}}"> <i class="la la-photo"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                {{-- <a href="#" class="badge">{{$blog->title ?? ''}}</a> --}}
                                {{-- <a href="#" class="badge">lifestyle</a> --}}
                            </div>
                            <h3 class="card-title line-height-26"><a href="{{route('blog_detail', $blog->id ?? '')}}">{{$blog->title ?? ''}}</a></h3>
                            <p class="card-meta">
                                <?php
                                    $myvalue =$blog->short_description ?? '';
                                    if (strlen($myvalue) > 140)
                                        {
                                            $myvalue = substr($myvalue, 0, 80);
                                            $myvalue = explode(' ', $myvalue);
                                            array_pop($myvalue); // remove last word from array
                                            $myvalue = implode(' ', $myvalue);
                                            // $myvalue = $myvalue . ' ...';
                                        } ?>
                                {{-- <span class="post__time">Uploaded At</span> --}}
                                {{-- <span class="post-dot"></span> --}}
                                <a href="{{route('blog_detail', $blog->id ?? '')}}"> <span class="post__date">
                                    {{-- @if($arr->count() > 2) --}}
                               <?php echo ($myvalue . '...')?> </span></a>
                            </p>
                        </div>
                    </div>
                </a>

                </div><!-- end card-item -->
            </div>
            {{-- @endif --}}
            @endforeach<!-- end col-lg-4 -->

        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box text-center pt-4">
                    <a href="{{route('blog_all')}}" class="theme-btn">Read More Post</a>
                </div>
            </div>
        </div>
        @else
        <div class="container" style="text-align:center;"> <h2> Currently unavailable</h2></div>
          @endif
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->

<!-- ================================
    START MOBILE AREA
================================= -->
<section class="mobile-app padding-top-100px padding-bottom-50px section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mobile-app-content">
                    <div class="section-heading">
                        <h2 class="sec__title line-height-55">Campus Interest Android and IOS App will be Available Soon!</h2>
                    </div><!-- end section-heading -->
                    <ul class="info-list padding-top-30px">
                        {{-- <li class="d-flex align-items-center mb-3"><span class="la la-check icon-element flex-shrink-0 ml-0"></span> Access and change your itinerary on-the-go</li> --}}
                        <li class="d-flex align-items-center mb-3"><span class="la la-check icon-element flex-shrink-0 ml-0"></span> Free access</li>
                        <li class="d-flex align-items-center mb-3"><span class="la la-check icon-element flex-shrink-0 ml-0"></span> Get real-time  updates</li>
                    </ul>
                    {{-- <div class="btn-box padding-top-30px">
                        <a href="#" class="d-inline-block mr-3">
                            <img src="{{ asset('frontEnd/assets/images/app-store.png') }}" alt="">
                        </a>
                        <a href="#" class="d-inline-block">
                            <img src="{{ asset('frontEnd/assets/images/google-play.png') }}" alt="">
                        </a>
                    </div><!-- end btn-box --> --}}
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="mobile-img">
                    {{-- <img src="{{ asset('frontEnd/assets/images/mobile-app.png') }}" alt="mobile-img"> --}}
                    {{-- <img src="{{ asset('frontEnd/assets/images/contactus.gif') }}" alt="mobile-img"> --}}
                    <lottie-player src="{{asset('frontEnd/assets/json/lf30_editor_vulsjlia.json')}}"  background="transparent"  speed="1"  style="width: 100%;height: auto;"  loop  autoplay></lottie-player>
                </div>
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end mobile-app -->
<!-- ================================
    END MOBILE AREA
================================= -->

<!-- ================================
       START CLIENTLOGO AREA
================================= -->

{{-- <section class="clientlogo-area padding-top-80px padding-bottom-80px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="client-logo">
                    <div class="client-logo-item">
                        <img src="{{ asset('frontEnd/assets/images/client-logo.png') }}" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontEnd/assets/images/client-logo2.png') }}" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontEnd/assets/images/client-logo3.png') }}" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontEnd/assets/images/client-logo4.png') }}" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontEnd/assets/images/client-logo5.png') }}" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ asset('frontEnd/assets/images/client-logo6.png') }}" alt="brand image">
                    </div><!-- end client-logo-item -->
                </div><!-- end client-logo -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end clientlogo-area --> --}}
<!-- ================================
       START CLIENTLOGO AREA
================================= -->

<!-- ================================
       START FOOTER AREA
================================= -->
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
<style>/*--thank you pop starts here--*/

    .la-angle-down:before {

        color: #ff7503;
        font-size: 12px;
    }
        @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2) format('woff2');
    unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFUZ0bbck.woff2) format('woff2');
    unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWZ0bbck.woff2) format('woff2');
    unicode-range:U+1F00-1FFF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVp0bbck.woff2) format('woff2');
    unicode-range:U+0370-03FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWp0bbck.woff2) format('woff2');
    unicode-range:U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFW50bbck.woff2) format('woff2');
    unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVZ0b.woff2) format('woff2');
    unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOX-hpOqc.woff2) format('woff2');
    unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOVuhpOqc.woff2) format('woff2');
    unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXuhpOqc.woff2) format('woff2');
    unicode-range:U+1F00-1FFF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOUehpOqc.woff2) format('woff2');
    unicode-range:U+0370-03FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXehpOqc.woff2) format('woff2');
    unicode-range:U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXOhpOqc.woff2) format('woff2');
    unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOUuhp.woff2) format('woff2');
    unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
    font-family:'icomoon';
    src:url('https://d1azc1qln24ryf.cloudfront.net/26905/Studyportalslineariconset/icomoon.eot?tqtgr7');
    src:url('https://d1azc1qln24ryf.cloudfront.net/26905/Studyportalslineariconset/icomoon.eot?tqtgr7#iefix') format('embedded-opentype'),
        url('https://d1azc1qln24ryf.cloudfront.net/26905/Studyportalslineariconset/icomoon.woff2?tqtgr7') format('woff2'),
        url('https://d1azc1qln24ryf.cloudfront.net/26905/Studyportalslineariconset/icomoon.ttf?tqtgr7') format('truetype'),
        url('https://d1azc1qln24ryf.cloudfront.net/26905/Studyportalslineariconset/icomoon.woff?tqtgr7') format('woff'),
        url('https://d1azc1qln24ryf.cloudfront.net/26905/Studyportalslineariconset/icomoon.svg?tqtgr7#icomoon') format('svg');
    font-weight:normal;
    font-style:normal;
    font-display:block;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2) format('woff2');
    unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFUZ0bbck.woff2) format('woff2');
    unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWZ0bbck.woff2) format('woff2');
    unicode-range:U+1F00-1FFF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVp0bbck.woff2) format('woff2');
    unicode-range:U+0370-03FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWp0bbck.woff2) format('woff2');
    unicode-range:U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFW50bbck.woff2) format('woff2');
    unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:400;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVZ0b.woff2) format('woff2');
    unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOX-hpOqc.woff2) format('woff2');
    unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOVuhpOqc.woff2) format('woff2');
    unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXuhpOqc.woff2) format('woff2');
    unicode-range:U+1F00-1FFF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOUehpOqc.woff2) format('woff2');
    unicode-range:U+0370-03FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXehpOqc.woff2) format('woff2');
    unicode-range:U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXOhpOqc.woff2) format('woff2');
    unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
    font-family:'Open Sans';
    font-style:normal;
    font-weight:700;
    font-display:swap;
    src:url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOUuhp.woff2) format('woff2');
    unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @media (min-width: 1025px){
    body .WhiteBackgroundPane {
        background-color: #fff;
    }
    }

    #galactus {
        position: relative;
        min-width: 320px;
        width: 100%;
        font-size: .9375rem;
        line-height: 1.5rem;
        word-wrap: break-word;
        margin: 0;
        padding: 3.75rem 0 0;
        box-sizing: border-box;
        overflow: hidden;
        overflow-wrap: break-word;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 3.75rem;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    .colblock, a, abbr, acronym, address, applet, article, aside, audio, b, big, blockquote, body, canvas, caption, center, cite, code, dd, del, details, dfn, dl, dt, em, embed, fieldset, figcaption, figure, footer, form, h1, h2, h3, h4, h5, h6, header, html, i, iframe, img, ins, kbd, label, legend, li, mark, menu, nav, object, output, p, pre, q, ruby, s, samp, section, small, span, strike, strong, sub, summary, sup, table, tbody, tfoot, th, thead, time, tt, u, var, video {
        margin: 0;
        padding: 0;
        border: 0;
        vertical-align: baseline;
        line-height: 1.5em;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        border-top-width: 0px;
        border-right-width: 0px;
        border-bottom-width: 0px;
        border-left-width: 0px;
        border-top-style: initial;
        border-right-style: initial;
        border-bottom-style: initial;
        border-left-style: initial;
        border-top-color: initial;
        border-right-color: initial;
        border-bottom-color: initial;
        border-left-color: initial;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
    }

    /* body {
        font-size: 100%;
    }  */

    /* body {
        font-family: Open Sans,Helvetica,Arial,sans-serif;
        -webkit-text-size-adjust: none;
        color: #05293c;
        background-color: #fff;
        text-size-adjust: none;
    }  */




    /* article, aside, details, figcaption, figure, footer, header, menu, nav, section {
        display: block;
    }  */

    #galactus .col1 , #galactus .col2, #galactus .col2-left, #galactus .col2-right, .nav-bar:after  {
        clear: both;
    }

    #galactus .col1 , #galactus .col2, #galactus .col2-left, #galactus .col2-right {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    #galactus .col1.wrapped , #galactus .col2-left.wrapped, #galactus .col2-right.wrapped, #galactus .col2.wrapped {
        max-width: 1220px;
        margin-left: auto!important;
        margin-right: auto!important;
        float: none!important;
    }

    .col1:after , .col2-left:after , .col2-right:after , .col2:after , .nav-bar:after  {
        content: "";
        clear: both;
        display: block;
    }

    .colblock , .colblock , .colblock , .colblock  {
        float: left;
        margin-right: -100%;
        overflow: hidden;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    @media (min-width: 1025px){
    .colblock  {
        float: left;
        margin-left: 1rem!important;
        width: calc(100% - 2rem);
    }
    }

    .colblock:nth-child(n + 1) , .colblock:nth-child(n + 1) , .colblock:nth-child(n + 1) , .colblock:nth-child(n + 1)  {
        margin-left: 0;
        margin-top: 1rem;
        margin-bottom: 1rem;
        clear: both;
    }

    #ulid  {
        list-style-type: square;
    }

    #OnboardingBar .OnboardingList  {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style-type: none;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingList  {
        display: flex;
    }
    }

    #ulid liclss  {
        margin-top: .5rem;
        margin-bottom: .5rem;
    }

    #ulid liclss:first-child  {
        margin-top: 0;
    }

    #OnboardingBar .OnboardingItem  {
        display: flex;
        margin: 0;
        text-align: left;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingItem  {
        display: block;
        flex: 0 1 25%;
        text-align: center;
        flex-grow: 0;
        flex-shrink: 1;
        flex-basis: 25%;
    }
    }

    #ulid liclss:last-child  {
        margin-bottom: 0;
    }

    #OnboardingBar .OnboardingBullet  {
        flex: 0 0 3rem;
        position: relative;
        margin: 0 auto;
        flex-grow: 0;
        flex-shrink: 0;
        flex-basis: 3rem;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingBullet  {
        display: block;
        flex: none;
        width: 100%;
        margin-bottom: .5rem;
        flex-grow: 0;
        flex-shrink: 0;
        flex-basis: auto;
    }
    }

    #OnboardingBar .OnboardingBullet:before  {
        content: "";
        display: block;
        position: absolute;
        top: 3rem;
        bottom: 0;
        left: 1.5rem;
        border-left: 1px dotted #547a92;
        border-left-width: 1px;
        border-left-style: dotted;
        border-left-color: rgb(84, 122, 146);
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingBullet:before  {
        top: 0;
        right: unset;
        left: unset;
        bottom: unset;
        height: 2.5rem;
        width: 100%;
        border-left: 0;
        border-bottom: 1px dotted #547a92;
        border-left-width: 0px;
        border-left-style: initial;
        border-left-color: initial;
        border-bottom-width: 1px;
        border-bottom-style: dotted;
        border-bottom-color: rgb(84, 122, 146);
    }
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingItem:first-child .OnboardingBullet:before  {
        width: 50%;
        left: 50%;
    }
    }

    #OnboardingBar .OnboardingText  {
        font-size: .8125rem;
        line-height: 1rem;
        flex: 1 1 auto;
        position: relative;
        padding: 0 .5rem 0 1rem;
        color: #3f5c6e;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: auto;
        padding-top: 0px;
        padding-right: 0.5rem;
        padding-bottom: 0px;
        padding-left: 1rem;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingText  {
        font-size: .9375rem;
        line-height: 1.5rem;
        display: block;
        flex: none;
        box-sizing: border-box;
        padding: 0 1rem;
        width: 100%;
        height: auto;
        flex-grow: 0;
        flex-shrink: 0;
        flex-basis: auto;
        padding-top: 0px;
        padding-right: 1rem;
        padding-bottom: 0px;
        padding-left: 1rem;
    }
    }

    #OnboardingBar .OnboardingItem:last-child .OnboardingBullet:before  {
        display: none;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingItem:last-child .OnboardingBullet:before  {
        display: block;
        width: 50%;
    }
    }

    [class^="lnr-"] {
        font-family: 'icomoon' !important;
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-variant-ligatures: normal;
        font-variant-caps: normal;
        font-variant-numeric: normal;
        font-variant-east-asian: normal;
    }

    #OnboardingBar .OnboardingBullet .OnboardingIcon  {
        display: block;
        position: relative;
        height: 3rem;
        width: 3rem;
        font-size: 1.5rem;
        line-height: 3rem;
        text-align: center;
        background: #fff;
        border: 1px solid #f95c39;
        border-radius: 50%;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(255, 255, 255);
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: #073975;
        border-right-color: #073975;
        border-bottom-color:#073975;
        border-left-color: #073975;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        border-top-left-radius: 20%;
        border-top-right-radius: 20%;
        border-bottom-right-radius: 20%;
        border-bottom-left-radius: 20%;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingBullet .OnboardingIcon  {
        margin: 0 auto;
        height: 5rem;
        width: 5rem;
        font-size: 2rem;
        line-height: 5rem;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
    }
    }

    .lnr-compass2:before {
        content: "\e780";
    }

    p  {
        margin: 0 0 .75rem;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0.75rem;
        margin-left: 0px;
    }

    #OnboardingBar .OnboardingText p  {
        max-width: 450px;
    }

    .lnr-compare:before {
        content: "\e92e";
    }

    .lnr-archery:before {
        content: "\e870";
    }

    #OnboardingBar .OnboardingText .ItemHeader  {
        font-size: 1.0625rem;
        line-height: 1.5rem;
        font-weight: 600;
        display: block;
        color: #05293c;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingText .ItemHeader  {
        font-size: 1.6875rem;
        line-height: 2.5rem;
    }
    }

    #OnboardingBar .OnboardingBullet .IconImg  {
        position: absolute;
        height: 26px;
        width: 26px;
        top: 50%;
        left: 50%;
        margin-top: -15px;
        margin-left: -15px;
        vertical-align: unset;
    }

    @media (min-width: 1025px){
    #OnboardingBar .OnboardingBullet .IconImg  {
        height: 36px;
        width: 36px;
        margin-top: -20px;
        margin-left: -20px;
    }
    }

    #OnboardingBar .OnboardingBullet #Star1  {
        fill: #fdac10;
        opacity: .4;
        transform-box: fill-box;
        transform-origin: 50% 50%;
        transform: scale(1);
        animation: star1_Animation 3s ease-in infinite;
        animation-duration: 3s;
        animation-timing-function: ease-in;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running;
        animation-name: star1_Animation;
    }

    #OnboardingBar .OnboardingBullet #Star2  {
        fill: #fdac10;
        opacity: .6;
        animation: star2_Animation 3s ease-in infinite;
        animation-duration: 3s;
        animation-timing-function: ease-in;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running;
        animation-name: star2_Animation;
    }

    #OnboardingBar .OnboardingBullet #Star3  {
        fill: #fdac10;
        opacity: 1;
        animation: star3_Animation 3s ease-out infinite;
        animation-duration: 3s;
        animation-timing-function: ease-out;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running;
        animation-name: star3_Animation;
    }


</style>
<style></style>
<style>
    .customhover:hover{
    background-color: #073975;
    color: #edf3f6;
    z-index: 1;
    opacity:0.9;
    }

</style>
<style>
    canvas {

        position: absolute;
        top: 0;
        left: 0;
        background-color: black;
    }
  </style>
  {{-- <style>

        .tabbe {
        float: left;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 30%;
        height: 300px;
        }


        .tabbe button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 10px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        font-size: 17px;
        }

        .tabbe button:hover {
        background-color: #ddd;
        }


        .tabbe button.active {
        background-color: #fff;
        border-left-style: solid;
        border-color: orange;
        }
</style> --}}
@endsection
 @section('per_page_script')

{{-- <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script> --}}
{{-- rt=$('#categoryselect').val(); --}}
<script src="{{ asset('frontEnd/assets/js/three.r119.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/vanta.net.min.js') }}"></script>

<script>
    $(document).on('change', '#categoryselect', function ()
    {
        console.log("clicked")
    categoryselect=$('#categoryselect').val();

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
        $(document).on('change', '#salazar', function ()
        {
        countryId = $(this).val();

        $.ajaxSetup({headers:
        {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
        url:"{{ route('university_fetch_selected.countrywise') }}",
        method:"POST",
        data:{countryId:countryId},
        success: function(result){
            console.log(result)

    $(".tyt").html(result)
        }
        });


        });
</script>

      <script src="https://cdn.plyr.io/3.5.3/plyr.polyfilled.js"></script>

      <script>
          const player = new Plyr('#player');

        //   $(document).on('change', 'input[name="stars"]', function () {
        //       $('#rating').val($(this).val());
        //   })
        //           @if(isset($review))
        //   var rating = "{{$review->rating}}";
        //   $('input[value="' + rating + '"]').prop("checked", true);
        //   $('#rating').val(rating);
        //   @endif
      </script>

<script>
    var linkclick='';
     $(document).on('click', '#click_count', function ()
    {
    linkclick=$(this).attr('link_click');
    console.log(linkclick);

        // var j = 0;

    //    if(applicationCloseId > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('front.advertisement.click.count')}}",
                     data: {linkclick:linkclick},
                     success: function (result) {
                        // $('#alert_add2').append('<div class="container"><div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">??</button><strong> Application is Declined.</strong></div></div>')
                        // $('#application1').html('<span style="color:red">Declined</span>');
                        // $('#application1').css("margin-left"," 16px");
                        // $('#application1').css("color","red");

                        // j++;
                         console.log('success');
                        //  location.reload();
                     }
                 });
    //    }


             // $(this).text("Pending");

             $('#closeApplicationModal').modal('hide');
             // row++;
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

