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
                  @if(isset($consultant->profile_image)&&file_exists($consultant->profile_image))  <img src="{{asset($consultant->profile_image)}}"alt="user image" class="h-auto">
                  @else
                  <img src="{{asset('frontEnd/assets/images/defaultuser.png')}}"alt="user image" class="h-auto">
                  @endif
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{$consultant->first_name ?? ''}} {{$consultant->last_name ?? ''}}</h3>
                    <p class="card-meta">Member since April 2016</p>
                    <div class="d-flex justify-content-between pt-3">
                        <ul class="list-items list-items-2 flex-grow-1">
                            <li><span>Email:</span>{{$consultant->email ?? ''}}</li>
                            <li><span>Mobile:</span>{{$consultant->mobile ?? ''}}</li>
                            {{-- <li><span>Home Airport:</span>Knoxville, TN 37920, USA</li> --}}
                            <li><span>Address:</span>{{$consultant->address ?? ''}}</li>
                            <li><span>Website:</span><a target="_blank" href="{{ $consultant->consultant->website }}" style="color: blue">Visit<i class="las la-external-link-alt"></i></a></li>
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
                            <li>

                                <span>Working Week Days:</span>
                                @if(count($weekarray)>0)
                                    @foreach($weekarray as $key => $value)
                                        @if(in_array($key, $setWorkingDays))
                                            {{$value}},
                                        @endif
                                    @endforeach
                                @endif
                            </li>
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
<form action="{{route('consultant.book.store')}}" id="booking-form" method="POST">
@csrf

<div class="row col-lg-12" style="margin-bottom: -34px;">
<div class="col-lg-6 col-md-12">
<div class="input-box">
<label style="color: grey;
font: caption; margin-bottom: 13px;" class="label-text"> Booking Date</label>
<div class="form-group">
<span class="las la-calendar-alt form-icon"></span>
<input class="form-control" id="date" name="booking_date" placeholder="Date" required>
<div id="dateError"></div>
</div>
</div>
</div>

<div class="col-lg-6 col-md-12">
<div class="form-group">
<label for="start_time">Select Booking Time</label>
<?php get_times( $default = '00:00', $interval = '+30 minutes' ); ?>
<select class="form-control" id="starttime" name="start_time" style="height: 50px;" required>
<option value="">Select Start Time</option>
{{$times=$consultant->consultantSlots}}
{{-- {{dd($times)}} --}}
</select>
<div id="starttimeError"></div>
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
<?php $univers=$consultant->consultantUniversity;
?>
<div class="col-md-12">
<table id="bannewrImages" class="table table-striped table-bordered table-hover" >
<thead>
<tr>
<th class="text-left" style="width: 40%;">Choose University </th>
<th class="text-left" style="width: 40%;">Choose Course</th>
<th class="text-left" style="width: 10%;">Action</th>


</tr>
</thead>
<tbody>
@php
$bannerImages = old('banner_images') ?? [];
$inc = 0;
@endphp
<tr>
    <td class="text-center filetype"  data-row_id='{{ $inc }}'>

        <select class="col-lg-12 p-2 selectpicker university" data-live-search="true" style="border-color: gainsboro;border-radius: 4px;" name="banner_images[0][university]" id="media_type-{{ $inc }}" required>
<?php $un=$consultant->consultantUniversity?>

     @foreach($un as $uns)
     @if (isset($universityid))
     <?php   $contryid=$uns->userUniversity->countries_id ?? ''; $country = DB::table('countries')->where('countries_id',$contryid)->first();  ?>
<option value="{{$uns->userUniversity->id}}"
    @if($uns->userUniversity->id==$universityid) selected @endif >
   {{$uns->userUniversity->university->university_name}}({{$country->countries_name ?? ''}})
</option>
    @else
    <option value="{{$uns->userUniversity->id}}">
       {{$uns->userUniversity->university->university_name}}({{$country->countries_name ?? ''}})
    </option>
@endif
@endforeach
        </select>
        <div id="universityError"></div>

    </td>
    <td>
        <?php $courses = DB::table('university_courses')->where('user_id',$universityid)->get() ?>
        <div id="courseError"></div>
        <select class="col-lg-12 p-2" style="border-color: gainsboro;border-radius: 4px;"  id="tl-0" name="banner_images[0][course]" required>

        <option selected>Choose Course</option>
        @foreach($courses as $course)
       <option value="{{$course->id ?? ''}}">{{$course->title ?? ''}}</option>
       @endforeach
       <div id="courseError"></div>
    </select>

</td>

<td>
<button type="button" id="bst" onclick="addImage();" data-toggle="tooltip" title="<?= __('Add More') ?>" class="btn btn-primary">
<i class="las la-plus-circle"></i>
</button>
</td>
</tr>
</tbody>
<tfoot>
    @php
    $inc++;
    @endphp

</tfoot>
</table>


{{-- <div class="form-floating mb-4">
<label for="floatingTextarea">Comments</label>
<textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea"></textarea>

</div> --}}

<div class="col-lg-12">
@if(auth()->user())
<div class="btn-box">
<button style="
margin-left: -15px;" class="theme-btn" type="submit" id="confirmBooking">Confirm Booking</button>
</div>

@endif
</div><!-- end col-lg-12 -->
</div>
</form>
@if(!auth()->user())
<div class="btn-box">
<button style="
margin-left: -15px;" class="theme-btn" data-toggle="modal" data-target="#loginPopupForm">Confirm Booking</button>
</div>
@endif

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
{{-- <script type="text/javascript">

function setEndTime(start_time){
if(start_time){
$("#endtime").prop('disabled', false);

$('#endtime option').filter(function() {
return $(this).val() <= start_time;
}).prop('disabled', true);
}else{
$("#endtime").prop('disabled', true);
}
}
</script> --}}
<script>
    var date = new Date(); // get current date
    date.setDate(date.getDate() + 1); // add two days to it

   // var dd = date.getDate();
   // var tm = date.getTime();
   // var mm = date.getMonth();
  // var y = date.getFullYear();
    
   // var someFormattedDate = y + '/' + mm + '/' + dd;
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
url:"{{ route('slots.avail') }}",
method:"POST",
data:{select:select,consultantid:consultantid,value:value},
success:function(result)
{
$('#starttime').html(result);

}

})

console.log("Selected date: " + dateText + "; input's current value: " + this.value);




},
minDate: date,

});
</script>
<script type="text/javascript">
$(document).ready(function(){
var postURL = "<?php echo url('addmore'); ?>";
var i=0;





$('#bst').click(function(){
rt=$('#document_name').val()
// console.log(rt);
$('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name="12marksheet"><span>'+rt+'</span></label>')
$('#documentModal').modal('hide')
});

// $(document).on('click', '.btn_remove', function(){

// var button_id = $(this).attr("id");

// // $('#row'+button_id+'').remove();
// r=$('#dynamic_field .dynamic-added').length;
// if(r<3){
// $('#bst').prop('disabled', false);
// }


// });


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$('#submit').click(function(){
$.ajax({
url:postURL,
method:"POST",
data:$('#add_name').serialize(),
type:'json',
success:function(data)
{
if(data.error){
printErrorMsg(data.error);
}else{
i=1;
$('.dynamic-added').remove();
$('#add_name')[0].reset();
$(".print-success-msg").find("ul").html('');
$(".print-success-msg").css('display','block');
$(".print-error-msg").css('display','none');
$(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
}
}
});
});


function printErrorMsg (msg) {
$(".print-error-msg").find("ul").html('');
$(".print-error-msg").css('display','block');
$(".print-success-msg").css('display','none');
$.each( msg, function( key, value ) {
$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
});
}
});

</script>
<script>
var image_row = {{ $inc }}


$(document).on('change', '#university', function () {
dt=$(this).attr("custom1");
console.log($(this).val());
dt= $(this).data("row_id")
if($('#university').val() == "3"){


$('#course-'+dt+'').html('<option>udyfydsu</option>');





}
if($('#university').val() == "2"){


$('#course-'+dt+'').html('<option>uddsdsdsdsddsdsdsdsds</option>');





}
// if($('#media_type-'+dt+'').val() == "file"){
// // var image_row = {{ $inc }};
// $('#tc-'+dt+'').html('<input class="form-control mt-3 d-none" placeholder="labels.backend.lessons.enter_video_url" name="banner_images[' + dt + '][video_file]" id="video_file" type="file">');

// }
});




</script>

<script type="text/javascript">
var image_row = {{ $inc }};
function addImage(language_id) {
    
 
    

html = '<tr id="imageBox-' + image_row + '" class="imageBox">';


html += ' <td class="text-center filetype" data-row_id='+image_row+'><select class="col-lg-12 selectpicker p-2" data-live-search="true"  style="border-color: gainsboro;border-radius: 4px;" id="media_type-'+image_row+'" name="banner_images[' + image_row + '][university]" required> <option selected>Choose University</option><?php foreach($univers as $univer){?> <?php   $contryid=$univer->userUniversity->countries_id ?? ''; $country = DB::table('countries')->where('countries_id',$contryid)->first();  ?><option value="{{$univer->userUniversity->id}}">{{$univer->userUniversity->university->university_name}} ({{$country->countries_name ?? ''}})</option><?php }?></select></td>';
html += ' <td class="text-left" id="tc-'+image_row+'" >'
html +='<select required class="col-lg-12 p-2" style="border-color: gainsboro;border-radius: 4px;" id="tl-'+image_row+'" name="banner_images['+image_row+'][course]"><option selected>Choose Course</option></select>';
html +='</td>';





html += ' <td class="text-left"><button type="button" onclick="$(\'#imageBox-' + image_row + ', .tooltip\').remove();" data-toggle="tooltip" title="Remove" id="'+image_row+'" class="btn btn-danger btn_remove"><i class="las la-minus-circle"></i></button></td>';
html += '</tr>';
$('table#bannewrImages tbody').append(html);
r=$('#bannewrImages .imageBox').length;
if(r==4){
$('#bst').prop('disabled', true);
}
image_row++;
//$('.selectpicker').selectpicker('refresh');
$('.selectpicker').selectpicker('render');
}

$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id");
// console.log(button_id);
$('#imageBox'+button_id+'').remove();
r=$('#bannewrImages .imageBox').length;
console.log(r);
if(r<5){
$('#bst').prop('disabled', false);
}
// $('#add').add();
// window.location.reload();

});





</script>
<script>
var image_row = {{ $inc }}


$(document).on('change', '.filetype', function () {
dt= $(this).data("row_id")
$.ajaxSetup({headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
universityid=$('#media_type-'+dt+'').val();
$.ajax({
url:"{{ route('fetch.course') }}",
method:"GET",
data:{universityid:universityid,dt:dt},
success: function(result){
$('#tl-'+dt+'').html(result);
}
})
// console.log($('#media_type-'+dt+'').val());

// if($('#media_type-'+dt+'').val() == "4"){

// // var image_row = {{ $inc }};
// $('#tc-'+dt+'').html('<input required class="form-control" id="video" name="banner_images[' + dt + '][video]" type="text">');





// }
// if($('#media_type-'+dt+'').val() == "2"){
// // var image_row = {{ $inc }};
// $('#tc-'+dt+'').html('<input class="form-control" name="banner_images[' + dt + '][video_file]" id="video_file" type="file">');

// }
});




</script>
<script>
    var course = '';
    var university = '';
    var date = '';
    var starttime = '';

$(document).on('click', '#confirmBooking', function (){
    course=$('#course').val();
    console.log(course);
    university=$('.university').val();
    console.log(university);
    date=$('#date').val();
    starttime=$('#starttime').val();
    console.log(date);
    console.log(starttime);
    if(course=='' || university=='' || course=='Choose Course' || date=='' || starttime=='')
    {

        if(date=='')
        {
            $('#dateError').html('<span style="color:red">*This field is required</span></strong>')
        }
        else if(starttime=='')
        {
            $('#starttimeError').html('<span style="color:red">*This field is required</span></strong>')
        }

        else if(university=='')
        {
            $('#universityError').html('<span style="color:red">*This field is required</span></strong>')
        }

        else if(course=='Choose Course' || course=='')
        {
            $('#courseError').html('<span style="color:red">*This field is required</span></strong>')
        }

    }
    else
    {
        $('#booking-form').submit();
    }
// console.log(rt);

});
</script>
@endsection
