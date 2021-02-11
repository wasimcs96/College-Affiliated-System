@extends('frontEnd.layout.master')
@section('content')

<section class="breadcrumb-area bread-bg-9">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title">Blogs</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list">
                        {{-- <ul class="list-items d-flex justify-content-end">
                            <li><a href="index.html">Home</a></li>
                            <li>Blog</li>
                            <li>Blog Sidebar</li>
                        </ul> --}}
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
            <div class="col-lg-12">
                <div class="row">
                    <?php $blogs=App\Models\Blog::orderBy('serial_number', 'ASC')->get();?>
                    @if($blogs->count() > 0)
                    @foreach($blogs as $blog)
                @if($blog->status == 1 ?? '')
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
                    </div><!-- end col-lg-6 -->
                    @endif
                    @endforeach
               <!-- end col-lg-6 -->

@else
<div class="container" style="text-align: center;">
<h2>Currently Unavailable</h2>
</div>
@endif







                </div><!-- end row -->
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-box mt-3 text-center">
                            <button type="button" class="theme-btn"><i class="la la-refresh mr-1"></i>Load More</button>
                            <p class="font-size-13 pt-2">Showing 1 - 12 of 44 Posts</p>
                        </div><!-- end btn-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row --> --}}
            </div><!-- end col-lg-8 -->
            {{-- <div class="col-lg-4">
                <div class="sidebar mb-0">
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Search Post</h3>
                        <div class="contact-form-action">
                            <form action="#">
                                <div class="input-box">
                                    <div class="form-group mb-0">
                                        <input class="form-control pl-3" type="text" placeholder="Type your keywords...">
                                        <button class="search-btn" type="submit"><i class="la la-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Categories</h3>
                        <div class="sidebar-category">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="cat1">
                                <label for="cat1">All <span class="font-size-13 ml-1">(55)</span></label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="cat2">
                                <label for="cat2">Active Adventure Tours <span class="font-size-13 ml-1">(8)</span></label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="cat3">
                                <label for="cat3">Ecotourism <span class="font-size-13 ml-1">(5)</span></label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="cat4">
                                <label for="cat4">Escorted Tours <span class="font-size-13 ml-1">(2)</span></label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="cat5">
                                <label for="cat5">Group Tours <span class="font-size-13 ml-1">(11)</span></label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="cat6">
                                <label for="cat6">Ligula <span class="font-size-13 ml-1">(3)</span></label>
                            </div>
                            <div class="collapse" id="categoryMenu">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="cat7">
                                    <label for="cat7">Family Tours <span class="font-size-13 ml-1">(4)</span></label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="cat8">
                                    <label for="cat8">City Trips <span class="font-size-13 ml-1">(5)</span></label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="cat9">
                                    <label for="cat9">National Parks Tours <span class="font-size-13 ml-1">(3)</span></label>
                                </div>
                                 <div class="custom-checkbox">
                                    <input type="checkbox" id="cat10">
                                    <label for="cat10">Vacations <span class="font-size-13 ml-1">(3)</span></label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="cat11">
                                    <label for="cat11">Early booking <span class="font-size-13 ml-1">(7)</span></label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="cat12">
                                    <label for="cat12">Last minute <span class="font-size-13 ml-1">(2)</span></label>
                                </div>
                            </div><!-- end collapse -->
                            <a class="btn-text" data-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
                                <span class="show-more">Show More <i class="la la-angle-down"></i></span>
                                <span class="show-less">Show Less <i class="la la-angle-up"></i></span>
                            </a>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <div class="section-tab section-tab-2 pb-3">
                            <ul class="nav nav-tabs justify-content-center" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">
                                       Recent
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="false">
                                        Popular
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">
                                        New
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane " id="recent" role="tabpanel" aria-labelledby="recent-tab">
                                <div class="card-item card-item-list recent-post-card">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img4.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">Pack wisely before traveling</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                                <div class="card-item card-item-list recent-post-card">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img5.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">Change your place and get the fresh air</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                                <div class="card-item card-item-list recent-post-card mb-0">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img6.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">Introducing this amazing city</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                                <div class="card-item card-item-list recent-post-card">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img7.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">The Castle on the Cliff: Majestic, Magic</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                                <div class="card-item card-item-list recent-post-card">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img8.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">Change your place and get the fresh air</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                                <div class="card-item card-item-list recent-post-card mb-0">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img9.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">All Aboard the Rocky Mountaineer</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane " id="new" role="tabpanel" aria-labelledby="new-tab">
                                <div class="card-item card-item-list recent-post-card">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img7.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">The Castle on the Cliff: Majestic, Magic</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                                <div class="card-item card-item-list recent-post-card">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img8.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">Change your place and get the fresh air</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                                <div class="card-item card-item-list recent-post-card mb-0">
                                    <div class="card-img">
                                        <a href="{{route('blog_detail')}}" class="d-block">
                                            <img src="{{asset('frontEnd/assets/images/small-img9.jpg')}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('blog_detail')}}">All Aboard the Rocky Mountaineer</a></h3>
                                        <p class="card-meta">
                                            <span class="post__date"> 1 March, 2020</span>
                                            <span class="post-dot"></span>
                                            <span class="post__time">3 Mins read</span>
                                        </p>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end tab-pane -->
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Archives</h3>
                        <div class="sidebar-list">
                            <ul class="list-items">
                                <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">June 2015</a></li>
                                <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">May 2016</a></li>
                                <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">April 2017</a></li>
                                <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">February 2019</a></li>
                            </ul>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Tag Cloud</h3>
                        <ul class="tag-list">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Tour</a></li>
                            <li><a href="#">Nature</a></li>
                            <li><a href="#">Island</a></li>
                            <li><a href="#">Parks</a></li>
                            <li><a href="#">Cruise</a></li>
                            <li><a href="#">Mountains</a></li>
                            <li><a href="#">Tulips</a></li>
                            <li><a href="#">Museums</a></li>
                            <li><a href="#">Beaches</a></li>
                            <li><a href="#">Cultural</a></li>
                            <li><a href="#">National</a></li>
                        </ul>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">About us</h3>
                        <div class="sidebar-about">
                            <div class="sidebar-about-img">
                                <img src="{{asset('frontEnd/assets/images/destination-img3.jpg')}}" alt="">
                                <p class="font-size-28 font-weight-bold text-white">Digital Colf</p>
                            </div>
                            <p class="pt-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem eaque ipsa quae ab illo inventore incididunt ut labore et dolore magna</p>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Follow & Connect</h3>
                        <ul class="social-profile">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div><!-- end sidebar-widget -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 --> --}}
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-90px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                        <i class="la la-phone"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Need Help? Contact us</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                        <i class="la la-money"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Payments</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                        <i class="la la-times"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Cancel Policy</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
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
@endsection
