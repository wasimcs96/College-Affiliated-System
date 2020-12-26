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

                    {{-- <tr>
                        <th scope="row">Student University Prefrence-1</th>
                        <td>RTU</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-2</th>
                        <td>BTU</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-3</th>
                        <td>CTU</td>
                    </tr> --}}
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

                    {{-- <tr>
                        <th scope="row">Student University Prefrence-1</th>
                        <td>RTU</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-2</th>
                        <td>BTU</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-3</th>
                        <td>CTU</td>
                    </tr> --}}
          <!--      <tr >
             <th scope="row">Documents</th>
            <td > Marksheet-10
                {{-- <button type="button" name="add_document" id="add_document" class="btn btn-primary btn-m ml-3" data-toggle="modal" data-target="#documentModal"><i class="fa fa-plus"></i> </button> --}}
            </td>

                </tr>
        </div>

               <th scope="row">Document-2</th>
           <td > Marksheet-12
               {{-- <button type="button" name="add_document" id="add_document" class="btn btn-primary btn-m ml-3" data-toggle="modal" data-target="#documentModal"><i class="fa fa-plus"></i> </button> --}}
           </td>
               </tr>
               <th scope="row">Document-3</th>
           <td > Aadhar
               {{-- <button type="button" name="add_document" id="add_document" class="btn btn-primary btn-m ml-3" data-toggle="modal" data-target="#documentModal"><i class="fa fa-plus"></i> </button> --}}
           </td>
               </tr>
               <th scope="row">Document-4</th>
           <td > Domicile certificate
               {{-- <button type="button" name="add_document" id="add_document" class="btn btn-primary btn-m ml-3" data-toggle="modal" data-target="#documentModal"><i class="fa fa-plus"></i> </button> --}}
           </td>
               </tr>  -->
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
                    <input type="file" name="documents[]" class="dropify" multiple>
                    @csrf
                    <br>
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
              University Form #2
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
                                  <h2>University Form-2</h2>
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
                              <div class="body wizard_validation">

                                  <form id="wizard_with_validation{{$key}}" method="POST">
                                      <h3>Account Information</h3>
                                      <fieldset>
                                          <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="@if(isset($applied->university->university_name)){{$applied->university->university_name}}@endif" placeholder="Username" name="username" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="@if(isset($applied->course->title)){{$applied->course->title}}@endif" placeholder="Password " name="password" id="password">
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



@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-steps/jquery.steps.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
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
@stop
