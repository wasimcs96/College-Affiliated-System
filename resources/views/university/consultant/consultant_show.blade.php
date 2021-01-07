@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'See Consultant Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Consultant Requests<small>Consultant Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                    <tr>
                        <th scope="row"> Name</th>
                        <td>{{$status->user->first_name}} {{$status->user->last_name}}</td>
                    </tr>


                    <tr>
                        <th scope="row"> Mobile No.</th>
                        <td>{{$status->user->mobile}}</td>
                    </tr>

                    <tr>
                        <th scope="row">E-mail</th>
                        <td>{{$status->user->email}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>
                        <td>@if($status->status == 0)
                            <span class="btn btn-warning" >Pending</span>
                            @else
                            <span class="btn btn-info" >Accepted</span>
                          @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Company Name</th>
                        <td>{{$status->user->consultant->company_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Website</th>
                        <td>{{$status->user->consultant->website}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Landline_2</th>
                        <td>{{$statu->user->landline_2}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>{{$status->user->address}}</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>{{$status->user->city}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>{{$status->user->country}}</td>
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
                @if($status->status == 0)
                {{-- <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a> --}}
                <a  href="{{route('university.consultant_accept',['id' => $status->id])}}" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('university.consultants')}}" id="bac" class="btn btn-danger btn-flat">Decline</a>            </div>
        @else
        <a href="{{route('university.consultants')}}" id="back" class="btn btn-danger btn-flat">Back</a> </div>
                @endif
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
    $("#res").html("<a  href='{{route('consultant.booking.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>")
    $("#dec").html("<a href='{{route('consultant.bookings')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script> --}}
@stop
