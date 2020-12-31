@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'See Bookings Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2> Bookings<small>Booking Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                {{-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another Action</a></li>
                        <li><a href="javascript:void(0);">Something else</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                    <tr>
                        <th scope="row">Client Name</th>
                        <td>{{$show->user->first_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Consultant Name</th>
                        <td>{{$show->consultant->user->first_name}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Booking Date</th>
                        <td>{{$show->booking_date}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Time Slot</th>
                        <td>{{$show->booking_start_time}}-{{$show->booking_end_time}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Booking For</th>
                        <td>
                            @if($show->booking_for==0)
                        <div class="btn btn-primary">Student</div>@endif
                        @if($show->booking_for==1)
                        <div class="btn btn-primary">PR Migration</div>@endif
                    </td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>

                        <td>@if($show->status==0)<div class="btn btn-warning">Pending</div>@endif
                            @if($show->status==1)<div class="btn btn-success">Accepted</div>@endif
                            @if($show->status==2)<div class="btn btn-danger">Rejected</div>@endif
                            @if($show->status==3)<div class="btn btn-primary">Walking</div>@endif
                        </td>
                    </tr>
                   <tr>
                    <th>Enquiry</th>
                    <td>{{$university0->university_name}}/{{$course0->name}}</td>
                </tr>

                <tr>
                    <th scope="row" style="background-color: #2c2f33;"></th>
                    <td  style="background-color: #2c2f33;">{{$university1->university_name}}/{{$course1->name}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>{{$university2->university_name}}/{{$course2->name}}</td>
                </tr>


<input type="text" class="" value="{{$show->id}}" name="booking_id" hidden>


            </div>





        {{-- </tr> --}}


                    </tbody>

                </table>
                <div id="res">

                </div>
                <br>
                <div id="dec">

                </div>
                @if($show->status== 0)
                <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('admin.booking')}}" id="bac" class="btn btn-danger btn-flat">Decline</a>
                @else
                <button class='btn btn-success btn-flat' >Already Accepted</button>
                <a style="margin-left: 5px;" href="{{route('admin.booking')}}" id="bac" class="btn btn-danger btn-flat">Back</a>

                @endif
            </div>
        </div>
    </div>
</div>

</section>




@stop

@section('page-styles')
@stop

@section('page-script')

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

<script>
    $(function() {
        // (Optional) Active an item if it has the class "is-active"
        $(".accordion2 > .accordion-item.is-active").children(".accordion-panel").slideDown();

        $(".accordion2 > .accordion-item").click(function() {
            // Cancel the siblings
            $(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
            // Toggle the item
            $(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
        });
    });
</script>
<script>
   $("#accept").click(function() {
    var booking_id = $('input[name="booking_id"]').val();
    $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
            $.ajax({
                type: "post",
                url: "{{route('admin.booking.accept')}}",
                data: {booking_id:booking_id},
                success: function (result) {
                    console.log('success');
                }
            });
    $("#accept").remove()
    $("#bac").remove()
    // $("#res").html("<button class='btn btn-success btn-flat' id='accept'>Already Accepted</button>")
    // $("#dec").html("<a href='{{route('consultant.bookings')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script>
@stop
