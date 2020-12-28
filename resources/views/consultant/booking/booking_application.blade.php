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

                </ul>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('booking.application.store')}}"  id="basic-form" method="POST" novalidate action="#" enctype="multipart/form-data">

                                {{-- <div class="form-group">
                                    <label> Consultant Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$book->consultant->company_name}}"id="name" required>
                                </div> --}}
                                <input type="text" class="form-control" name="client_id" value="{{$book->client_id}}"id="name" hidden>
                                <input type="text" class="form-control" name="consultant_id" value="{{$book->consultant_id}}"id="name" hidden>
                                <input type="text" class="form-control" name="booking_id" value="{{$book->id}}"id="name" hidden>
                                <div class="form-group">
                                    <label>Student First Name</label>
                                    <input type="text" class="form-control" value="{{$book->user->first_name}}" name="first_name" id="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Student Last Name</label>
                                    <input type="text" class="form-control" value="{{$book->user->last_name}}" name="last_name" id="last_name" required>
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
                                    <label>Note</label>
                                    <textarea class="form-control" rows="5" name="note" cols="30" required></textarea>
                                </div>


                                {{-- <div class="form-group">
                                    <label for="selectmore">Select Universities and Courses</label>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr class="dynamic-added">
                                            <td > <select id="inputState" class="form-control FulNamo" >
                                                <option selected>Choose University</option>

                                            @foreach($universities as $key => $value)
                                                <option value={{$value->university_name}}>{{$value->university_name}}</option>
                                            @endforeach
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
                                    <?php $univers=$book->consultant->consultantUniversity;
                                    $increase=0;
                                    $inc=1;
                                    ?>
                                    <div class="table-responsive" style="width: 100%;margin-top: 36px;">
                                        <label for="name">Select University</label>
                                        <table class="table table-bordered" id="dynamic_field">
                                            <tr class="dynamic-added" data-row_id="{{$increase}}">

                                                <td> <select id="university" custom1="{{$increase}}" data-row_id="{{$increase}}" custom2="" class="form-control FulNamo" name="university[{{$increase}}]" placeholder="Select University">
                                                    <option value="" selected>University Name</option>
                                                    @foreach($univers as $univer)
                                                    <option value="{{$univer->university->id}}">{{$univer->university->university_name}}</option>
                                                    @endforeach
                                                  </select></td>
                                                  <td> <select id="course-{{$increase}}" name="course[{{$increase}}]" class="form-control FulNamo" >
                                                    <?php $univers=$book->consultant->consultantUniversity;
                                                    $increase=0;
                                                    $inc=1;
                                                    ?>
                                                    @foreach($univers as $univer)
                                                   <option value="0">BTech</option>
                                                   <option value="1">MTech</option>
                                                   @endforeach
                                                    {{-- <option selected>Course Name</option>
                                                <?php $course=$univer->university->universityCourse ;
                                               ?>


                                                  </select></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-primary btn-m"><i class="fa fa-plus"></i></button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php $documentarray = Config::get('define.document');
                                    $inc=0;
                                    ?>
                                    <label for="documents">Documents</label>

                                     <br/>

                                    <div class="dynamic_document" id="dynamic_document">
                                        @foreach($documentarray as $key => $value)
                                        <label class="control-inline fancy-checkbox">
                                        {{-- <input type="checkbox" name="document[{{$inc}}]" value="{{$value}}" multiple> --}}
                                            <input type="checkbox" name="document[{{$inc}}]" value="{{$value}}" required >

                                            <span>{{$value}}</span>
                                            @php $inc++ @endphp
                                            @endforeach
                                        </label>
                                    </div>

                                    <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal" ><i class="fa fa-plus"></i> </button>
                                    <p id="error-checkbox3"></p>
                                    <input type="file" name="documents[]" class="dropify" multiple>
                                    @csrf
                                    <br>
                                </div>
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
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
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
      var i=0;
      var document_row = {{$inc}} ;

      $('#add').click(function(){
             i++;
           $('#dynamic_field').append('<tr  id="row'+i+'" class="dynamic-added"><td><select custom1="'+i+'" data-row_id="{{$increase}}" id="university" name="university['+i+']" class="form-control"><option selected>Choose University</option><?php foreach($univers as $univer){?> <option value="{{$univer->university->id}}">{{$univer->university->university_name}}</option><?php }?></select></td><td><select id="course-'+i+'" name="course['+i+']" class="form-control"><option value='+i+'>Course</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
           r=$('#dynamic_field .dynamic-added').length;
            if(r==3){
                $('#add').prop('disabled', true);
            }



      });

    $('#add_document2').click(function(){
    rt=$('#document_name').val()
    //   console.log(rt);
    $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name= "document['+document_row+']" value="'+rt+'"><span>'+rt+'</span></label>')
    $('#documentModal').modal('hide')
    document_row++;
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


    function printErrorMsg (msg)
    {
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
