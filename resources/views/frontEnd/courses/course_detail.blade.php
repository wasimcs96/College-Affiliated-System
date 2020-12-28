@extends('frontEnd.layout.master')
@section('content')


<section class="breadcrumb-top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-list breadcrumb-top-list">
                    <ul class="list-items d-flex justify-content-start">
                        <li><a href="index.html">Home</a></li>
                        <li>France</li>
                        <li>Hilton Hotel and Resorts</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-top-bar -->
<!-- ================================
    END BREADCRUMB TOP BAR
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-7 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-fancybox="video" data-src="https://www.youtube.com/watch?v=5u1WISBbo5I"
                               data-speed="700">
                                <i class="la la-video-camera mr-2"></i>Video
                            </a>
                            <a class="theme-btn" data-src="images/img1.jpg"
                               data-fancybox="gallery"
                               data-caption="Showing image - 01"
                               data-speed="700">
                                <i class="la la-photo mr-2"></i>More Photos
                            </a>
                        </div>
                        <a class="d-none"
                             data-fancybox="gallery"
                             data-src="images/img2.jpg"
                             data-caption="Showing image - 02"
                             data-speed="700"></a>
                        <a class="d-none"
                             data-fancybox="gallery"
                             data-src="images/img3.jpg"
                             data-caption="Showing image - 03"
                             data-speed="700"></a>
                        <a class="d-none"
                             data-fancybox="gallery"
                             data-src="images/img4.jpg"
                             data-caption="Showing image - 04"
                             data-speed="700"></a>
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
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description" class="scroll-link active">Course Details</a></li>
                            <li><a data-scroll="availability" href="#availability" class="scroll-link">Universities</a></li>
                            <li><a data-scroll="amenities" href="#amenities" class="scroll-link">Amenities</li>
                            <li><a data-scroll="faq" href="#faq" class="scroll-link">Faq</a></li>
                            <li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
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
                                <h3 class="title font-size-26">MBA</h3>
                                <div class="d-flex align-items-center pt-2">
                                    <p class="mr-2">Managment of bussines Administration</p>
                                    <p>
                                        <span class="badge badge-warning text-white font-size-16">4.7</span>
                                        <span>(4,209 Reviews)</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item py-4">
                                <div class="row">
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-hotel"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Course Type</h3>
                                                <span class="font-size-13">Managment</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Qualifications</h3>
                                                <span class="font-size-13">bachelor degree</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-bed"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Minimum Fees</h3>
                                                <span class="font-size-13">500000</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-money"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Course tenure</h3>
                                                <span class="font-size-13">2 Years</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    {{-- <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-globe"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Country</h3>
                                                <span class="font-size-13">France</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 --> --}}
                                    {{-- <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-map"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">City</h3>
                                                <span class="font-size-13">Paris</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 --> --}}
                                    {{-- <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Neighborhood</h3>
                                                <span class="font-size-13">République</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 --> --}}
                                    {{-- <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-times"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Cancellation</h3>
                                                <span class="font-size-13">Strict</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 --> --}}
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">About Course</h3>
                                <p class="py-3">Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
                                <p>Cum et probo menandri. Officiis consulatu pro et, ne sea sale invidunt, sed ut sint blandit efficiendi. Atomorum explicari eu qui, est enim quaerendum te. Quo harum viris id. Per ne quando dolore evertitur, pro ad cibo commune.</p>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="availability" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-30px">

                       <!-- end contact-form-action -->
                                <h3 class="title font-size-20">Top Universities With this Course</h3>
                                <div class="cabin-type padding-top-30px">
                                    <div class="cabin-type-item seat-selection-item d-flex">
                                        <div class="cabin-type-img flex-shrink-0">
                                            <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="">
                                        </div>
                                        <div class="cabin-type-detail">
                                            <h3 class="title">RTU</h3>
                                            <div class="row padding-top-20px">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-wifi"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Wi-Fi Campus</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-bed"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Hostel</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-building"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Library</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-hotel"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Cafeteria</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            {{-- <div class="room-photos">
                                                <a class="btn theme-btn-hover-gray" data-src="images/img1.jpg"
                                                   data-fancybox="gallery"
                                                   data-caption="Showing image - 01"
                                                   data-speed="700">
                                                    <i class="la la-photo mr-2"></i>Room Photos
                                                </a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img2.jpg"
                                                     data-caption="Showing image - 02"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img3.jpg"
                                                     data-caption="Showing image - 03"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img4.jpg"
                                                     data-caption="Showing image - 04"
                                                     data-speed="700"></a>
                                            </div> --}}
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
                                               </ul>                                            <div class="custom-checkbox mb-0">

                                              <a href="
                                             #}">  <label for="selectChb1" class="theme-btn theme-btn-small">Detail</label></a>
                                            </div>
                                        </div>
                                    </div><!-- end cabin-type-item -->
                                </div><!-- end cabin-type -->
                                <div class="cabin-type padding-top-30px">
                                    <div class="cabin-type-item seat-selection-item d-flex">
                                        <div class="cabin-type-img flex-shrink-0">
                                            <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="">
                                        </div>
                                        <div class="cabin-type-detail">
                                            <h3 class="title">BTU</h3>
                                            <div class="row padding-top-20px">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-wifi"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Wi-Fi Campus</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-bed"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Hostel</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-building"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Library</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-hotel"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Cafeteria</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                            </div> <!-- end row -->
                                            {{-- <div class="room-photos">
                                                <a class="btn theme-btn-hover-gray" data-src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"
                                                   data-fancybox="gallery"
                                                   data-caption="Showing image - 01"
                                                   data-speed="700">
                                                    <i class="la la-photo mr-2"></i>Room Photos
                                                </a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img2.jpg"
                                                     data-caption="Showing image - 02"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img3.jpg"
                                                     data-caption="Showing image - 03"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img4.jpg"
                                                     data-caption="Showing image - 04"
                                                     data-speed="700"></a>
                                            </div> --}}
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
                                                <a href="
                                             #}">  <label for="selectChb1" class="theme-btn theme-btn-small">Detail</label></a>
                                            </div>
                                        </div>
                                    </div><!-- end cabin-type-item -->
                                </div><!-- end cabin-type -->
                                <div class="cabin-type padding-top-30px">
                                    <div class="cabin-type-item seat-selection-item d-flex">
                                        <div class="cabin-type-img flex-shrink-0">
                                            <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="">
                                        </div>
                                        <div class="cabin-type-detail">
                                            <h3 class="title">IIT Kanpur</h3>
                                            <div class="row padding-top-20px">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-wifi"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Wi-Fi Campus</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-bed"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Hostel</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-building"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Library</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-hotel"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Cafeteria</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            {{-- <div class="room-photos">
                                                <a class="btn theme-btn-hover-gray" data-src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"
                                                   data-fancybox="gallery"
                                                   data-caption="Showing image - 01"
                                                   data-speed="700">
                                                    <i class="la la-photo mr-2"></i>Room Photos
                                                </a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img2.jpg"
                                                     data-caption="Showing image - 02"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img3.jpg"
                                                     data-caption="Showing image - 03"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img4.jpg"
                                                     data-caption="Showing image - 04"
                                                     data-speed="700"></a>
                                            </div> --}}
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
                                                <a href="
                                             #}">  <label for="selectChb1" class="theme-btn theme-btn-small">Detail</label></a>
                                            </div>
                                        </div>
                                    </div><!-- end cabin-type-item -->
                                </div><!-- end cabin-type -->
                                <div class="cabin-type padding-top-30px">
                                    <div class="cabin-type-item seat-selection-item d-flex">
                                        <div class="cabin-type-img flex-shrink-0">
                                            <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="">
                                        </div>
                                        <div class="cabin-type-detail">
                                            <h3 class="title">IIT bombay</h3>
                                            <div class="row padding-top-20px">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-wifi"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Wi-Fi Campus</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-bed"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Hostel</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-building"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Library</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-hotel"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Cafeteria</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            {{-- <div class="room-photos">
                                                <a class="btn theme-btn-hover-gray" data-src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"
                                                   data-fancybox="gallery"
                                                   data-caption="Showing image - 01"
                                                   data-speed="700">
                                                    <i class="la la-photo mr-2"></i>Room Photos
                                                </a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img2.jpg"
                                                     data-caption="Showing image - 02"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img3.jpg"
                                                     data-caption="Showing image - 03"
                                                     data-speed="700"></a>
                                                <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/img4.jpg"
                                                     data-caption="Showing image - 04"
                                                     data-speed="700"></a>
                                            </div> --}}
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
                                                <a href="
                                               #}">  <label for="selectChb1" class="theme-btn theme-btn-small">Detail</label></a>
                                            </div>
                                        </div>
                                    </div><!-- end cabin-type-item -->
                                </div><!-- end cabin-type -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end location-map -->
                        <div id="amenities" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-20px">
                                <h3 class="title font-size-20">Amenities</h3>
                                <div class="amenities-feature-item pt-4">
                                    <div class="row">
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-wifi"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Wi-Fi Campus</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-swimming-pool"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Swimming Pool</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-television"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Auditorium</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-coffee"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Cafeteria</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-tree"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">AC ClassRooms</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-dumbbell"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">GYM Facility</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Fridge</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-flask"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Labs</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-music"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Entertainment</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-lock"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Secure Vault</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                         <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-car"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Vehicle Facility</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Hostel Facility</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check-circle"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Eco-friendly Campus</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-coffee"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Mess</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-car"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Free Parking</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-fire"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Fire Place</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-wheelchair"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Handicap Accessible</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                            {{-- <div class="col-lg-4 responsive-column">
                                                <div class="single-tour-feature d-flex align-items-center mb-3">
                                                    <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                        <i class="la la-user-secret"></i>
                                                    </div>
                                                    <div class="single-feature-titles">
                                                        <h3 class="title font-size-15 font-weight-medium"></h3>
                                                    </div>
                                                </div><!-- end single-tour-feature -->
                                            </div><!-- end col-lg-4 --> --}}
                                        {{-- <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-building"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Elevator In Building</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 --> --}}
                                        {{-- <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gift"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Suitable For Events</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 --> --}}
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gamepad"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Sports Facility</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end faq -->
                        <div id="faq" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">FAQs</h3>
                                <div class="accordion accordion-item padding-top-30px" id="accordionExample2">
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFour" aria-expanded="true" aria-controls="faqCollapseFour">
                                                    <span class="ml-3">How do I know a reservation is accepted or confirmed?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseFour" class="collapse show" aria-labelledby="faqHeadingFour" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingFive">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                                                    <span class="ml-3">Am I allowed to decline reservation requests?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseFive" class="collapse" aria-labelledby="faqHeadingFive" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingSix">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseSix" aria-expanded="false" aria-controls="faqCollapseSix">
                                                    <span class="ml-3">What happens if I let a reservation request expire?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseSix" class="collapse" aria-labelledby="faqHeadingSix" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingSeven">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseSeven" aria-expanded="false" aria-controls="faqCollapseSeven">
                                                    <span class="ml-3">How do I set reservation requirements?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseSeven" class="collapse" aria-labelledby="faqHeadingSeven" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end faq -->
                        <div id="reviews" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="review-container padding-top-30px">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="review-summary">
                                                <h2>4.5<span>/5</span></h2>
                                                <p>Excellent</p>
                                                <span>Based on 4 reviews</span>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-8">
                                            <div class="review-bars">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">Service</h3>
                                                            <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line" data-percent="70%">
                                                                        <div class="progressbar-line-item bar-bg-1"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>
                                                                <div class="bar-percent">4.6</div>
                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">Location</h3>
                                                            <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line" data-percent="55%">
                                                                        <div class="progressbar-line-item bar-bg-2"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>
                                                                <div class="bar-percent">4.7</div>
                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">Value for Money</h3>
                                                            <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line" data-percent="40%">
                                                                        <div class="progressbar-line-item bar-bg-3"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>
                                                                <div class="bar-percent">2.6</div>
                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">Cleanliness</h3>
                                                            <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line" data-percent="60%">
                                                                        <div class="progressbar-line-item bar-bg-4"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>
                                                                <div class="bar-percent">3.6</div>
                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">Facilities</h3>
                                                            <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line" data-percent="50%">
                                                                        <div class="progressbar-line-item bar-bg-5"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>
                                                                <div class="bar-percent">2.6</div>
                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div>
                                        </div><!-- end col-lg-8 -->
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
                                                        <div class="col-lg-6 responsive-column">
                                                            <div class="input-box">
                                                                <label class="label-text">Name</label>
                                                                <div class="form-group">
                                                                    <span class="la la-user form-icon"></span>
                                                                    <input class="form-control" type="text" name="text" placeholder="Your name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 responsive-column">
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

                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="#"><img src="{{asset('frontEnd/assets/images/team8.jpg')}}" alt="testimonial image"></a>
                                        </div>
                                        <div class="author-bio">
                                            <h4 class="author__title"><a href="#">John Wick</a></h4>
                                            <span class="author__meta">Member Since 2017</span>
                                            <span class="ratings d-flex align-items-center">
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star-o"></i>
                                                     <span class="ml-2">305 Reviews</span>
                                                </span>
                                            <div>
                                            <a href="#" class="btn btn-primary text-light">Book Now</a>
                                            </div>
                                        </div>
                                    </div></li>
                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="#"><img src="{{asset('frontEnd/assets/images/team8.jpg')}}" alt="testimonial image"></a>
                                        </div>
                                        <div class="author-bio">
                                            <h4 class="author__title"><a href="#">John Wick</a></h4>
                                            <span class="author__meta">Member Since 2017</span>
                                            <span class="ratings d-flex align-items-center">
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star-o"></i>
                                                     <span class="ml-2">305 Reviews</span>
                                                </span>
                                                <div>
                                                    <a href="#" class="btn btn-primary text-light">Book Now</a>
                                                </div>
                                        </div>
                                    </div></li>
                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="#"><img src="{{asset('frontEnd/assets/images/team8.jpg')}}" alt="testimonial image"></a>
                                        </div>
                                        <div class="author-bio">
                                            <h4 class="author__title"><a href="#">John Wick</a></h4>
                                            <span class="author__meta">Member Since 2017</span>
                                            <span class="ratings d-flex align-items-center">
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star-o"></i>
                                                     <span class="ml-2">305 Reviews</span>
                                                </span>
                                                <div>
                                                    <a href="#" class="btn btn-primary text-light">Book Now</a>
                                                </div>
                                        </div>
                                    </div></li>
                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="#"><img src="{{asset('frontEnd/assets/images/team8.jpg')}}" alt="testimonial image"></a>
                                        </div>
                                        <div class="author-bio">
                                            <h4 class="author__title"><a href="#">John Wick</a></h4>
                                            <span class="author__meta">Member Since 2017</span>
                                            <span class="ratings d-flex align-items-center">
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star-o"></i>
                                                     <span class="ml-2">305 Reviews</span>
                                                </span>
                                                <div>
                                                    <a href="#" class="btn btn-primary text-light">Book Now</a>
                                                </div>
                                        </div>
                                    </div></li>
                                    <li><div class="author-content d-flex">
                                        <div class="author-img">
                                            <a href="#"><img src="{{asset('frontEnd/assets/images/team8.jpg')}}" alt="testimonial image"></a>
                                        </div>
                                        <div class="author-bio">
                                            <h4 class="author__title"><a href="#">John Wick</a></h4>
                                            <span class="author__meta">Member Since 2017</span>
                                            <span class="ratings d-flex align-items-center">
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star"></i>
                                                     <i class="la la-star-o"></i>
                                                     <span class="ml-2">305 Reviews</span>
                                                </span>
                                                <div>
                                                    <a href="#" class="btn btn-primary text-light">Book Now</a>
                                                </div>
                                        </div>
                                    </div></li>
                                    {{-- <li><i><img src="{{asset('frontEnd/assets/img/course/user-1.jpg')}}"></i><a href="#" ><span>&nbsp;   John Wick</span>
                                    </a></li>
                                    <li><i><img src="{{asset('frontEnd/assets/img/course/user-1.jpg')}}"></i><a href="#"><span>&nbsp;   John Wick</span></a></li>
                                    <li><i><img src="{{asset('frontEnd/assets/img/course/user-1.jpg')}}"></i><a href="#"><span>&nbsp;   John Wick</span></a></li>
                                    <li><i><img src="{{asset('frontEnd/assets/img/course/user-1.jpg')}}"></i><a href="#"><span>&nbsp;   John Wick</span></a></li> --}}
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div>
                        <!-- end sidebar-widget -->
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
                                    <li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@trizen.com">info@edup.com</a></li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Organized by</h3>
                            <div class="author-content">
                                <div class="d-flex">
                                    <div class="author-img">
                                        <a href="#"><img src="{{asset('frontEnd/assets/images/team8.jpg')}}" alt="testimonial image"></a>
                                    </div>
                                    <div class="author-bio">
                                        <h4 class="author__title"><a href="#">Education portal</a></h4>
                                        <span class="author__meta">Since 2017</span>
                                        <span class="ratings d-flex align-items-center">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star-o"></i>
                                            <span class="ml-2">305 Reviews</span>
                                        </span>
                                        <div class="btn-box pt-3">
                                            <a href="#" class="theme-btn theme-btn-small theme-btn-transparent">Ask a Question</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START RELATE TOUR AREA
================================= -->
<section class="related-tour-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">You might also like</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-4 responsive-column">
                <div class="card-item">
                    <div class="card-img">
                        <a href="{{route('course_detail')}}" class="d-block">
                            <img src="{{asset('frontEnd/assets/img/course/course-1.jpg')}}" alt="hotel-img">
                        </a>
                        <span class="badge">Top Ranked</span>
                        <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                            <i class="la la-heart-o"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{route('course_detail')}}">MSC</a></h3>
                        <p class="card-meta">Technology</p>
                        <div class="card-rating">
                            <span class="badge text-white">4.4/5</span>
                            <span class="review__text">Average</span>
                            <span class="rating__text">(30 Reviews)</span>
                        </div>
                        <div class="card-price d-flex align-items-center justify-content-between">
                            <p>
                                <span class="price__text">Fees:</span>
                                <span class="price__num">$20000</span>
                            </p>
                            <a href="{{route('course_detail')}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item">
                    <div class="card-img">
                        <a href="{{route('course_detail')}}" class="d-block">
                            <img src="{{asset('frontEnd/assets/img/course/course-1.jpg')}}" alt="hotel-img">
                        </a>
                        <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                            <i class="la la-heart-o"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{route('course_detail')}}">Mtech</a></h3>
                        <p class="card-meta">Technology</p>
                        <div class="card-rating">
                            <span class="badge text-white">4.4/5</span>
                            <span class="review__text">Average</span>
                            <span class="rating__text">(30 Reviews)</span>
                        </div>
                        <div class="card-price d-flex align-items-center justify-content-between">
                            <p>
                                <span class="price__text">Fees:</span>
                                <span class="price__num">$202000</span>
                            </p>
                            <a href="{{route('course_detail')}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item">
                    <div class="card-img">
                        <a href="{{route('course_detail')}}" class="d-block">
                            <img src="{{asset('frontEnd/assets/img/course/course-1.jpg')}}" alt="hotel-img">
                        </a>
                        <span class="badge">Featured</span>
                        <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                            <i class="la la-heart-o"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{route('course_detail')}}">Btech</a></h3>
                        <p class="card-meta">Technology</p>
                        <div class="card-rating">
                            <span class="badge text-white">4.4/5</span>
                            <span class="review__text">Average</span>
                            <span class="rating__text">(30 Reviews)</span>
                        </div>
                        <div class="card-price d-flex align-items-center justify-content-between">
                            <p>
                                <span class="price__text">Fees:</span>
                                <span class="price__num">$200000</span>
                            </p>
                            <a href="{{route('course_detail')}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end related-tour-area -->
<!-- ================================
    END RELATE TOUR AREA
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
