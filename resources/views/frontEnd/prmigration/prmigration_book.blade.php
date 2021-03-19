@extends('frontEnd.layout.master')
@section('title','Book a Consultant')


@section('content')

<!-- Start header
============================================= -->

<!-- End header -->

<div class="clearfix"></div>

<main class="main">

<!-- Start Breadcrumb
=============================================style="background: url(assets/img/breadcrumb/breadcrumb.jpg)"> -->
<section class="breadcrumb-area bread-bg-6">
<div class="breadcrumb-wrap">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="breadcrumb-content">
<div class="section-heading">
<h2 class="sec__title">Consultant Booking</h2>
</div>
</div><!-- end breadcrumb-content -->
</div><!-- end col-lg-6 -->
<!-- end col-lg-6 -->
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end breadcrumb-wrap -->
<div class="bread-svg-box">
<svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
</div><!-- end bread-svg -->
</section>
{{-- {{dd($consultant)}} --}}

<div class="container">
    <div class="row">
        <div class="col-lg-12">
           <h3 class="title font-size-24">Selected Consultant</h3>
            <div class="card-item user-card card-item-list mt-4 mb-0">
                @if(isset($consultant) && $consultant->count()>0)
                <div class="card-img">
                    @if(isset($advertise->banner_image) && file_exists($advertise->banner_image))
                    <img src="{{asset($consultant->profile_image)}}"alt="user image" class="h-auto">
                      @else
                      <img style=" width: 368px; height: 245px;" src="{{asset('frontEnd/assets/images/img21.jpg')}}" >
                      @endif

                </div>
                <div class="card-body">
                    <h3 class="card-title">{{$consultant->first_name ?? ''}} {{$consultant->last_name ?? ''}}</h3>
                    {{-- <p class="card-meta">Member since April 2016</p> --}}
                    <div class="d-flex justify-content-between pt-3">
                        <ul class="list-items list-items-2 flex-grow-1">
                            <li><span>Email:</span>{{$consultant->email ?? ''}}</li>
                            <li><span>Mobile:</span>{{$consultant->mobile ?? ''}}</li>
                            {{-- <li><span>Home Airport:</span>Knoxville, TN 37920, USA</li> --}}
                            <li><span>Address:</span>{{$consultant->address ?? ''}}</li>
                            <li><span>Website:</span><a target="_blank" href="{{$consultant->consultant->website ?? ''}}">Visit<i class="las la-external-link-alt"></i></a></li>
                            <li><span>Working Week Days:</span>
                                <?php
                                $weekarray = Config::get('define.weekday');
                                if(isset($consultant->consultant->working_week_days))
                                {
                                $setWorkingDays = explode(",", $consultant->consultant->working_week_days);
                                }
                                else {
                                    $setWorkingDays = [];
                                }
                            ?>
                                @if(count($weekarray)>0)
                                @foreach($weekarray as $key => $value)
                                    @if(in_array($key, $setWorkingDays))
                                        {{$value}},
                                    @endif
                                @endforeach
                            @endif</li>
                            {{-- <a href="#"> <span class="btn btn-primary" style="margin-top: 10px;">Change Consultant</span></a> --}}
                        </ul>

                    </div>
                    @else
                    <h2 class="mt-5" style="text-align: center"> No Media Available</h2>
                    @endif
                </div>
            </div><!-- end card-item -->
        </div><!-- end col-lg-12 -->
    </div>

</div>
<section class="booking-area padding-top-100px padding-bottom-70px">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!-- end form-box -->
<div class="form-box">
{{-- <div class="form-title-wrap">
<h3 class="title">Your Card Information</h3>
</div><!-- form-title-wrap --> --}}
<div class="form-content">
<!-- end section-tab -->
<div class="tab-content">
<div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
<div class="contact-form-action">
<form action="{{route('prmigration.book.store')}}" method="POST">
@csrf

<div class="row col-lg-12" style="margin-bottom: -34px;">


        <?php $countries = App\Models\Country::get();?>
<?php $countryes_id =  explode(",", $consultant->consultantPrMigrationCountry->country_id ?? '');
      $conts=[];
      foreach($countries as $country){
                 if (in_array($country->countries_id,$countryes_id))
{
   array_push($conts,$country);
}
      }
?>
        <div class="col-lg-3 col-md-12" style="margin-top: 2px;">
            <div class="form-group">
            <label for="start_time">Country</label>

            <select  name="country"  class="form-control"  style="height: 50px;" required >


                @if(count($conts) > 0)

                 @foreach($conts as $country)
                 {{-- @if (in_array($countryes_id,$countries) && ($country->countries_id==)) --}}

                 <option value="{{$country->countries_id ?? ''}}">{{$country->countries_name ?? ''}}</option>
                 {{-- @endif --}}
                 @endforeach

                @else

                    <option value="">No Country Available for PR</option>

                @endif

            </select>
            </div><br><br>
            {{-- {{ dd($consultant->consultantPrMigrationCountry) }} --}}
            <input type="text" id="client_id" name="client_id" value="{{auth()->user()->id}}" hidden>
            <input type="text" id="cid" name="cid" value="{{$consultant->id ?? ''}}" hidden>
            </div>
        <input type="text" id="client_id" name="client_id" value="{{auth()->user()->id}}" hidden>
        <input type="text" id="cid" name="cid" value="{{$consultant->id ?? ''}}" hidden>
<div class="col-lg-3 col-md-12">
<div class="input-box">
<label style="color: grey;
font: caption; margin-bottom: 13px;" class="label-text"> Booking Date</label>
<div class="form-group">
<span class="las la-calendar-alt form-icon"></span>
<input class="form-control" id="date" name="booking_date" placeholder="Date" required>
</div>
</div>
</div>

<div class="col-lg-3 col-md-12">
<div class="form-group">
<label for="start_time">Select Booking Time</label>
<?php get_times( $default = '00:00', $interval = '+30 minutes' ); ?>
<select class="form-control" id="starttime" name="start_time" style="height: 50px;" required>
<option value="">Select Start Time</option>
{{$times=$consultant->consultant ?? ''}}
{{-- {{dd($times)}} --}}
</select>
</div><br><br>
<input type="text" id="client_id" name="client_id" value="{{auth()->user()->id}}" hidden>
<input type="text" id="cid" name="cid" value="{{$consultant->id}}" hidden>
</div>





</div>

<!-- Function to call time -->
<?php

function get_times( $default = '00:00', $interval = '+30 minutes' ) {
$output = '';
$output1 = '';
$current = strtotime( '00:00' );
$end = strtotime( '23:59' );

while( $current <= $end ) {
$time = date( 'H:i:s', $current );
$sel = ( $time == $default ) ? ' selected' : '';
$output .= "<option value=\"{$time}\"{$sel} >" . date( 'H:i ', $current ) . '</option>';
$current = strtotime( $interval, $current );
}
return $output;
}
?>
{{-- #######################TIMESLOT#################### --}}

<div class="col-lg-3">
    @if(auth()->user())
    <div class="btn-box" style="
    margin-top: 37px;
">
    <button style="
    margin-left: -15px;" class="theme-btn" type="submit">Confirm Booking</button>
    </div>

    @endif
    @if(!auth()->user())
    <div class="btn-box" style="
    margin-top: 37px;
">
    <button style="
    margin-left: -15px;" class="theme-btn" data-toggle="modal" data-target="#loginPopupForm">Confirm Booking</button>
    </div>
    @endif
    </div><!-- end col-lg-12 -->
</div>



</div>
</form>
</div>



</div>
</div>

</div>

</div>
</div>
</div>
</div>
</section>




<div class="box-footer">
{{-- <button class="btn btn-primary btn-flat" title="Submit" type="submit"><i
class="fa fa-fw fa-save"></i> Submit
</button> --}}
{{-- <a href="{{route('admin.subjects')}}" class="btn btn-warning btn-flat" title="Cancel"><i class="fa fa-fw fa-chevron-circle-left"></i> Back</a> --}}
</div>
</form>

</div>
</div>
</div>




</div><!-- end contact-form-action -->
</div><!-- end tab-pane-->

</div><!-- end tab-content -->
</div><!-- end form-content -->
</div><!-- end form-box -->
</div><!-- end col-lg-8 -->

</div><!-- end row -->
</div><!-- end container -->
</section>

<!-- End Breadcrumb -->



<!-- Start Team-2
============================================= -->

<!-- End Team-2 -->

</main>




@endsection

@section('per_page_style')
<style>
    .ui-datepicker-calendar{
        background-color: azure;
    }
</style>
@endsection
@section('per_page_script')

<script>
    //  var date = new Date('now');
    //var newdate = new Date(date);

    var date = new Date(); // get current date
    date.setDate(date.getDate() + 1); // add two days to it

   
$("#date").datepicker({ onSelect: function(dateText) {


var select = $(this).attr("id");
var value = this.value;
var consultantid= $('#cid').val();
// console.log(consultantid);
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"{{ route('prmigration.slots.avail') }}",
method:"POST",
data:{select:select,consultantid:consultantid,value:value},
success:function(result)
{
$('#starttime').html(result);

}

})

console.log("Selected date: " + dateText + "; input's current value: " + this.value);




},
minDate: date
 });
</script>
{{-- <script>
     $(document).ready(function () {
    $('#date').datepicker({
        console.log('hiii');
        dateFormat: 'yy-mm-dd',
         minDate: 0,
        //  maxDate:"4w"

    });

});
</script> --}}
@endsection
