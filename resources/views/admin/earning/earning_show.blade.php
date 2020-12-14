@extends('layout.master')
@section('parentPageTitle', 'Earning')
@section('title', 'See Earnings Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Earning<small>Earning Details</small></h2>
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
                        <td>Sufiyan Qureshi</td>
                    </tr>
                    <tr>
                        <th scope="row">User Type</th>
                        <td>Consultant</td>
                    </tr>

                    <tr>
                        <th scope="row">Amount</th>
                        <td>$10.030</td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>
                        <td>Pending</td>
                    </tr>



                    <tr>
                        <th scope="row">Sender country</th>
                        <td>Indian</td>
                    </tr>

                    <tr>
                        <th scope="row">Transaction ID</th>
                        <td>212335123</td>
                    </tr>

                    <tr>
                        <th scope="row">Payment for</th>
                        <td>Premium</td>
                    </tr>

                    <tr>
                        <th scope="row">Date</th>
                        <td>21:12:20</td>
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
                {{-- <a  href="{{route('admin.booking.client_app')}}" class="btn btn-success btn-flat" id="accept">Accept</a> --}}
                <a href="{{route('admin.earning')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
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
    $("#res").html("<a  href='{{route('admin.booking.client_app')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>")
    $("#dec").html("<a href='{{route('admin.booking.client')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script> --}}
@stop
