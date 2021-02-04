@extends('frontEnd.layout.master')
@section('per_page_style')
<style>
a{
    color:red;
    fo
}
a:hover{
    color:black;
}
</style>
@endsection
@section('content')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-9">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title">Loan Details</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list">
                        <ul class="list-items d-flex justify-content-end">
                            <li><a href="index.html">Home</a></li>
                            <li>Banks</li>
                            <li>Loan Details</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
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
            <div class="col-lg-8">
                <div class="card-item blog-card blog-card-layout-2 blog-single-card mb-5">
                    <div class="card-img before-none">
                        {{-- <img src="{{asset('frontEnd/assets/images/img20.jpg')}}" alt="blog-img"> --}}
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="post-categories">
                            <a href="#" class="badge">Banks</a>
                            <a href="#" class="badge">Loan</a>
                        </div>
                        <h3 class="card-title font-size-28">Educational Loan</h3>
                        <p class="card-meta pb-3">
                            <span class="post__author">By <a href="#" class="text-gray">John Doe</a></span>
                            <span class="post-dot"></span>
                            <span class="post__date"> 1 January, 2020</span>
                            <span class="post-dot"></span>
                            <span class="post__time"><a href="#" class="text-gray">4 Comments</a></span>
                            <span class="post-dot"></span>
                            <span class="post__time"><a href="#" class="text-gray">202 Likes</a></span>
                        </p>
                        <div class="section-block"></div>
                        <p class="card-text py-3">Vidya Lakshmi is a first of its kind portal for students seeking Education Loan. This portal has been developed under the guidance of Department of Financial Services, (Ministry of Finance) , Department of Higher Education (Ministry of Human Resource Development) and Indian Banks Association (IBA).The portal has been developed and being maintained by NSDL e-Governance Infrastructure Limited. Students can view, apply and track the education loan applications to banks anytime, anywhere by accessing the portal. The portal also provides linkages to National Scholarship Portal. Click Here to Apply for an Educational Loan</p>
                        <p class="card-text pb-3">Suspendisse ullamcorper lacus et commodo laoreet. Sed sodales aliquet felis, quis volutpat massa imperdiet in. Praesent rutrum malesuada risus, ullamcorper pretium tortor</p>
                        <div class="photo-block-gallery">
                            <h3 class="title pb-2">Tax Benefits</h3>
                            <p class="card-text pb-4"><b>Repayment of an education loan is deductible under section 80E of the Income Tax Act. The yearly limit for deduction is Rs. 40,000 (for both the principal and the interest). Only loans taken for higher education - full time studies in any graduate or post-graduate, professional, and pure and applied science courses - may claim deduction. The deduction will be available for a maximum of eight years starting from the day you start repaying.</b></p>
                            Equitable Access to quality higher education has been a concern of the University Grants Commission. To this purpose the Commission, besides encouraging colleges and universities to provide for liberal financial support to the meritorious but needy students, has also been instrumental in educational loan scheme. The Reserve Bank of India (RBI) has issued guidelines in this regard to all commercial banks. A large number of banks have already launched educational loan schemes. Provided below are links to the respective website of individual banks offering such facilities.

                        </div>



                        <div class="post-tag-wrap d-flex align-items-center justify-content-between py-4" >
                            <ol>
                                <li><a href="#"><b> Allahabad Bank</b></a><br>
                                    <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                     </li>
                                     <br>
                                         <li><a href="#"><b> Allahabad Bank</b></a><br>
                                          <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                           </li>
                                           <br>
                                           <li><a href="#"><b> Allahabad Bank</b></a><br>
                                            <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                             </li>
                                             <br>
                                             <li><a href="#"><b> Allahabad Bank</b></a><br>
                                                <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                                 </li>
                                                 <br>
                                                 <li><a href="#"><b> Allahabad Bank</b></a><br>
                                                    <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                                     </li>
                                                     <br>
                                                     <li><a href="#"><b> Allahabad Bank</b></a><br>
                                                        <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                                         </li>
                                                         <br>
                                                         <li><a href="#"><b> Allahabad Bank</b></a><br>
                                          <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                           </li>
                                           <br>
                                           <li><a href="#"><b> Allahabad Bank</b></a><br>
                                            <a href="#">  <i class="las la-chevron-right"></i> Educational Loan Scheme</a><a href="#"><i class="las la-chevron-right"></i>  Application Form</a>
                                             </li>
                                             <br>
                            </ol>

                        </div>


                        <div class="section-block"></div>
                        <div class="post-navigation d-flex justify-content-between py-4">
                           <p><span style="color: red"><b>Disclaimer:</b></span>Since the rules, regulations, eligibility conditions, repayments and interests rates etc are revised by the banks from time to time in keeping pace with the changing capital market conditions, students and parents are advised to thoroughly check the terms and conditions of educational loan scheme on offer at the time of application.</p>
                        </div>
                        <div class="section-block"></div>

                    </div>
                </div><!-- end card-item -->


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
                                                {{-- <a href="{{route('consultant_detail')}}" class="btn btn-primary text-light">Book Now</a> --}}
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
                                                {{-- <a href="{{route('consultant_detail')}}" class="btn btn-primary text-light">Book Now</a> --}}
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
                                                {{-- <a href="{{route('consultant_detail')}}" class="btn btn-primary text-light">Book Now</a> --}}
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
                                                {{-- <a href="{{route('consultant_detail')}}" class="btn btn-primary text-light">Book Now</a> --}}
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
                  <!-- end sidebar-widget -->
                  <!-- end sidebar-widget -->
                   <!-- end sidebar-widget -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->


<!-- ================================
    START CTA AREA
================================= -->
<!-- end cta-area -->
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
