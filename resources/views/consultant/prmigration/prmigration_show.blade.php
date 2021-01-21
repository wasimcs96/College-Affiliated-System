@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'See Bookings Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My PR Bookings<small>PR Booking Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                    <tr>
                        <th scope="row">Client Name</th>
                        <td>{{$show->user->first_name ?? ''}} {{$show->user->last_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Client Address</th>
                        <td>{{$show->user->address ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Client Mobile No.</th>
                        <td>{{$show->user->mobile ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Client E-mail</th>
                        <td>{{$show->user->email ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Client Country</th>
                        @if(isset($show->user->countries_id))
                        <?php $country = DB::table('countries')->where('countries_id',$show->user->countries_id)->get()->first();?>
                        @endif
                        <td> {{$country->countries_name ?? ''}} </td>
                    </tr>

                    <tr>
                    <th scope="row">PR Migration</th>
                    @if(isset($show->user->countries_id))
                        <?php $prCountry = DB::table('countries')->where('countries_id',$show->countries_id)->get()->first();?>
                        @endif
                        <td> {{$prCountry->countries_name ?? ''}} </td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>
                        <td>@if($show->status==0 ?? '')<div class="btn btn-warning">Pending</div>@endif
                            @if($show->status==1 ?? '')<div class="btn btn-success">Accepted</div>@endif
                            @if($show->status==2 ?? '')<div class="btn btn-danger">Rejected</div>@endif
                            @if($show->status==3 ?? '')<div class="btn btn-primary">Walking</div>@endif
                        </td>
                        </tr>

            </tbody>
               </table>
                 <input type="text" class="" value="{{$show->id}}" name="booking_id" hidden>
            </div>


                </table>
                <div id="res">

                </div>
                <br>
                <div id="dec">

                </div>
                @if($show->status == 0)
                <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('consultant.prmigration')}}" id="bac" class="btn btn-danger btn-flat">Decline</a>
                @else
                <a href="{{route('consultant.prmigration')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
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
                url: "{{route('consultant.prmigration.accept')}}",
                data: {booking_id:booking_id},
                success: function (result) {
                    console.log('success');
                }
            });
    $("#accept").remove()
    $("#bac").remove()

    $("#dec").html("<a href='{{route('consultant.prmigration')}}' class='btn btn-danger btn-flat'>Close</a>")
    // $("#res").innerHtml=`<a  href='{{route('consultant.application')}}' class='btn btn-success btn-flat' id='accept'>Create Application</a>')`
});

</script>
@stop
