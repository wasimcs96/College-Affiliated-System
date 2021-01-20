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
                                                height: 115px;" src="{{($consultant->userConsultant->profile_image)}}" alt="">
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
                                <li><span>About Me:</span>{{$consultant->consultant->about_me}}</li>

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
                {{-- <div class="section-tab section-tab-3 pt-4 pb-5">


                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link " id="countryId" country_id="{"  role="tab" href="javascript:void(0)" aria-controls="country" aria-selected="true">

                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div><!-- end section-tab --> --}}

            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <!-- end review-summary -->
                <!-- end form-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<section class="card-area section">
    <div class="container">
        <div class="row">
            <?php ?>
            @foreach($consultantUniversity as $university)
            {{-- {{dd($university->userUniversity)}} --}}
            {{-- @if($university->isUniversity())
            @if($university->universityConsultant) --}}


            <div class="col-lg-4 responsive-column">
                <div class="card-item car-card border">
                    <div class="card-img"  style="
                    width: 368px;
                    height: 212px;
                ">
                    <a href="{{route('university_detail',['id'=>$university->university_id])}}" class="d-block">


                            @if(isset($university->userUniversity->profile_image) && file_exists($university->userUniversity->profile_image))
                            <img style=" width=368px; height=213px;" src="{{asset($university->userUniversity->profile_image)}}" alt="">
                                @else
                                <img style=" width: 368px; height: 213px;" src="{{asset('frontEnd/assets/images/university.jpg')}}" >
                                @endif
                        </a>
                        {{-- <span class="badge">Top Ranked</span> --}}
                        {{-- <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                            <i class="la la-heart-o"></i>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <p class="card-meta">
                            @if(isset($university->userUniversity->university->type))
                             @if($university->userUniversity->university->type==0)
                        Private
                    @else
                    Govenment</p>
                    @endif
                    @endif

                        <h3 class="card-title"><a href="{{route('university_detail',['id'=>$university->university_id])}}">
                            {{$university->userUniversity->university->university_name ?? ''}}</a></h3>
                        <div class="card-rating">
                            <span class="badge text-white">4.4/5</span>
                            <span class="review__text">Average</span>
                            <span class="rating__text">(30 Reviews)</span>
                        </div>
                        <div class="card-attributes">
                            <ul class="d-flex align-items-center">
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Available Courses"><i class="las la-book"></i><span>
                                <?php $coursecount = App\Models\UniversityCourse::where('user_id',$university->university_id)->count()?>
                                {{$coursecount}}
                            </span></li>
                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Consultant"><i class="la la-users"></i><span>
                                    <?php $consultantcount = App\Models\universityConsultant::where('university_id',$university->university_id)->count()?>
                                {{$consultantcount}}
                                </span></li>
                            </ul>
                        </div>
                        <div class="card-price d-flex align-items-center justify-content-between">
                            {{-- <p>
                                <span class="price__num">$2300</span>
                                <span class="price__text">Total fees</span>
                            </p> --}}
                            <a href="{{route('university_detail',['id'=>$university->university_id])}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div>
{{-- @endif
@endif --}}

            @endforeach

        </div>
        <nav aria-label="Page navigation example" class="pt-4">
            <ul class="pagination"  style="
            justify-content: center; padding-bottom: 41px;">
                {{-- <li class="page-item">
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
                    <a class="page-link page-link-nav" href="" aria-label="Next">
                        <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li> --}}
                {{$consultantUniversity->links()}}
            </ul>
        </nav>
    </div>
</section>
@endsection
@section('per_page_style')
<style>
.pagination > li > a{
    border-radius: 18px;
    margin-left: 16px;

}
.pagination > li > span {
    color: green; // use your own color here
    border-radius: 18px;
    margin-left: 16px;
}
.pagination{
    border-radius: 18px;
    margin-left: 16px;
}
.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span{
    border-radius: 18px;
    margin-left: 16px;
}
.pagination > .active > span:focus,
.pagination > .active > span:hover {

}
</style>

@endsection

@section('per_page_script')
<script>

    var universitycountry='';
     $(document).on('click', '#countryId', function ()
 {
    universitycountry=$(this).attr('country_id');
 console.log(universitycountry);
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });
            //  $(".invalid-feedback").children("strong").text("");
            //  $("#basic-form5 input").removeClass("is-invalid");
             $.ajax({
                     type: "post",
                     url: "{{route('consultant.front.countryuniveristy')}}",
                     data: {universitycountry:universitycountry},
                     success: function (result) {
                        console.log(result);
                        // $('#showUniversity').hide();
                        $('#country_add2').html(result)

                        // $('#application1').html('<span style="color:green">Approved</span>');
                        // // $('#application1').css("margin-left"," 16px");
                        // // $('#application1').css("color","green");

                        // x++;
                        console.log('success');
                        // $('#country_add2').style.none(result)
                        // document.getElementById("showUniversity").style.display = "none";

                        // location.reload();
                     }


     });

    });
 </script>
@endsection
