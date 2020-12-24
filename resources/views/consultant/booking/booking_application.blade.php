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
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('booking.application.store')}}"  id="basic-form" method="POST" novalidate action="#">

                                <div class="form-group">
                                    <label> Consultant Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$book->consultant->company_name}}"id="name" required>
                                </div>
                                <input type="text" class="form-control" name="client_id" value="{{$book->client_id}}"id="name" hidden>
                                <input type="text" class="form-control" name="consultant_id" value="{{$book->consultant_id}}"id="name" hidden>
                                <input type="text" class="form-control" name="booking_id" value="{{$book->id}}"id="name" hidden>
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" value="{{$book->user->first_name}}" name="father_name" id="father_name" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" name="mobile" id="mobile" required>
                                </div> --}}
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control" rows="5" name="note" cols="30" required></textarea>
                                </div>


                                {{-- <div class="form-group">
                                    <label for="selectmore">Select Universities and Courses</label>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr class="dynamic-added">
                                            <td > <select id="inputState" class="form-control FulNamo" >
                                                <option selected>Choose University</option>
                                                <option>RTU</option>
                                                <option>BTU</option>
                                                <option>CTU</option>
                                              </select></td>
                                              <td> <select class="form-control FulNamo"  id="inputGroupSelect01">
                                                <option selected>Choose Course</option>
                                                <option value="1">B.Tech</option>
                                                <option value="2">MBA</option>
                                                <option value="3">MBBS</option>
                                              </select></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-primary btn-m"><i class="fa fa-plus"></i> </button></td>
                                        </tr>
                                    </table>
                                </div> --}}

                                <div class="form-group">
                                    <label for="documents">Documents</label>

                                <br />
                                <label class="control-inline fancy-checkbox">
                            <div class="dynamic_document" id="dynamic_document">
                                    <input type="checkbox" name="docs" value="Marksheet-10" required data-parsley-check="[1,5]" data-parsley-errors-container="#error-checkbox3">
                                    <span>Marksheet-10</span>
                                </label>
                                <label class="control-inline fancy-checkbox">
                                    <input type="checkbox" name="docsb" value="Aadhar_Card">
                                    <span>Aadhar Card</span>
                                </label>
                                <label class="control-inline fancy-checkbox">
                                    <input type="checkbox" name="docsbb" value="Marksheet-12">
                                    <span>Marksheet-12</span>
                                </label>

                            </div>
                                <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal"><i class="fa fa-plus"></i> </button>
                                <p id="error-checkbox3"></p>




                                @csrf
                                <br>
                                <button type="submit" class="btn btn-primary">Confirm Booking</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Document Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="basic-form" method="post" novalidate action="#">
                <div class="form-group">
                    <label>Document Name</label>
                    <input type="text" class="form-control" name="document_name" id="document_name" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type= class="btn btn-primary">Submit</button> --}}
<a href="javascript:void(0)" class="btn btn-primary" id="add_document2"> Add </a>
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
           $('#dynamic_field').append('<tr  id="row'+i+'" class="dynamic-added"><td><select id="inputState" class="form-control"><option selected>Choose...</option> <option>...</option></select></td><td><select id="inputGroupSelect01" class="form-control"><option selected>Choose...</option> <option>...</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
</script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script>
$(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
