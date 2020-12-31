@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Application')

@section('content')


<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Booking Details<small>
                {{-- <h6>Booking Details of Sufiyan Qureshi</h6></b> --}}
                </small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <a href="#" data-toggle="modal" data-target="#followUpModal" class="btn btn-primary" ><i class="fa fa-plus" style="margin-right: 8px;"></i>Add Follow Up</a>
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
                                <form id="basic-form" method="post" novalidate action="{{route('consultant.application.followup.store')}}">
                                    @csrf
                                    {{-- <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div> --}}
                                  <input type="text" name="application_id" value={{$application->id}} hidden>
                                    <div class="form-group">
                                        <label style="color:white">Note</label>
                                        <textarea class="form-control" name="note" rows="5" cols="30" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:white">Date</label>
                                        <input  class="form-control" name="date" id="date" required>
                                    </div>
                                    <br>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Add Follow Up</button>
                        </form>
                                    </div>
                </div>
                </div>
                </div>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                    <tr>
                        <th scope="row">Student Name</th>
                        <td>{{$application->booking->user->first_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Student Address</th>
                        <td>{{$application->booking->user->address}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>{{$application->booking->user->mobile}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>{{$application->booking->user->email}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Country</th>
                        <td>{{$application->booking->user->country}}</td>
                    </tr>
                    {{--
                        @foreach($bookings as $booking)
                    <tr>
                        <th scope="row">Student University {{$booking['university']}} </th>
                        <td>{{$booking['course']}}</td>
                    </tr>{{$course0->name}}
                        @endforeach --}}
                    <tr>
                        <th scope="row">Student University/Course Preference-1</th>
                        <td>{{$university0->university_name}}/{{$course0->name}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University/Course Prefrence-2</th>
                        <td>{{$university1->university_name}}/{{$course1->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Student University/Course Prefrence-3</th>
                        <td>{{$university2->university_name}}/{{$course2->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date</th>
                        <td>{{$application->booking->booking_date}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Time-Slot</th>
                        <td>{{$application->booking->booking_start_time}}-{{$application->booking->booking_end_time}}</td>
                    </tr>
           </div>

        {{-- </tr> --}}
               </tbody>

                </table>
                {{-- <div id="res">

                </div>
                <br>
                <div id="dec">

                </div> --}}
                {{-- <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('consultant.bookings')}}" id="bac" class="btn btn-danger btn-flat">Decline</a> --}}
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Application Details<small>
                {{-- <h6>Booking Details of Sufiyan Qureshi</h6></b> --}}
                </small></h2>
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
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped" >

                    <tbody>


                    <tr>
                        <th scope="row">Student Name</th>
                        <td>{{$application->user->first_name}} {{$application->user->last_name}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>{{$application->user->mobile}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>{{$application->user->email}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Country</th>
                        <td>{{$application->user->country}}</td>
                    </tr>
       </div>


                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Documents</h2>
                </div>

            <div class="body">
                <div class="form-group">
                    <?php $documentarray = Config::get('define.document');
                    $inc=0;
                    $documentSelect = json_decode($application->documents);
                    ?>
                    <label for="documents">Documents</label>
                    <br/>
                    <div class="dynamic_document" id="dynamic_document">
                        @foreach($documentarray as $key => $value)

                        <label class="control-inline fancy-checkbox">
                            @if(in_array($value,$documentSelect))
                        {{-- <input type="checkbox" name="document[{{$inc}}]" value="{{$value}}" multiple> --}}
                            <input type="checkbox" name="document[{{$inc}}]" value="{{$value}}" checked required >

                            <span>{{$value}}</span>
                            @else
                            <input type="checkbox" name="document[{{$inc}}]" value="{{$value}}" required >

                            <span>{{$value}}</span>
                            @endif
                            @php $inc++ @endphp
                            @endforeach
                        </label>
                    </div>

                    <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal" ><i class="fa fa-plus"></i> </button>
                    <p id="error-checkbox3"></p>
                    <label for="uploaded_documents">Uploaded Documents</label>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            @if(!empty($application->applicationDocument) && $application->applicationDocument != null)
                            <div class="form-group">
                                      <div id="lightgallery" class="row clearfix lightGallery">

                                    <?php $rts=$application->applicationDocument;?>
                                    @if($rts->count()>0)
                                    @foreach($rts as $rt)

                                      <div style="margin-left:24px; ">
                                      <input type="text" class="" value="{{$rt->id}}" name="media_id" hidden>
                                        <div class="img-responsive iws">
                                            <a class="light-link" href="{{asset($rt->file)}}"><img class="img-fluid rounded" src="{{asset($rt->file)}}"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>
                                            <div class="card-body">
                                                <a href="{{asset($rt->file)}}" class="btn btn-primary" target="_blank" download style="margin-left: 19px;">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                      </div>

                                      @endforeach
                                      @else
                                      <h2 class="mt-5" style="text-align: center"> No Media Available</h2>
                                      @endif

                                  </div>

                                    </div>
    @endif
<label for="">Upload Document</label>
                    <input type="file" name="documents[]" class="dropify" multiple>
                    @csrf
                    <br>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@foreach($application->applicationAppliedUniversity as $key=>$applied)

<div class="accordion" id="accordionExample">

    <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
              University Form #{{$key+ 1}}
            </button>
          </h2>
        </div>
        <div id="collapse-{{$key}}" class="collapse" aria-labelledby="heading-{{$key}}" data-parent="#accordionExample">
          <div class="card-body">
              <div class="col-lg-12">
                  <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="card">
                              <div class="header">
                                  <h2>University Form-{{$key+ 1}} </h2>
                                  <ul class="header-dropdown dropdown">

                                      <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                                  </ul>
                              </div>
                              <div class="body wizard_validation">

                                  <form id="wizard_with_validation{{$key}}" method="POST">
                                      <h3>University Information</h3>
                                      <fieldset>
                                          <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="@if(isset($applied->university->university_name)){{$applied->university->university_name}}@endif" placeholder="University Name" name="university" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="@if(isset($applied->course->name)){{$applied->course->name}}@endif" placeholder="Course" name="course" id="course" disabled>
                                                </div>
                                            </div>
                                            <input type="text" name="university_id" value="{{$applied->university->id}}" hidden>
                                            <input type="text" name="apply_id" value="{{$applied->id}}" hidden>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                 @if($applied->Is_applied==0) <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#applyModal">In Progress</a>@endif
                                                 @if($applied->Is_applied==1)<div class="btn btn-success">Applied</div>@endif
                                                 {{-- @if($applied->approved_status==2)<div class="btn btn-danger">Cancelled</div>@endif --}}
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Confirm Password " name="confirm" required>
                                                </div>
                                            </div> --}}
                                          </div>
                                      </fieldset>
                                      <h3>Profile Information</h3>
                                      <fieldset>
                                          <div class="row clearfix">
                                              <div class="col-lg-4 col-md-12">
                                                  <div class="form-group">
                                                      <input type="text" name="name" placeholder="First Name" class="form-control" >
                                                  </div>
                                              </div>
                                              <div class="col-lg-4 col-md-12">
                                                  <div class="form-group">
                                                      <input type="text" name="surname" placeholder="Last Name" class="form-control" >
                                                  </div>
                                              </div>
                                              <div class="col-lg-4 col-md-12">
                                                  <div class="form-group">
                                                      <input type="email" name="email" placeholder="Email" class="form-control" >
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <input min="18" type="number" name="age" placeholder="Age" class="form-control" >
                                                      <div class="help-info">The warning step will show up if age is less than 18</div>
                                                  </div>
                                                  <div class="form-group">
                                                      <textarea name="address" cols="30" rows="3" placeholder="Address" class="form-control no-resize" ></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                      </fieldset>
                                      <h3>Terms Conditions - Finish</h3>
                                      <fieldset>
                                          <div class="form-group">
                                              <div class="fancy-checkbox">
                                                  <label><input type="checkbox" name="acceptTerms"><span>I agree with the Terms and Conditions.</span></label>
                                              </div>
                                          </div>
                                      </fieldset>


                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>        </div>
        </div>
      </div>

  </div>
  <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Apply for Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                  <h4>  Are you sure you want to apply for this University?</h4>

        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" custom1="{{$applied->id}}"class="btn btn-primary" id="apply"> Apply </a>
        </div>
    </div>
</div>
</div>

@endforeach




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
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-steps/jquery.steps.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<style>
.ui-datepicker-header .ui-icon {
    border:2px solid black;
}
</style>
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-steps/jquery.steps.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/form-wizard.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function(){
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;
      var document_row = {{$inc}} ;
      clc=0;
      $('#add_document2').click(function(){
      rt=$('#document_name').val()
      //   console.log(rt);
      $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name= "document['+document_row+']" value="'+rt+'"><span>'+rt+'</span></label>')
      // $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name="12marksheet"><span>'+rt+'</span></label>')
      $('#documentModal').modal('hide')
      document_row++
    });

    $('#upload_document_button').click(function(){
    //   rt=$('#document_name').val()
    //   console.log(rt);
    clc=clc+1;
    $('#nb').append('<input type="file" class="dropify" id="dr'+clc+'">')
    $('#dr'+clc+'').dropify();

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
    alert('File deleted');
    });

$('.dropify-fr').dropify({
    messages: {
        default: 'Glissez-déposez un fichier ici ou cliquez',
        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
        remove: 'Supprimer',
        error: 'Désolé, le fichier trop volumineux'
    }
});
// $( "#nb" ). load(window. location. href + " #nb" );
$('#documentModal').modal('hide')
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

<script>
$(document).on('click', '#apply', function ()
{

       var university_id = $('input[name="university_id"]').val();
       var application_id = $('input[name="apply_id"]').val();
 console.log(application_id);
       $.ajaxSetup({headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
                type: "post",
                url: "{{route('application.apply')}}",
                data: {university_id:university_id,application_id:application_id},
                success: function (result) {
                    console.log('success');
                }
            });
            // $(this).text("Pending");
            $('#applyModal').modal('hide');
            // row++;
    });

    $(document).ready(function () {
    $('#date').datepicker({
        dateFormat: 'mm-dd-yy',
         minDate: 0,
         maxDate:"4w"
    });
});
</script>
{{-- <script>
    $("#date").datepicker({ onSelect: function(dateText) {
        dateFormat: 'mm-dd-yyyy',
         minDate: '-0D',
         maxDate: '+28D',
    });
</script> --}}
 {{-- <script>
//    $(document).ready(function() {
//   $("#date").datepicker({
//       minDate: -3,
//       maxDate: "1w"
//   });
// });
// </script> --}}
@stop
