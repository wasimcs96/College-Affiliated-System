@extends('frontEnd.layout.master')
@section('content')

<section class="user-area padding-top-100px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h3 class="title font-size-24">Consultant  Information</h3>
                <div class="card-item user-card card-item-list mt-4 mb-0">
                    <div class="card-img">
                        @if(isset($consultant->userConsultant->profile_image) && file_exists($consultant->userConsultant->profile_image))
                                                <img style=" width: 152px;
                                                height: 115px;" src="{{$consultant->userConsultant->profile_image}}" alt="">
                                                    @else
                                                    <img style=" width: 298px; height: 276px;" src="{{asset('frontEnd/assets/images/defaultuser.png')}}" >
                                                    @endif
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{$consultant->first_name}} {{$consultant->last_name}}</h3>
                        <p class="card-meta">Member since : {{$consultant->created_at->format('Y')}}</p>
                        <div class="d-flex justify-content-between pt-3">
                            <ul class="list-items list-items-2 flex-grow-1">
                                <li><span>Email:</span>{{$consultant->email}}</li>
                                <li><span>Mobile:</span>{{$consultant->mobile}}</li>
                                {{-- <li><span>Paypal Email:</span>contact@techydevs.com</li> --}}
                                {{-- <li><span>Home Airport:</span>Knoxville, TN 37920, USA</li> --}}
                                <li><span>Address:</span>{{$consultant->address}}</li>
                                <li><span>Website:</span><a href="#">{{$consultant->consultant->website}}</a></li>
                                <a href="{{route('consultant_book',['id'=>$consultant->id])}}"> <span class="btn btn-primary" style="margin-top: 10px;">Book Now</span></a></li>
                            </ul>
                             {{-- <ul class="list-items flex-grow-1">
                                <li><h3 class="title">Verifications</h3></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Phone</span><span class="theme-btn theme-btn-small theme-btn-rgb theme-btn-danger-rgb">Not verified</span></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Email</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">ID Card</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Travel Certificate</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                                <li class="d-flex justify-content-between align-items-center">
                                <a href="{{route('consultant.book')}}"> <span class="btn btn-primary" style="margin-top: 10px;">Book Now</span></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-70px">
            <div class="col-lg-9">
                <h3 class="title font-size-24">Affiliated University</h3>
                <div class="section-tab section-tab-3 pt-4 pb-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="my-hotel-tab" data-toggle="tab" href="#my-hotel" role="tab" aria-controls="my-hotel" aria-selected="true">
                                Managment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="my-tour-tab" data-toggle="tab" href="#my-tour" role="tab" aria-controls="my-tour" aria-selected="false">
                                Technology
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="my-activity-tab" data-toggle="tab" href="#my-activity" role="tab" aria-controls="my-activity" aria-selected="false">
                                Arts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="my-car-tab" data-toggle="tab" href="#my-car" role="tab" aria-controls="my-car" aria-selected="false">
                                Commerce
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="my-flight-tab" data-toggle="tab" href="#my-flight" role="tab" aria-controls="my-flight" aria-selected="false">
                                Science
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="my-review-tab" data-toggle="tab" href="#my-review" role="tab" aria-controls="my-review" aria-selected="false">
                                Reviews
                            </a>
                        </li> --}}
                    </ul>
                </div><!-- end section-tab -->
                <div class="tab-content margin-bottom-40px" id="myTabcontent">
                    <div class="tab-pane fade show active" id="my-hotel" role="tabpanel" aria-labelledby="my-hotel-tab">
                        <div class="my-service-list">
                            <div class="card-item card-item-list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="hotel-img">
                                    </a>
                                    <span class="badge">Featured </span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">Rtu</a></h3>
                                    <p class="card-meta">Rajasthan</p>
                                    <div class="card-rating d-flex align-items-center pt-1">
                                        <span class="rating__text">University star</span>
                                        <span class="ratings d-flex align-items-center mx-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text">5 of 5</span>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>

                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="hotel-img">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">BTU</a></h3>
                                    <p class="card-meta">Bombay</p>
                                    <div class="card-rating d-flex align-items-center pt-1">
                                        <span class="rating__text">University star</span>
                                        <span class="ratings d-flex align-items-center mx-2">
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                        </span>
                                        <span class="rating__text">0 of 5</span>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>

                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="hotel-img">
                                    </a>
                                    <span class="badge">Featured</span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">MIT</a></h3>
                                    <p class="card-meta">USA</p>
                                    <div class="card-rating d-flex align-items-center pt-1">
                                        <span class="rating__text">University star</span>
                                        <span class="ratings d-flex align-items-center mx-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text">5 of 5</span>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>

                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="hotel-img">
                                    </a>
                                    <span class="badge">Featured</span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">Kanpur</a></h3>
                                    <p class="card-meta">Kanpur</p>
                                    <div class="card-rating d-flex align-items-center pt-1">
                                        <span class="rating__text">University star</span>
                                        <span class="ratings d-flex align-items-center mx-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text">5 of 5</span>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>

                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end my-service-list -->
                        <nav aria-label="Page navigation example" class="pt-4">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade" id="my-tour" role="tabpanel" aria-labelledby="my-tour-tab">
                        <div class="my-service-list">
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="Destination-img">
                                    </a>
                                    <span class="badge">Featured</span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">Bombay</a></h3>
                                    <p class="card-meta">Manhattan</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>

                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Travellers:</span>30 people</li>
                                        <li><span>Date:</span>12 Jun 2020</li>
                                        <li><span>Booking details:</span> 0 user booked</li> --}}
                                    </ul>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="Destination-img">
                                    </a>
                                    {{-- <span class="badge badge-ribbon">Save 39%</span> --}}
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">hgjhgjggj</a></h3>
                                    <p class="card-meta">jjhgjgjg</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(3 Comments)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Travellers:</span>10 people</li>
                                        <li><span>Booking details:</span> 0 user booked</li> --}}
                                    </ul>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$950.00</span> --}}
                                            {{-- <span class="price__num before-price color-text-3">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"alt="Destination-img">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">gfhfhghkjhjkhj</a></h3>
                                    <p class="card-meta">bghghghgh</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(3 Comments)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Travellers:</span>30 people</li>
                                        <li><span>Date:</span>12 Jun 2020</li>
                                        <li><span>Booking details:</span> 0 user booked</li> --}}
                                    </ul>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"alt="Destination-img">
                                    </a>
                                    {{-- <span class="badge">Featured</span> --}}
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">vghhgfhgffgfghfghfhgfh</a></h3>
                                    <p class="card-meta">Champs</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(1 Comments)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Travellers:</span>30 people</li>
                                        <li><span>Date:</span>12 Jun 2020</li>
                                        <li><span>Booking details:</span> 0 user booked</li> --}}
                                    </ul>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end my-service-list -->
                        <nav aria-label="Page navigation example" class="pt-4">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade" id="my-activity" role="tabpanel" aria-labelledby="my-activity-tab">
                        <div class="my-service-list">
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"alt="Destination-img">
                                    </a>
                                    <span class="badge">Featured</span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">Manhattan Skyline</a></h3>
                                    <p class="card-meta">hgjghhgjgghjgj</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(3 Reviews)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Activity Type:</span>Specific Date</li> --}}
                                    </ul>
                                    {{-- <p class="card-meta">Follow the coming-of-age tale of lion cub Simba in this vibrant and colorful family-friendly ...</p> --}}
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"alt="Destination-img">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">Bbhgjhjgj</a></h3>
                                    <p class="card-meta">Paris France</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(3 Reviews)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Activity Type:</span>Daily Activity</li> --}}
                                    </ul>
                                    {{-- <p class="card-meta">Follow the coming-of-age tale of lion cub Simba in this vibrant and colorful family-friendly ...</p> --}}
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="Destination-img">
                                    </a>
                                    <span class="badge">Featured</span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">hjgjjghgView</a></h3>
                                    <p class="card-meta">New York</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(3 Reviews)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Activity Type:</span>Specific Date</li> --}}
                                    </ul>
                                    {{-- <p class="card-meta">Follow the coming-of-age tale of lion cub Simba in this vibrant and colorful family-friendly ...</p> --}}
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}"alt="Destination-img">
                                    </a>
                                    {{-- <span class="badge badge-ribbon">Save 39%</span> --}}
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">gjhgjhgjgjg</a></h3>
                                    <p class="card-meta">New York</p>
                                    <div class="card-rating d-flex align-items-center pt-0">
                                        <span class="ratings d-flex align-items-center mr-2">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="rating__text mr-2">4.5 of 5</span>
                                        <span class="rating__text">(3 Reviews)</span>
                                    </div>
                                    <ul class="list-items list-items-2">
                                        {{-- <li><span>Activity Type:</span>Specific Date</li> --}}
                                    </ul>
                                    {{-- <p class="card-meta">Follow the coming-of-age tale of lion cub Simba in this vibrant and colorful family-friendly ...</p> --}}
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$950.00</span> --}}
                                            {{-- <span class="price__num before-price color-text-3">$989.00</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end my-service-list -->
                        <nav aria-label="Page navigation example" class="pt-4">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade " id="my-car" role="tabpanel" aria-labelledby="my-car-tab">
                        <div class="my-service-list">
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                    <span class="badge">Bestseller</span>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">dfgdfgdfgdfg</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">werwerwerwerwer</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>

                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">Bbhgjhjgj</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">jggjjgjhgjhghjr</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                    <span class="badge">Bestseller</span>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">gfghfhghfhgfhfhf</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">ggfffgfgfg</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="{{route('university_detail',['id'=>5])}}" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">ghfhfhgfhfhghgh</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">gghfhfffhgfhg</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end my-service-list -->
                        <nav aria-label="Page navigation example" class="pt-4">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade " id="my-car" role="tabpanel" aria-labelledby="my-car-tab">
                        <div class="my-service-list">
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="car-single.html" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                    <span class="badge">Bestseller</span>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">jkhkhkjhkhjkh</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">ggfgfghfghfh</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="car-single.html" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">hjgjhgjhghjh</p>
                                    <h3 class="card-title"><a href="car-single.html">hjgjhhghgghgh</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="car-single.html" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                    <span class="badge">Bestseller</span>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">nvbmnmnbmnbmn</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">ghgjhgjghhgjr</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                            <div class="card-item car-card card-item-list">
                                <div class="card-img padding-top-40px">
                                    <a href="car-single.html" class="d-block">
                                        <img src="{{asset('frontEnd/assets/img/partner/img-2.jpg')}}" alt="car-img" class="h-auto">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-meta">fhgfffghfh</p>
                                    <h3 class="card-title"><a href="{{route('university_detail',['id'=>5])}}">fghfhgfh</a></h3>
                                    <div class="card-rating">
                                        <span class="badge text-white">4.4/5</span>
                                        <span class="review__text">Average</span>
                                        <span class="rating__text">(30 Reviews)</span>
                                    </div>
                                    <div class="card-attributes">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Courses"><i class="la la-users"></i><span>4</span></li>
                                            <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Students"><i class="la la-suitcase"></i><span>2</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <p>
                                            {{-- <span class="price__from">Price from</span>
                                            <span class="price__num">$23.00</span>
                                            <span class="price__text">Per day</span> --}}
                                        </p>
                                        <a href="{{route('university_detail',['id'=>5])}}" class="theme-btn theme-btn-small">Book Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end my-service-list -->
                        <nav aria-label="Page navigation example" class="pt-4">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-nav" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade" id="my-review" role="tabpanel" aria-labelledby="my-review-tab">
                        <div class="my-service-list">
                            <div class="review-bars padding-bottom-30px">
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
                            <div class="section-block"></div>
                            <div class="review-box padding-top-45px">
                                <h3 class="title font-size-20">List of Reviews</h3>
                                <div class="comments-list padding-top-40px">
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <a href="#" class="d-block">
                                                <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team8.jpg')}}">
                                            </a>
                                            <h3 class="title font-size-16 pt-3">Bob Marly</h3>
                                            <a href="#" class="color-text font-size-14">30 Reviews</a>
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__meta font-size-18 pb-2">"Very good"</h3>
                                                <h3 class="comment__author font-size-15 font-weight-medium">Review for <a href="#" class="color-text">Grand Plaza Apartments</a></h3>
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
                                            <p class="comment-content font-size-15 line-height-24">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis eveniet exercitationem fuga id laborum nostrum numquam quo repellendus similique.
                                            </p>
                                            <div class="comment-reply">
                                                <div class="reviews-reaction">
                                                    <span class="font-size-15 mr-1">Was this review helpful?</span>
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <a href="#" class="d-block">
                                                <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team9.jpg')}}">
                                            </a>
                                            <h3 class="title font-size-16 pt-3">Josh Purdial</h3>
                                            <a href="#" class="color-text font-size-14">44 Reviews</a>
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__meta font-size-18 pb-2">"Excellent"</h3>
                                                <h3 class="comment__author font-size-15 font-weight-medium">Review for <a href="#" class="color-text">Park Hyatt Paris-Vendome</a></h3>
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
                                            <p class="comment-content font-size-15 line-height-24">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis eveniet exercitationem fuga id laborum nostrum numquam quo repellendus similique.
                                            </p>
                                            <div class="comment-reply">
                                                <div class="reviews-reaction">
                                                    <span class="font-size-15 mr-1">Was this review helpful?</span>
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <a href="#" class="d-block">
                                                <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team10.jpg')}}">
                                            </a>
                                            <h3 class="title font-size-16 pt-3">Adi Purdila</h3>
                                            <a href="#" class="color-text font-size-14">12 Reviews</a>
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__meta font-size-18 pb-2">"Amazing"</h3>
                                                <h3 class="comment__author font-size-15 font-weight-medium">Review for <a href="#" class="color-text">Wellington Hotel</a></h3>
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
                                            <p class="comment-content font-size-15 line-height-24">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis eveniet exercitationem fuga id laborum nostrum numquam quo repellendus similique.
                                            </p>
                                            <div class="comment-reply">
                                                <div class="reviews-reaction">
                                                    <span class="font-size-15 mr-1">Was this review helpful?</span>
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <a href="#" class="d-block">
                                                <img class="avatar__img" alt="" src="{{asset('frontEnd/assets/images/team11.jpg')}}">
                                            </a>
                                            <h3 class="title font-size-16 pt-3">Markus nai</h3>
                                            <a href="#" class="color-text font-size-14">23 Reviews</a>
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__meta font-size-18 pb-2">"Good"</h3>
                                                <h3 class="comment__author font-size-15 font-weight-medium">Review for <a href="#" class="color-text">The Pearl Hotel NewYork City</a></h3>
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
                                            <p class="comment-content font-size-15 line-height-24">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis eveniet exercitationem fuga id laborum nostrum numquam quo repellendus similique.
                                            </p>
                                            <div class="comment-reply">
                                                <div class="reviews-reaction">
                                                    <span class="font-size-15 mr-1">Was this review helpful?</span>
                                                    <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
                                                    <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end comments-list -->
                            </div>
                            <nav aria-label="Page navigation example" class="pt-4">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                                    <li class="page-item active">
                                        <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link page-link-nav" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div><!-- end tab-pane -->
                </div>
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="review-summary mt-2 section-bg">
                    <p>Average Rating</p>
                    <h2>4.5<span>/5</span></h2>
                    <span class="ratings d-flex justify-content-center align-items-center font-size-17">
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star-half-alt"></i>
                    </span>
                    <span class="font-size-14">(Based on 199 reviews)</span>
                </div><!-- end review-summary -->
                <div class="form-box margin-top-30px mb-0">
                    <div class="form-title-wrap">
                        <h3 class="title">Contact Partner</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="post">
                                <div class="input-box">
                                    <label class="label-text">Your Name</label>
                                    <div class="form-group">
                                        <span class="la la-user form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Your Email</label>
                                    <div class="form-group">
                                        <span class="la la-envelope-o form-icon"></span>
                                        <input class="form-control" type="email" name="email" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Message</label>
                                    <div class="form-group">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="theme-btn">Send Message</button>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
