@extends('frontEnd.layout.master')
@section('content')
<section class="breadcrumb-area bread-bg-5">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title">How Can We Help You?</h2>
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="contact-form-action pt-4">
                                    <form action="#">
                                        <div class="form-group mb-0">
                                            <input class="form-control pl-3" type="text" name="text" placeholder="Have a question? Ask or enter search term">
                                            <button class="search-btn" type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="trending-search font-size-14 pt-2">
                                    <span class="text-white font-weight-bold mr-1">Try:</span>
                                    <a href="#">getting started</a>
                                </div>
                            </div>
                        </div> --}}
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->


<section class="faq-area section-bg padding-top-100px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Frequently Asked Questions</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->

        <?php $faqs=App\Models\Page::where('page_type',1)->get() ?>
        @if($faqs->count() > 0)
        {{-- {{dd($faqs)}} --}}
        <div class="row padding-top-60px">
            @foreach($faqs as $faq)

            <div class="col-lg-6">
                <div class="faq-item mb-5">
                    <h3 class="title font-weight-bold">{{$faq->title}}</h3>
                    <ul class="toggle-menu list-items list--items-2 pt-4">
                        <li>
                            <a href="#" class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                {!! $faq->short_description !!}
                                <i class="la la-angle-down"></i>
                            </a>
                            <ul class="toggle-drop-menu pt-2">
                                <li class="line-height-26">{!! $faq->description !!}</li>
                                <li class="line-height-26"><img src="{{asset($faq->banner)}}" height="150px" width="190px"></li>
                            </ul>
                        </li>
                    </ul>

                </div><!-- end faq-item -->
            </div><!-- end col-lg-6 -->
            @endforeach

        </div><!-- end row -->
        @else
        <div class="container pt-5" style="text-align: center;">
            <h2>Currently Unavailable</h2>
            </div>
        @endif
    </div><!-- end container -->
</section>

<section class="cta-area cta-bg-2 bg-fixed padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="sec__title font-size-30 text-white">Couldn't Find a Solution? <a href="{{route('contact')}}"> Contact Us</a></h2>
                    {{-- <p class="sec__desc text-white pt-1">.</p> --}}
                </div><!-- end section-heading -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                {{-- <div class="btn-box btn--box text-right">
                    <a href="#" class="theme-btn border-0">Submit a Ticket</a>
                </div><!-- end btn-box --> --}}
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
