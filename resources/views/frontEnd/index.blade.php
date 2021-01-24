@extends('frontEnd.layout.master')

@section('content')
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<section class="hero-wrapper">
    <div class="hero-box hero-bg">

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
                        <div class="section-heading">
                            <h2 class="sec__title cd-headline zoom">
                                Amazing <span class="cd-words-wrapper">
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
                    <div class="section-tab text-center pl-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">
                                    <i class="la la-book mr-1"></i>Courses
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">
                                    <i class="la la-university mr-1"></i>Universities
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="car-tab" data-toggle="tab" href="#car" role="tab" aria-controls="car" aria-selected="true">
                                    <i class="la la-user mr-1"></i>Consultants
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="tour-tab" data-toggle="tab" href="#tour" role="tab" aria-controls="tour" aria-selected="false">
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
                                            {{-- <div class="col-lg-2 col-sm-6 pr-0">
                                                <div class="input-box">
                                                    <label class="label-text">Country</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">

                                                        <select class="select-contain-select">

                                                            @if($countries->count() > 0)
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->countries_id}}" selected>{{$country->countries_name}}</option>
                                                                @endforeach
                                                            @else

                                                                <option value="">Currently Unavailable</option>

                                                            @endif

                                                        </select>

                                                    </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-3 --> --}}
                                            {{-- <div class="col-lg-4 col-sm-2 pr-0">
                                                <div class="input-box">
                                                    <label class="label-text">University</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select class="select-contain-select">

                                                                @if($universities->count() > 0)

                                                                @foreach($universities as $university)
                                                                <option value="{{$university->id}}" selected>{{$university->university_name}}</option>
                                                                @endforeach
                                                                @else

                                                                <option value="">Currently Unavailable</option>

                                                            @endif


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-3 --> --}}
                                            <div class="col-lg-4 col-sm-2 pr-0">
                                                <div class="input-box">
                                                    <label class="label-text" id="ali">Category</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select id="categoryselect" name="category" class="select-contain-select" required>
                                                                <option value="">
                                                                    Select Categories
                                                                </option>
                                                                <?php $categories = App\Models\Category::all();?>
                                                    @if($categories->count() > 0)
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
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
                                            <div class="col-lg-4 col-sm-2 pr-0">
                                                <div class="input-box">
                                                    <label class="label-text">Courses Type</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select id="typeselect" name="type" class="select-contain-select" required>
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
                                                                <option value="{{$key}}">
                                                                    {{$course}}
                                                                </option>

                                                               @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-3 -->
                                            <div class="col-lg-4 col-sm-2 pr-0">
                                                <div class="input-box">
                                                    <label class="label-text">Courses</label>
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select id="selectcourse" name="course_id" class="form-control ert" required>
                                                                <option value="" selected>Select Course</option>



                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <button type="submit"  class="theme-btn w-100 text-center margin-top-20px">Search Now</button>
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
                                    <div class="col-lg-2 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Country</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                <select class="select-contain-select" name="countries_id" required>
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

                                    <div class="col-lg-2 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">University Type</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="type">
                                                        <option value="" selected>Select Type</option>
                                                        <option value="0">Private</option>
                                                        <option value="1">Government</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    {{-- <div class="col-lg-2 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Course</label>
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
                                                        <option value="0700AM">dfgdfg</option>
                                                        <option value="0730AM">Btech</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 --> --}}
{{--
                            <div class="col-lg-2 col-sm-2">
                                <div class="input-box">
                                    <label class="label-text">Duration</label>
                                    <div class="form-group">
                                        <div class="select-contain w-auto">
                                            <select class="select-contain-select">


                                                <option value="0700AM">6 months</option>
                                                <option value="0730AM">1 Years</option>
                                                <option value="0800AM">2 Years</option>
                                                <option value="0830AM">3 Years</option>
                                                <option value="0900AM" selected="">4 Years</option>
                                                <option value="0930AM">5 years</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end checkmark-wrap --> --}}

                            <div class="btn-box col-lg-2">
                                <button type="submit" style="margin-top: 20px" class="theme-btn">Search Now</button>
                            </div>
                        </form>
                            </div>
                        </div><!-- end tab-pane -->
                 <!-- end tab-pane -->
                        <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
                            <div class="contact-form-action">
                                <form action="{{route('consultant_fetch_selected.universitywise')}}" method="POST" class="row align-items-center">
                                    @csrf
                                    <div class="col-lg-2 col-sm-6 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Country</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" id="salazar" name="countries_id">
                                                        <?php $countries = App\Models\Country::all();?>
                                                        @if($countries->count() > 0)
                                                         @foreach($countries as $country)
                                                            <option value="{{$country->countries_id}}" selected>{{$country->countries_name}}</option>
                                                         @endforeach

                                                        @else

                                                            <option value="">Currently Unavailable</option>

                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->

                                   <div class="col-lg-4 col-sm-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Universities</label>
                                            <div class="form-group">

                                                <div class="select-contain w-auto">
                                                    <select class="form-control tyt" name="univercity_id">
                                                        <option value="" selected>Select University</option>



                                                    </select>
                                                </div>                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
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
                                    </div> --}}
                                    <div class="btn-box pt-3 col-lg-2">
                                        <button type="submit" class="theme-btn">Search Now</button>
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
        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg>
    </div>
</section><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

    <div class="jumbotron jumbotron-fluid" style="margin-top: 30px; background-image: url('{{asset("frontEnd/assets/images/color-bg3.png")}}');">
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
    {{-- <ul>
        <li style="float: right;">

            <a href="{{route('dashboard.index2')}}" class="stbtn">More <i class="las la-chevron-right"></i></a>

                </li>
    </ul> --}}
        </div>

    </div>
  </div>


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
                    "><a  href="{{route('university_all')}}" class="btn btn-primary btn-sm">View all</a></span></h4>
                    <hr>
                    <?php $universities = App\Models\User::get();
                    ?>
                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>

                   @if($universities->count()>0)

                    <div class="testimonial-carousel carousel-action">
                        @foreach($universities as $key => $university)
                        {{-- {{dd($university)}} --}}
                        @if($university->isUniversity())
                        @if($university->Premium_expire_date >$mytime)
                        <div class="testimonial-card">

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
                                    <a href="{{route('university_detail',['id'=>$university->id])}}"><h4 class="author__title">{{$university->university->university_name  ?? ''}}</h4></a>
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
                                <p class="testi__desc"><?php echo ($myvalue . '...')?></p>



                                <span class="price__text"><b>Average Fees :</b></span>
                                <span class="price__num"><i class="las la-rupee-sign"></i>{{$university->university->average_fees ?? ''}}</span>

                                <a  style="
                                float: right;
                            " class="btn btn-primary" href="{{route('university_detail',['id'=>$university->id])}}">Details<i class="las la-angle-double-right"></i></a>
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
                    <?php $consultants = App\Models\User::get();
                    ?>
                    @if($consultants->count()>0)
                    <div class="testimonial-carousel carousel-action">
                        @foreach($consultants as $consultant)
                        @if($consultant->isConsultant())

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
                                    <a href="{{route('consultant_detail',['id' => $consultant->id ?? ''])}}"><h4 class="author__title">{{$consultant->first_name ?? ''}}{{$consultant->last_name ?? ''}}</h4></a>
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
                                <p class="testi__desc"><?php echo ($myvalue . '...')?></p>
                                <span class="price__text"><b>City :</b></span>
                                <span class="price__num">{{$consultant->city ?? ''}}</span>
                                <a style="
                                float: right;
                            " class="btn btn-primary" href="{{route('consultant_detail',['id'=>$consultant->id])}}">Details<i class="las la-angle-double-right"></i></a>
                            </div>

                        </div><!-- end testimonial-card -->

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
        <div class="row">

            <div class="col-lg-6">


                    {{-- <p class="sec__desc padding-top-30px">
                        Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero
                    </p>
                    <div class="btn-box padding-top-35px">
                        <a href="#" class="theme-btn">Explore All</a>
                    </div> --}}
                    <div class="row12" style="    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    margin-right: 7px;
                    margin-left: 8px;">
                    <div class="card border-primary mt-3 ml-4 mb-2" style="max-width: 15rem; max-height:15rem">
                        <div class="card-header border-primary">1st Step</div>
                        <div class="card-body">
                          <h5 class="card-title text-primary">Hire Consultant</h5>
                          <p class="card-text">djfhgdhghdjkhgkjdfghdfgjdddddddddddddhflgd.</p>
                        </div>
                      </div>
                      <div class="card border-primary mt-3 ml-4 mb-2 " style="max-width: 15rem; max-height:15rem">
                        <div class="card-header border-primary">2nd Step</div>
                        <div class="card-body">
                          <h5 class="card-title text-primary ">Choose University</h5>
                          <p class="card-text">sdjfhsjkhfshhkshkhskjghjkfhjkgsajkgjkfhghdfdf.</p>
                        </div>
                      </div>
                      <div class="card border-primary mt-3 ml-4 mb-2" style="max-width: 15rem; max-height:15rem">
                        <div class="card-header border-primary">3rd Step</div>
                        <div class="card-body ">
                          <h5 class="card-title text-primary">Verify Documents</h5>
                          <p class="card-text">Some quick example text to build on the carddt.</p>
                        </div>
                      </div>
                      <div class="card border-primary mt-3 ml-4 mb-2" style="max-width: 15rem; max-height:15rem">
                        <div class="card-header border-primary">4th Step</div>
                        <div class="card-body ">
                          <h5 class="card-title text-primary">Get Visa </h5>
                          <p class="card-text">Some quick example text to build on the card tit.</p>
                        </div>
                      </div>
                    </div>

                <!-- end section-heading -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-6 ">


                    <div class="embed-responsive embed-responsive-4by3 ">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                      </div>
                    <!-- end testimonial-carousel -->
            </div><!-- end col-lg-8 -->
        </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
                      {{-- works end --}}

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
                            <?php $categories = App\Models\Category::all() ?>
                            @if($categories->count() > 0)
                            <div class="row padding-top-80px">

                                     @foreach($categories as $category)
                                    <div class="col-lg-2 responsive-column">
                                        <div class="icon-box icon-layout-4">
                                            <div class="info-icon">
                                                <i class="las la-book-medical"></i>
                                            </div><!-- end info-icon-->
                                            <div class="info-content">
                                                <h4 class="info__title"><a href="#" value="{{$category->id}}">{{$category->title}}</a></h4>

                                            </div><!-- end info-content -->
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-2 -->
                                    @endforeach

                            </div><!-- end row -->
                            @else
                            <div>
                              <h4 style="margin-top: 50px;"">Discipline Unavailable</h4>
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
                                   New York
                               </a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="hong-kong-tab" data-toggle="tab" href="#hong-kong" role="tab" aria-controls="hong-kong" aria-selected="false">
                                   Hong Kong
                               </a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="beijing-tab" data-toggle="tab" href="#beijing" role="tab" aria-controls="beijing" aria-selected="false">
                                   Beijing
                               </a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="tokyo-tab" data-toggle="tab" href="#tokyo" role="tab" aria-controls="tokyo" aria-selected="false">
                                   Tokyo
                               </a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="seoul-tab" data-toggle="tab" href="#seoul" role="tab" aria-controls="seoul" aria-selected="false">
                                   Seoul
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
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                 RTU
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>
                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$22132</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img2.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                   BTU
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$740</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img3.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                    IIT
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$140</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img4.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                    MIT
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img5.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                KANPUR
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$100</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img6.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                BOMBAY
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$640</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                            </div>
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="hong-kong" role="tabpanel" aria-labelledby="hong-kong-tab">
                            <div class="row">
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                Harvard
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img2.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                Cambridge
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$740</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img3.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                               sdfdsgdfsg
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$140</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img4.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfkjksddf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img5.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdjafsjdfjs
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$100</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img6.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                fsjfjsjf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$640</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                            </div>
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="seoul" role="tabpanel" aria-labelledby="seoul-tab">
                            <div class="row">
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfsdkfjlsdajfl
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img2.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfghj
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$740</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img3.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                jhgfdf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$140</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img4.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sjdfhjskhf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img5.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                jdgkjdfgjdlfgkl
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$100</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img6.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdjfhskjdhfkj
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$640</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                            </div>
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="tokyo" role="tabpanel" aria-labelledby="tokyo-tab">
                            <div class="row">
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                hdfjshdfhdsh
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img2.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                fsdfsdfsdf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$740</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img3.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdhfsjdfhkshdkfhs
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$140</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img4.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfkskldflksf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img5.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                               sdjfsjkdhfjkhsdhfs
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$100</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img6.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfsdfsdfsd
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$640</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                            </div>
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="beijing" role="tabpanel" aria-labelledby="beijing-tab">
                            <div class="row">
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfdsjjdfgjkl
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img2.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                dfkdslfksjdj
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$740</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img3.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                              sdfsdfsdfsd
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Feess</span><span class="price__num">$140</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img4.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfsdfsdfs
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$340</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img5.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                                sdfsdfsdf
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$100</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="deal-card">
                                        <div class="deal-title d-flex align-items-center">
                                            <img src="{{ asset('frontEnd/assets/images/airline-img6.png') }}" alt="air-line-img">
                                            <h3 class="deal__title">
                                                <a href="#" class="d-flex align-items-center">
                                               sdfsdfsdfsda
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="deal__meta">City: Rajasthan</p>

                                        <div class="deal-action-box d-flex align-items-center justify-content-between">
                                            <div class="price-box d-flex align-items-center"><span class="price__from mr-1">Fees</span><span class="price__num">$640</span></div>
                                            <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div><!-- end deal-card -->
                                </div><!-- end col-lg-4 -->
                            </div>
                        </div><!-- end tab-pane -->
                    </div><!-- end tab-content -->
                    <div class="tab-content-info d-flex justify-content-between align-items-center">
                        <p class="font-size-15"><i class="la la-question-circle mr-1"></i>Average round-trip price per person, taxes and fees included.</p>
                        <a href="#" class="btn-text font-size-15">Discover More <i class="la la-angle-right"></i></a>
                    </div><!-- end tab-content-info -->
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
<section class="funfact-area padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Milestone of 10 Years</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
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

                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-users"></i>
                        </div>
                        <div class="counter-content">

                                <div>
                                    <span class="counter" data-from="0" data-to="{{$users}}"  data-refresh-interval="6">0</span>
                                    <span class="count-symbol">+</span>
                                </div>
                                <p class="counter__title"> Satisfied Students </p>


                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-building"></i>
                        </div>
                        <div class="counter-content">
                            <div>
                                <span class="counter" data-from="0" data-to="{{$university}}"  data-refresh-interval="6">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Universitys</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="las la-user-tie"></i>
                        </div>
                        <div class="counter-content">
                            <div>
                                <span class="counter" data-from="0" data-to="{{$consultant}}"  data-refresh-interval="6">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Consultants</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-check-circle"></i>
                        </div>
                        <div class="counter-content">
                            <?php $bookings = DB::table('bookings')->count(); ?>
                            {{-- <? //php $bookings = DB::table('bookings')->where('status', 1)->count(); ?> --}}
                            {{-- {{dd($bookings)}} --}}
                            <div>
                                <span class="counter" data-from="0" data-to="{{$bookings}}"  data-refresh-interval="6">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Booking</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end counter-box -->
    </div><!-- end container -->
</section>
<!-- ================================
    START university AREA
================================= -->
{{-- <section class="hotel-area section-bg section-padding overflow-hidden padding-right-100px padding-left-100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Most Popular <br> Universities</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="hotel-card-carousel carousel-action">
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img1.jpg') }}" alt="hotel-img">
                                </a>
                                <span class="badge">featured</span>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img2.jpg') }}" alt="hotel-img">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img3.jpg') }}" alt="hotel-img">
                                </a>
                                <span class="badge">Featured</span>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img4.jpg') }}" alt="hotel-img">
                                </a>
                                <span class="badge">Popular</span>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img5.jpg') }}" alt="hotel-img">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img6.jpg') }}" alt="hotel-img">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img1.jpg') }}" alt="hotel-img">
                                </a>
                                <span class="badge">Popular</span>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="hotel-single.html" class="d-block">
                                    <img src="{{ asset('frontEnd/assets/images/img2.jpg') }}" alt="hotel-img">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">RTU</a></h3>
                                <p class="card-meta">Rajasthan technical University</p>
                                <div class="card-rating">
                                    <span class="badge text-white">4.4/5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">(30 Reviews)</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from">Fees</span>
                                        <span class="price__num">$88.00</span>
                                    </p>
                                    <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end hotel-card-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</section><!-- end hotel-area --> --}}
<!-- ================================
    END university AREA
================================= -->

<!-- ================================
    START DESTINATION AREA
================================= -->
    {{-- <section class="destination-area section--padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2 class="sec__title">Top Visited Places</h2>
                        <p class="sec__desc pt-3">Morbi convallis bibendum urna ut viverra Maecenas quis
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="btn-box btn--box text-right">
                        <a href="tour-grid.html" class="theme-btn">Discover More</a>
                    </div>
                </div>
            </div><!-- end row -->
            <div class="row padding-top-50px">
                <div class="col-lg-4">
                    <div class="card-item destination-card">
                        <div class="card-img">
                            <img src="{{ asset('frontEnd/assets/images/destination-img2.jpg') }}" alt="destination-img">
                            <span class="badge">new york</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="tour-details.html">Main Street Park</a></h3>
                            <div class="card-rating d-flex align-items-center">
                                <span class="ratings d-flex align-items-center mr-1">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                <span class="rating__text">(70694 Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p class="tour__text">
                                    50 Tours
                                </p>
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">$58.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                    <div class="card-item destination-card">
                        <div class="card-img">
                            <img src="{{ asset('frontEnd/assets/images/destination-img3.jpg') }}" alt="destination-img">
                            <span class="badge">chicago</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="tour-details.html">Chicago Cultural Center</a></h3>
                            <div class="card-rating d-flex align-items-center">
                                <span class="ratings d-flex align-items-center mr-1">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                <span class="rating__text">(70694 Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p class="tour__text">
                                    50 Tours
                                </p>
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">$68.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="card-item destination-card">
                        <div class="card-img">
                            <img src="{{ asset('frontEnd/assets/images/destination-img4.jpg') }}" alt="destination-img">
                            <span class="badge">Hong Kong</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="tour-details.html">Lugard Road Lookout</a></h3>
                            <div class="card-rating d-flex align-items-center">
                                <span class="ratings d-flex align-items-center mr-1">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                <span class="rating__text">(70694 Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p class="tour__text">
                                    150 Tours
                                </p>
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">$79.00</span>
                                    <span class="price__num before-price">$89.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                    <div class="card-item destination-card">
                        <div class="card-img">
                            <img src="{{ asset('frontEnd/assets/images/destination-img5.jpg') }}" alt="destination-img">
                            <span class="badge">Las Vegas</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="tour-details.html">Planet Hollywood Resort</a></h3>
                            <div class="card-rating d-flex align-items-center">
                                <span class="ratings d-flex align-items-center mr-1">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                <span class="rating__text">(70694 Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p class="tour__text">
                                    50 Tours
                                </p>
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">$88.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="card-item destination-card">
                        <div class="card-img">
                            <img src="{{ asset('frontEnd/assets/images/destination-img.jpg') }}" alt="destination-img">
                            <span class="badge">Shanghai</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="tour-details.html">Oriental Pearl TV Tower</a></h3>
                            <div class="card-rating d-flex align-items-center">
                                <span class="ratings d-flex align-items-center mr-1">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                                <span class="rating__text">(70694 Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p class="tour__text">
                                    50 Tours
                                </p>
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">$58.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end destination-area --> --}}
<!-- ================================
    END DESTINATION AREA
================================= -->

<!-- ================================
    START cosultant AREA
================================= -->
{{-- <section class="info-area padding-top-100px padding-bottom-60px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Featured Consultants</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-100px">
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img">
                        <img src="{{('frontEnd/assets/images/team1.jpg')}}" alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">David Roberts</h3>
                        <p class="card-meta">Founder & Director</p>
                        <p class="card-text font-size-15 pt-2">Ligula vehicula enenatis semper, magna lorem aliquet lacusin ante dapibus dictum fugats vitaes nemo minima.</p>
                        <ul class="social-profile padding-top-20px pb-2">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img">
                        <img src="{{('frontEnd/assets/images/team2.jpg')}}" alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Augusta Silva</h3>
                        <p class="card-meta">Chief Operating Officer</p>
                        <p class="card-text font-size-15 pt-2">Ligula vehicula enenatis semper, magna lorem aliquet lacusin ante dapibus dictum fugats vitaes nemo minima.</p>
                        <ul class="social-profile padding-top-20px pb-2">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
           <!-- end col-lg-4 -->
             <!-- end col-lg-4 -->
           <!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img">
                        <img src="{{('frontEnd/assets/images/team6.jpg')}}" alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Evan Porter</h3>
                        <p class="card-meta">Head of Design</p>
                        <p class="card-text font-size-15 pt-2">Ligula vehicula enenatis semper, magna lorem aliquet lacusin ante dapibus dictum fugats vitaes nemo minima.</p>
                        <ul class="social-profile padding-top-20px pb-2">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end car-area --> --}}
<!-- ================================
    END consultant AREA
================================= -->


<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area padding-top-100px padding-bottom-180px text-center">
    <div class="video-bg">
        <video autoplay loop>
            <source src="{{asset('frontEnd/assets/video/video-bg.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title text-white line-height-55">Let us show you the world <br> Discover our most popular Universities</h2>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                <a href="{{route('university_all')}}" class="theme-btn border-0">Checkout</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <svg class="cta-svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M-31.31,170.22 C164.50,33.05 334.36,-32.06 547.11,196.88 L500.00,150.00 L0.00,150.00 Z"></path></svg>
</section><!-- end cta-area -->
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

            @foreach($blogs as $blog)
            {{-- @if($blog->status == 1) --}}
            <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <a href="{{route('blog_detail', $blog->id ?? '')}}">
                    <div class="card-img">
                        <a href="{{route('blog_detail', $blog->id ?? '')}}">
                <img style="height: 231.25px; width: 370px;" src="{{asset($blog->main_image ?? '')}}" alt="blog-img">
                        </a>
                        <div class="post-format icon-element">
                            <a href="{{route('blog_detail', $blog->id ?? '')}}"> <i class="la la-photo"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                {{-- <a href="#" class="badge">{{$blog->title}}</a> --}}
                                {{-- <a href="#" class="badge">lifestyle</a> --}}
                            </div>
                            <h3 class="card-title line-height-26"><a href="{{route('blog_detail', $blog->id ?? '')}}">{{$blog->title}}</a></h3>
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
            {{-- <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <div class="card-img">
                        <img src="{{ asset('frontEnd/assets/images/blog-img2.jpg') }}" alt="blog-img">
                        <div class="post-format icon-element">
                            <i class="la la-play"></i>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                <a href="#" class="badge">Video</a>
                            </div>
                            <h3 class="card-title line-height-26"><a href="blog-single.html">My Best Learing Tips: The Ultimate Learning Guide</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 February, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">4 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{ asset('frontEnd/assets/images/small-team2.jpg') }}" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <a href="#" class="author__title">Phillip Hunt</a>
                            </div>
                        </div>
                        <div class="post-share">
                            <ul>
                                <li>
                                    <i class="la la-share icon-element"></i>
                                    <ul class="post-share-dropdown d-flex align-items-center">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 --> --}}
            {{-- <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <div class="card-img">
                        <img src="{{ asset('frontEnd/assets/images/blog-img3.jpg') }}" alt="blog-img">
                        <div class="post-format icon-element">
                            <i class="la la-music"></i>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                <a href="#" class="badge">audio</a>
                            </div>
                            <h3 class="card-title line-height-26"><a href="blog-single.html">By all Means, Learn from Popular universities & Don’t Rule Out Other Universities</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{ asset('frontEnd/assets/images/small-team3.jpg') }}" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <a href="#" class="author__title">Luke Jacobs</a>
                            </div>
                        </div>
                        <div class="post-share">
                            <ul>
                                <li>
                                    <i class="la la-share icon-element"></i>
                                    <ul class="post-share-dropdown d-flex align-items-center">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 --> --}}
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box text-center pt-4">
                    <a href="{{route('blog_all')}}" class="theme-btn">Read More Post</a>
                </div>
            </div>
        </div>
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
                        <h2 class="sec__title line-height-55">Education Portal Android and IOS App is Available!</h2>
                    </div><!-- end section-heading -->
                    <ul class="info-list padding-top-30px">
                        <li class="d-flex align-items-center mb-3"><span class="la la-check icon-element flex-shrink-0 ml-0"></span> Access and change your itinerary on-the-go</li>
                        <li class="d-flex align-items-center mb-3"><span class="la la-check icon-element flex-shrink-0 ml-0"></span> Free access</li>
                        <li class="d-flex align-items-center mb-3"><span class="la la-check icon-element flex-shrink-0 ml-0"></span> Get real-time  updates</li>
                    </ul>
                    <div class="btn-box padding-top-30px">
                        <a href="#" class="d-inline-block mr-3">
                            <img src="{{ asset('frontEnd/assets/images/app-store.png') }}" alt="">
                        </a>
                        <a href="#" class="d-inline-block">
                            <img src="{{ asset('frontEnd/assets/images/google-play.png') }}" alt="">
                        </a>
                    </div><!-- end btn-box -->
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="mobile-img">
                    {{-- <img src="{{ asset('frontEnd/assets/images/mobile-app.png') }}" alt="mobile-img"> --}}
                    <img src="{{ asset('frontEnd/assets/images/contactus.gif') }}" alt="mobile-img">
                    <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_du7jspky.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop controls autoplay></lottie-player>
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
<br>
<br>

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
@endsection
@section('per_page_style')
<style>
canvas {

    position: absolute;
    top: 0;
    left: 0;
    background-color: black;
  }
  </style>
@endsection
 @section('per_page_script')
{{-- <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script> --}}
rt=$('#categoryselect').val();
<script src="{{ asset('frontEnd/assets/js/three.r119.min.js') }}"></script>
<script src="{{ asset('frontEnd/assets/js/vanta.net.min.js') }}"></script>
<script>
VANTA.NET({
  el: ".hero-bg",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0x3f4aff,
  backgroundColor: 0x23153c,
  points: 20.00,
  maxDistance: 25.00,
  spacing: 17.00
})
</script>
<script>
    $(document).on('change', '#typeselect', function ()
    {
    typeselect = $(this).val();
    categoryselect=$('#categoryselect').val();

    function isEmpty(val){
        return (val === undefined || val == null || val.length <= 0) ? true : false;
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
    data:{typeselect:typeselect,categoryselect:categoryselect},
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
@endsection
