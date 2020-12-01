@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Application')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Generate Application for Student</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
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
                                                    <span class="la la-credit-card form-icon"></span>
                                                    <input class="form-control" type="text" name="text" placeholder="Card holder name" required>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <label class="label-text">Course  Name</label>

                                            <div class="input-group mb-3 FulNam" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Course</label>
                                                  </div>
                                                <select class="custom-select FulNamo"  id="inputGroupSelect01">
                                                  <option selected>Choose...</option>
                                                  <option value="1">One</option>
                                                  <option value="2">Two</option>
                                                  <option value="3">Three</option>
                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="table-responsive" style="width: 100%;     margin-top: 36px;">
                                                <label for="name">University  Name</label>
                                                <table class="table table-bordered" id="dynamic_field">
                                                    <tr>
                                                        <td> <select id="inputState" class="form-control FulNamo" >
                                                            <option selected>Choose...</option>
                                                            <option>...</option>
                                                          </select></td>
                                                          <td> <select class="custom-select FulNamo"  id="inputGroupSelect01">
                                                            <option selected>Choose...</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                          </select></td>
                                                        <td><button type="button" name="add" id="add" class="btn btn-primary btn-m">Add More</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end col-lg-6 -->
                                      <!-- end col-lg-6 -->
                                        <!-- end col-lg-6 -->
                                        <!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                               <a href="#" class="btn btn-primary btn-lg">Confirm Booking</a>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end tab-pane-->


                    </div><!-- end tab-content -->
                </div><!-- end form-content -->
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

<script type="text/javascript">
    $(document).ready(function(){
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select id="inputState" class="form-control"><option selected>Choose...</option> <option>...</option></select></td><td></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
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
</script>

@stop
