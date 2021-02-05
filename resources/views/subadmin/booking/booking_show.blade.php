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
                <a href="#" data-toggle="modal" data-target="#followUpModal" custom1="{{$booking->id}}" class="btn btn-primary" id="follow_up_trigger"><i class="fa fa-plus" style="margin-right: 8px;"></i>Add Follow Up</a>
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
                        <th scope="row">Student Name</th>
                        <td>{{$booking->user->first_name ?? ''}} {{$booking->user->last_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Consultant Mobile</th>
                        <td>{{$booking->userConsultant->mobile ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Consultant Email</th>
                        <td>{{$booking->userConsultant->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Consultant Address</th>
                        <td>{{$booking->userConsultant->address ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Consultant Company</th>
                        <td>{{$booking->userConsultant->consultant->company_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Booking Date</th>
                        <td>@if(isset($booking->booking_date)){{ Carbon\Carbon::parse($booking->booking_date)->format(config('get.ADMIN_DATE_FORMAT')) }}
                                @else N/A @endif</td>
                    </tr>

                    <tr>
                        <th scope="row">Time Slot</th>
                        <td>{{$booking->booking_start_time}}-{{$booking->booking_end_time}}</td>
                    </tr>


                    <?php $i = 1?>
                    @if(isset($university) && $university != '')
                    @foreach($university as $key=> $uni)

                        <tr>
                            <th scope="row">Student University / Course Preference-{{$i}}</th>
                            <td>{{$uni->university->university_name ?? ''}} / {{$course[$key]->title ?? ''}}</td>
                        </tr>
                    <?php $i++ ?>
                    @endforeach
                    @endif

                    <tr>
                        <th scope="row">Booking For</th>
                        <td>
                            @if($booking->booking_for==0)
                        <div class="btn btn-primary">Student</div>@endif
                        @if($booking->booking_for==1)
                        <div class="btn btn-primary">PR Migration</div>@endif
                    </td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>

                        <td>@if($booking->status==0 ?? '')<div class="btn btn-warning">Pending</div>@endif
                            @if($booking->status==1 ?? '')<div class="btn btn-success">Accepted</div>@endif
                            @if($booking->status==2 ?? '')<div class="btn btn-primary">In Progress</div>@endif
                            @if($booking->status==3 ?? '')<div class="btn btn-danger">Declined</div>@endif
                        </td>
                    </tr>
<input type="text" class="" value="{{$booking->id}}" name="booking_id" hidden>


            </div>





        {{-- </tr> --}}


                    </tbody>

                </table>
                <div id="res">

                </div>
                <br>
                <div id="dec">

                </div>
                <a href="{{route('admin.booking')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
                {{-- @if($booking->status== 0)
                <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('admin.booking')}}" id="bac" class="btn btn-danger btn-flat">Decline</a>
                @else
                <button class='btn btn-success btn-flat' >Already Accepted</button>
                <a style="margin-left: 5px;" href="{{route('admin.booking')}}" id="bac" class="btn btn-danger btn-flat">Back</a>

                @endif --}}
            </div>
        </div>
    </div>
</div>

</section>

<div class="modal fade" id="followUpModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3" style="color:white; text-align: center;">Add Follow Up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <form id="basic-form6" class="basic-form" method="post" novalidate action="{{route('consultant.booking.followup.store')}}">
                    @csrf
                    {{-- <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div> --}}
                  <input type="text" name="booking_id" value={{$booking->id ?? ''}} hidden>
                    <div class="form-group" id="noteError">
                        <label style="color:white">Note</label>
                        <textarea class="form-control" id="note" name="note" rows="5" cols="30" required></textarea>
                    </div>
                    <div class="form-group" id="dateError">
                        <label style="color:white">Date</label>
                        <input  class="form-control" name="date" id="date" required>
                    </div>
                    <br>

        </div>
        <div class="modal-footer">
          {{-- <button type="submit" class="btn btn-primary">Add Follow Up</button> --}}
          <a href="javascript:void(0)"  class="btn btn-primary" id="add_follow_up"> Add </a>
        </form>
                    </div>
</div>
</div>
</div>


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
<script>
    var booking_id='';
    var note ='';
    var date='';
     $(document).on('click', '#follow_up_trigger', function ()
 {
    booking_id=$(this).attr('custom1');
    // booking_id = var booking_id = $('input[name="booking_id"]').val();
 console.log(booking_id);
 });
 $(document).on('click', '#add_follow_up', function ()
 {

       var note=$('#note').val();
       var date=$('#date').val();
    if( note == '')
    {
        $('#noteError').html('<label style="color:white">Note</label><textarea class="form-control" id="note" name="note" rows="5" cols="30" required></textarea><strong><span style="color:red">*Note field is required</span></strong>')
    }
    else if( date == '')
    {
        $('#dateError').html('<label style="color:white">Date</label><input  class="form-control" name="date" id="date" required><strong><span style="color:red">*Date field is required</span></strong>')
    }
    else
    {
       if(booking_id > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.booking.followup.store')}}",
                     data: {booking_id:booking_id,note:note,date:date},
                     success: function (result) {
                         console.log('success');
                        //  alert('Follow Up created Successfully');
                         $('#alert_add').append('<div class="container" style="width: 880px;"><div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Follow Up Created Successfully.</strong></div></div>')
                     }
                 });
       }

             $('#followUpModal').modal('hide');
             document.getElementById("basic-form6").reset();
    }
     });
     $(document).ready(function () {
    $('#date').datepicker({
        dateFormat: 'yy-mm-dd',
         minDate: 0,
        //  maxDate:"4w"
    });
});

 </script>
@stop
