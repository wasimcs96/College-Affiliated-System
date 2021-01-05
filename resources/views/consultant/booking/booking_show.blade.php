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

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                    <tr>
                        <th scope="row">Student Name</th>
                        <td>{{$show->user->first_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Student Address</th>
                        <td>{{$show->user->address ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>{{$show->user->mobile ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>{{$show->user->email ?? ''}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Nationality</th>
                        <td>{{$show->user->country ?? ''}}</td>
                    </tr>

                   <tr>
                    <th scope="row">Student University/Course Preference-1</th>
                    <td>{{$university0->university_name ?? ''}}/</td>
                </tr>

                <tr>
                    <th scope="row">Student University/Course Prefrence-2</th>
                    <td>{{$university1->university_name ?? ''}}/{{$course1->name ?? ''}}</td>
                </tr>
                <tr>
                    <th scope="row">Student University/Course Prefrence-3</th>
                    <td>{{$university2->university_name ?? ''}}/{{$course2->name ?? ''}}</td>
                </tr>
                 <input type="text" class="" value="{{$show->id}}" name="booking_id" hidden>
            </div>
                    </tbody>

                </table>
                <div id="res">

                </div>
                <br>
                <div id="dec">

                </div>
                @if($show->status == 0)
                <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('consultant.bookings')}}" id="bac" class="btn btn-danger btn-flat">Decline</a>
                @else
                @if($show->application == NULL)
                <a  href='{{route('consultant.booking.application',['id'=>$show->id])}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>
                @endif
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
                url: "{{route('consultant.booking.accept')}}",
                data: {booking_id:booking_id},
                success: function (result) {
                    console.log('success');
                }
            });
    $("#accept").remove()
    $("#bac").remove()
    $("#res").html("<a  href='{{route('consultant.booking.application',['id'=>$show->id])}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>")
    $("#dec").html("<a href='{{route('consultant.bookings')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script>
@stop
