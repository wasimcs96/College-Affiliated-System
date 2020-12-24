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
                        <div class="col-lg-6">
                            <div class="breadcrumb-list">
                                <ul class="list-items d-flex justify-content-end">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Consultant Booking</li>
                                </ul>
                            </div><!-- end breadcrumb-list -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end breadcrumb-wrap -->
            <div class="bread-svg-box">
                <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
            </div><!-- end bread-svg -->
        </section>
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
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">University  Name</label>
                                                            <div class="form-group">
                                                       <?php $univers=$consultant->consultantUniversity?>
                                                                <input class="form-control" value="
                                                                @foreach($univers as $univer)
                                                                {{$univer->university->university_name}}
                                                                @endforeach"type="text" name="text" placeholder="University name">
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6 responsive-column">
                                                        <label class="label-text">Course  Name</label>


                                                            <div class="select-contain w-auto">
                                                              <select class="select-contain-select">
                                                                <option value="country-code">Select Course</option>
                                                                <option value="1">Mtech</option>
                                                                <option value="2">Btech</option>
                                                                <option value="3">BSC</option>
                                                                <option value="4">MSC</option>
                                                                <option value="5">BCA</option>
                                                                <option value="6">MCA</option>
                                                            </select>
                                                            </div>
                                                          </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="table-responsive" style="width: 100%;     margin-top: 36px;">
                                                            <label for="name">University  Name</label>
                                                            <table class="table table-bordered" id="dynamic_field">
                                                                <tr class="dynamic-added">
                                                                    <td> <select id="inputState" class="form-control FulNamo" >
                                                                        <option selected>Rtu</option>
                                                                        <option>btech</option>
                                                                      </select></td>
                                                                    <td><button type="button" name="add" id="add" class="btn btn-primary btn-m"><i class="la la-plus"></i></button></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Date</label>
                                                            <div class="form-group">
                                                                <span class="las la-calendar-alt form-icon"></span>
                                                                <input class="form-control"   id="date" name="text" placeholder="Date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label for="start_time">Select Booking Time</label>
                                                            <?php get_times( $default = '00:00', $interval = '+30 minutes' ); ?>
                                                            <select class="form-control" id="starttime" name="start_time" style="height: 50px;" >
                                                            <option value="">Select Start Time</option>
                                                           {{$times=$consultant->consultantSlots}}

                                                        </select>
                                                        </div><br><br>
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
                                                    <!-- end col-lg-6 -->
                                                  <!-- end col-lg-6 -->
                                                    <!-- end col-lg-6 -->
                                                    <!-- end col-lg-12 -->
                                                    <div class="col-lg-12">
                                                        @if(auth()->user())
                                                        <div class="btn-box">
                                                            <button class="theme-btn" type="submit">Confirm Booking</button>
                                                        </div>

                                                        @endif
                                                    </div><!-- end col-lg-12 -->
                                                </div>
                                            </form>
                                            @if(!auth()->user())
                                            <div class="btn-box">
                                                <button class="theme-btn" data-toggle="modal" data-target="#loginPopupForm">Confirm Booking</button>
                                            </div>
                                            @endif
                                        </div><!-- end contact-form-action -->
                                    </div><!-- end tab-pane-->
                                    {{-- <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                        <div class="contact-form-action">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Email Address</label>
                                                            <div class="form-group">
                                                                <span class="la la-envelope form-icon"></span>
                                                                <input class="form-control" type="email" name="email" placeholder="Enter email address">
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Password</label>
                                                            <div class="form-group">
                                                                <span class="la la-lock form-icon"></span>
                                                                <input class="form-control" type="text" name="text" placeholder="Enter password">
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-12">
                                                        <div class="btn-box">
                                                            <button class="theme-btn" type="submit">Login Account</button>
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                </div>
                                            </form>
                                        </div><!-- end contact-form-action -->
                                    </div><!-- end tab-pane--> --}}
                                    {{-- <div class="tab-pane fade" id="payoneer" role="tabpanel" aria-labelledby="payoneer-tab">
                                        <div class="contact-form-action">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Email Address</label>
                                                            <div class="form-group">
                                                                <span class="la la-envelope form-icon"></span>
                                                                <input class="form-control" type="email" name="email" placeholder="Enter email address">
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Password</label>
                                                            <div class="form-group">
                                                                <span class="la la-lock form-icon"></span>
                                                                <input class="form-control" type="text" name="text" placeholder="Enter password">
                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-12">
                                                        <div class="btn-box">
                                                            <button class="theme-btn" type="submit">Login Account</button>
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                </div>
                                            </form>
                                        </div><!-- end contact-form-action -->
                                    </div><!-- end tab-pane--> --}}
                                </div><!-- end tab-content -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-8 -->
                    {{-- <div class="col-lg-4">
                        <div class="form-box booking-detail-form">
                            <div class="form-title-wrap">
                                <h3 class="title">Booking Details</h3>
                            </div><!-- end form-title-wrap -->
                            <div class="form-content">
                                <div class="card-item shadow-none radius-none mb-0">
                                    <div class="card-img pb-4">
                                        <a href="flight-single.html" class="d-block">
                                            <img src="images/img26.jpg" alt="plane-img">
                                        </a>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3 class="card-title">Indianapolis to paris</h3>
                                                <p class="card-meta">One way Flight</p>
                                            </div>
                                            <div>
                                                <a href="flight-single.html" class="btn ml-1"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-rating">
                                            <span class="badge text-white">4.4/5</span>
                                            <span class="review__text">Average</span>
                                            <span class="rating__text">(30 Reviews)</span>
                                        </div>
                                        <div class="section-block"></div>
                                        <ul class="list-items list-items-2 list--items-2 py-2">
                                            <li class="font-size-15"><span class="w-auto d-block mb-n1"><i class="la la-plane mr-1 font-size-17"></i>Take off</span>12 May 2020 7:40am</li>
                                            <li class="font-size-15"><i class="la la-clock-o mr-1 text-black font-size-17"></i>12hrs 40 min</li>
                                            <li class="font-size-15"><span class="w-auto d-block mb-n1"><i class="la la-plane mr-1 font-size-17"></i>Landing</span>13 May 2020 8:40am</li>
                                        </ul>
                                        <h3 class="card-title pb-3">Order Details</h3>
                                        <div class="section-block"></div>
                                        <ul class="list-items list-items-2 py-3">
                                            <li><span>Airline:</span>Delta</li>
                                            <li><span>Flight Type:</span>Economy</li>
                                            <li><span>Base Fare:</span>$240</li>
                                            <li><span>Passengers:</span>2</li>
                                        </ul>
                                        <div class="section-block"></div>
                                        <ul class="list-items list-items-2 pt-3">
                                            <li><span>Sub Total:</span>$240</li>
                                            <li><span>Taxes And Fees:</span>$5</li>
                                            <li><span>Total Price:</span>$245</li>
                                        </ul>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-4 --> --}}
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

		<!-- End  Breadcrumb -->



		<!-- Start Team-2
		============================================= -->

		<!-- End Team-2 -->

	</main>




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
    $("#date").datepicker({ onSelect: function(dateText) {


        var select = $(this).attr("id");
   var value = this.value;
    var consultantid= $('#cid').val();
//    console.log(dependent);
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




         } });
</script>
<script type="text/javascript">
    $(document).ready(function(){
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;


      $('#add').click(function(){
             i++;
           $('#dynamic_field').append('<tr  id="row'+i+'" class="dynamic-added"><td><select id="inputState" class="form-control"><option selected>Choose University</option> <option>Harvard</option></select></td><td><select id="inputGroupSelect01" class="form-control"><option selected>Choose University</option> <option>MIT</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
           r=$('#dynamic_field .dynamic-added').length;
            if(r==3){
                $('#add').prop('disabled', true);
            }



      });

    //   $('#add_document').click(function(){
    //       i++;
    //        $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name="aadhar" class="form-control"><span><input type="text" name="document_name" class="form-control col-lg-8 "></span></label>')
    //   });

    $('#add_document2').click(function(){
      rt=$('#document_name').val()
    //   console.log(rt);
$('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name="12marksheet"><span>'+rt+'</span></label>')
$('#documentModal').modal('hide')
    });

      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
        //    console.log(button_id);
           $('#row'+button_id+'').remove();
           r=$('#dynamic_field .dynamic-added').length;
            if(r<3){
                $('#add').prop('disabled', false);
            }
        //    $('#add').add();
        //    window.location.reload();

      });


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
    // $(document).ready(function(){
    //   var postURL = "<?php echo url('addmore'); ?>";
    //   var i=1;


    //   $('#add').click(function(){
    //        i++;
    //        $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select id="inputState" class="form-control"><option selected>Choose...</option> <option>...</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    //   });


    //   $(document).on('click', '.btn_remove', function(){
    //        var button_id = $(this).attr("id");
    //        $('#row'+button_id+'').remove();
    //   });


    //   $.ajaxSetup({
    //       headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       }
    //   });


    //   $('#submit').click(function(){
    //        $.ajax({
    //             url:postURL,
    //             method:"POST",
    //             data:$('#add_name').serialize(),
    //             type:'json',
    //             success:function(data)
    //             {
    //                 if(data.error){
    //                     printErrorMsg(data.error);
    //                 }else{
    //                     i=1;
    //                     $('.dynamic-added').remove();
    //                     $('#add_name')[0].reset();
    //                     $(".print-success-msg").find("ul").html('');
    //                     $(".print-success-msg").css('display','block');
    //                     $(".print-error-msg").css('display','none');
    //                     $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
    //                 }
    //             }
    //        });
    //   });


    //   function printErrorMsg (msg) {
    //      $(".print-error-msg").find("ul").html('');
    //      $(".print-error-msg").css('display','block');
    //      $(".print-success-msg").css('display','none');
    //      $.each( msg, function( key, value ) {
    //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    //      });
    //   }
    // });
</script>

@endsection
