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
                        <th scope="row">Student Name</th>
                        <td>Sufiyan Qureshi</td>
                    </tr>
                    <tr>
                        <th scope="row">Student Address</th>
                        <td>Sikar,Rajasthan</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>1234567890</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>email@email.com</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Nationality</th>
                        <td>Indian</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-1</th>
                        <td>RTU</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-2</th>
                        <td>BTU</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-3</th>
                        <td>CTU</td>
                    </tr>





            </div>





        {{-- </tr> --}}


                    </tbody>

                </table>
                <div id="res">

                </div>
                <br>
                <div id="dec">

                </div>
                {{-- <a  href="{{route('subadmin.report.booking.consultant_app')}}" class="btn btn-success btn-flat" id="accept">Accept</a> --}}
                <a href="{{route('admin.report.booking.consultant')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
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
{{-- <script>
   $("#accept").click(function() {
    $("#accept").remove()
    $("#bac").remove()
    $("#res").html("<a  href='{{route('subadmin.booking.consultant_app')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>")
    $("#dec").html("<a href='{{route('subadmin.booking.consultant')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script> --}}
@stop
