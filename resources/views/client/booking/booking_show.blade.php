@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'See Bookings Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Bookings<small>Booking Details</small></h2>
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
                        <th scope="row">Consultant Name</th>
                        <td>{{$booking->userConsultant->first_name ?? ''}} {{$booking->userConsultant->last_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Consultant Address</th>
                        <td>{{$booking->userConsultant->address ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Consultant Mobile No.</th>
                        <td>{{$booking->userConsultant->mobile ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Consultant E-mail</th>
                        <td>{{$booking->userConsultant->email ?? ''}}</td>
                    </tr>


                    <tr>
                        <th scope="row">Consultant Country</th>
                        @if(isset($booking->userConsultant->countries_id))
                        <?php $country = DB::table('countries')->where('countries_id',$booking->userConsultant->countries_id)->get()->first();?>
                        @endif
                        <td> {{$country->countries_name ?? ''}} </td>
                        {{-- <td>{{$booking->userConsultant->country->countries_name ?? ''}}</td> --}}
                    </tr>
                    @foreach($university as $key=> $uni)
                    {{-- {{ dd($university) }} --}}
                    <tr>
                        <th scope="row">My University/Course Preference-{{$key + 1}}</th>
                        <td>{{$uni->university->university_name ?? '' }}/{{$course[$key]->title ?? ''}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th scope="row">Booking Time-Slot</th>
                        <td>{{$booking->booking_start_time ?? ''}}-{{$booking->booking_end_time ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Booking Date</th>
                        <td>{{$booking->booking_date ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Booking Status</th>
                        @if(isset($booking->status))
                        <td>@if($booking->status==0 ?? '')<div class="btn btn-warning">Pending</div>@endif
                            @if($booking->status==1 ?? '')<div class="btn btn-success">Accepted</div>@endif
                            @if($booking->status==2 ?? '')<div class="btn btn-primary">In Progress</div>@endif
                            @if($booking->status==3 ?? '')<div class="btn btn-danger">Declined</div>@endif
                            @if($booking->status==4 ?? '')<div class="btn btn-info">Completed</div>@endif
                            @if($booking->status==5 ?? '')<div class="btn btn-danger">Closed</div>@endif
                        </td>
                        @endif
                    </tr>


            </div>
                    </tbody>

                </table>
                 <a href="{{route('client.bookings')}}" id="bac" class="btn btn-danger btn-flat">Back</a>


                {{-- <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('consultant.bookings')}}" id="bac" class="btn btn-danger btn-flat">Decline</a> --}}
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
    $("#accept").remove()
    $("#bac").remove()
    $("#res").html("<a  href='{{route('consultant.booking.application', ['id'=> $booking->id])}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>")
    $("#dec").html("<a href='{{route('consultant.bookings')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script>
@stop
