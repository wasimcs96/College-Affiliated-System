@extends('frontEnd.layout.master')
@section('per_page_style')
<style>
    a {
        color: red;
        fo
    }

    a:hover {
        color: black;
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
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
        </svg>
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
            <div class="col-lg-12 p-0">
                <div class="card-item blog-card blog-card-layout-2 blog-single-card mb-5" style="padding: 20px;">
                    <div class="card-img before-none">
                        {{-- <img src="{{asset('frontEnd/assets/images/img20.jpg')}}" alt="blog-img"> --}}
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="post-categories">
                            <a href="#" class="badge">Banks</a>
                            <a href="#" class="badge">Loan</a>
                        </div>
                        <h3 class="card-title font-size-28">Educational Loan</h3>

                        <div class="section-block"></div>
                        <p class="card-text py-3">Vidya Lakshmi is a first of its kind portal for students seeking
                            Education Loan. This portal has been developed under the guidance of Department of Financial
                            Services, (Ministry of Finance) , Department of Higher Education (Ministry of Human Resource
                            Development) and Indian Banks Association (IBA).The portal has been developed and being
                            maintained by NSDL e-Governance Infrastructure Limited. Students can view, apply and track
                            the education loan applications to banks anytime, anywhere by accessing the portal. The
                            portal also provides linkages to National Scholarship Portal. Click Here to Apply for an
                            Educational Loan</p>
                        <p class="card-text pb-3">Suspendisse ullamcorper lacus et commodo laoreet. Sed sodales aliquet
                            felis, quis volutpat massa imperdiet in. Praesent rutrum malesuada risus, ullamcorper
                            pretium tortor</p>

                        <div class="photo-block-gallery">
                            <h3 class="title pb-2">Eligibility</h3>
                            <p class="card-text pb-4"><b>Repayment of an education loan is deductible under section 80E
                                    of the Income Tax Act. The yearly limit for deduction is Rs. 40,000 (for both the
                                    principal and the interest). Only loans taken for higher education - full time
                                    studies in any graduate or post-graduate, professional, and pure and applied science
                                    courses - may claim deduction. The deduction will be available for a maximum of
                                    eight years starting from the day you start repaying.</b></p>


                        </div>

                        <div class="photo-block-gallery">
                            <h3 class="title pb-2">Pre-approvals</h3>
                            <p class="card-text pb-4"><b>Repayment of an education loan is deductible under section 80E
                                    of the Income Tax Act. The yearly limit for deduction is Rs. 40,000 (for both the
                                    principal and the interest). Only loans taken for higher education - full time
                                    studies in any graduate or post-graduate, professional, and pure and applied science
                                    courses - may claim deduction. The deduction will be available for a maximum of
                                    eight years starting from the day you start repaying.</b></p>

                        </div>

                        <div class="photo-block-gallery">
                            <h3 class="title pb-2">Benefits</h3>
                            <p class="card-text pb-4"><b>Repayment of an education loan is deductible under section 80E
                                    of the Income Tax Act. The yearly limit for deduction is Rs. 40,000 (for both the
                                    principal and the interest). Only loans taken for higher education - full time
                                    studies in any graduate or post-graduate, professional, and pure and applied science
                                    courses - may claim deduction. The deduction will be available for a maximum of
                                    eight years starting from the day you start repaying.</b></p>

                        </div>

                        <div class="photo-block-gallery">
                            <h3 class="title pb-2">Documents</h3>
                            <p class="card-text pb-4"><b>Repayment of an education loan is deductible under section 80E
                                    of the Income Tax Act. The yearly limit for deduction is Rs. 40,000 (for both the
                                    principal and the interest). Only loans taken for higher education - full time
                                    studies in any graduate or post-graduate, professional, and pure and applied science
                                    courses - may claim deduction. The deduction will be available for a maximum of
                                    eight years starting from the day you start repaying.</b></p>
                        </div>



                        <div class="post-tag-wrap  align-items-center justify-content-between py-4">
                            <div id="itinerary" class="page-scroll">
                                <div class="section-block margin-top-40px"></div>
                                <div class="single-content-item padding-top-40px padding-Rbottom-40px">
                                    <h3 class="title font-size-20">Loan</h3>
                                    <div class="table-form table-responsive padding-top-30px">
                                        <table class="table">
                                            <thead>
                                                <tr style="background-color: rgba(128, 137, 150, 0.1);">
                                                    <th class="fontdicipline " scope="col">Provider</th>
                                                    <th class="fontdicipline "scope="col">Interest Rate</th>
                                                    <th class="fontdicipline "scope="col">Tenure</th>
                                                    <th class="fontdicipline "scope="col">Processing Fees</th>
                                                    <th class="fontdicipline "scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($loans as $loan)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="table-content d-flex align-items-center">
                                                            <h3 class="tablefont title">{{$loan->provider ?? ''}}</h3>
                                                        </div>
                                                    </th>
                                                    {{-- <td>
                                                    @if($course->type == 0) UG @endif
                                                    @if($course->type == 1) PG @endif
                                                    @if($course->type == 2) Diploma @endif
                                                   </td> --}}
                                                    <td class="tablefont"> {{$loan->interest_rate ?? ''}}</td>
                                                    <td class="tablefont"> {{$loan->tenure ?? ''}}</td>
                                                    <td class="tablefont">₹ {{$loan->processing_fees ?? ''}}</td>
                                                    {{-- <td>@if(isset($course->start_date)) {{ Carbon\Carbon::parse($course->start_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}
                                                    @else N/A @endif</td>
                                                    <td>@if(isset($course->end_date)){{ Carbon\Carbon::parse($course->end_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}@else
                                                        N/A @endif</td> --}}

                                                    <td>
                                                        <div>
                                                            <a data-toggle="modal" data-target="#exampleModal" class="tablefont btn btn-primary text-light">Detail<i
                                                                    class="tablefont las la-angle-double-right"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div><!-- end single-content-item -->
                                <div class="section-block"></div>
                            </div>

                        </div>


                        <div class="section-block"></div>
                        <div class="post-navigation d-flex justify-content-between py-4">
                            <p><span style="color: red"><b>Disclaimer:</b></span>Since the rules, regulations,
                                eligibility conditions, repayments and interests rates etc are revised by the banks from
                                time to time in keeping pace with the changing capital market conditions, students and
                                parents are advised to thoroughly check the terms and conditions of educational loan
                                scheme on offer at the time of application.</p>
                        </div>
                        <div class="section-block"></div>

                    </div>
                </div><!-- end card-item -->


            </div><!-- end col-lg-8 -->
            <!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->

    <!--  Model section -->
    <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <input class="form-control" value="1" name="type"  hidden>
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
    {{-- <i class="la la-angle-up" title="Go top"></i> --}}
    <div>
    <lottie-player src="{{asset('frontEnd/assets/json/34115-rocket-lunch.json')}}"  background="transparent"  speed="1"  style="width: 5rem; height: 5rem;"  loop  autoplay></lottie-player>
    </div>
</div>

<script>
    $(function() {
        $('#exampleModal').modal({
            show: true
        });
    });


    </script>

@endsection
