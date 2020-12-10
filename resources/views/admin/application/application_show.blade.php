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
                        <td>Sufiyan Qureshi</td>
                    </tr>
                    <tr>
                        <th scope="row">Student Address</th>
                        <td>Sikar,Rajasthan</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>1234567890</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>email@email.com</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Nationality</th>
                        <td>Indian</td>
                    </tr>

                    <tr>
                        <th scope="row">Student University Prefrence-1</th>
                        <td><button class="btn btn-warning"> Pending</button>
                            <button class="btn btn-success"> Accepted</button>
                            <button class="btn btn-danger"> Decline</button>
                            <button class="btn btn-primary"> Pending</button>
                        </td>
                    </tr>


                    <tr>
                        <th scope="row">Date</th>
                        <td>12/12/2020</td>
                    </tr>
                    <tr>
                        <th scope="row">Time</th>
                        <td>12:12:12 P.M.</td>
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
                        <td>Sufiyan Qureshi</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>1234567890</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>email@email.com</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Nationality</th>
                        <td>Indian</td>
                    </tr>

                    <tr>
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
                    </tr>
                <tr >
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
                    <form  method="post" novalidate action="#">
                        <div class="form-group">
                            <label for="documents">Documents</label>

                        <br />
                        <label class="control-inline fancy-checkbox">
                    <div class="dynamic_document" id="dynamic_document">
                            <input type="checkbox" name="10marksheet" required data-parsley-check="[1,5]" data-parsley-errors-container="#error-checkbox3" checked>
                            <span>Marksheet-10</span>
                        </label>
                        <label class="control-inline fancy-checkbox">
                            <input type="checkbox" name="aadhar" checked>
                            <span>Aadhar Card</span>
                        </label>
                        <label class="control-inline fancy-checkbox">
                            <input type="checkbox" name="12marksheet" checked>
                            <span>Marksheet-12</span>
                        </label>
                        <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal"><i class="fa fa-plus"></i> </button>
                        <p id="error-checkbox3"></p>
                    </div>
                </div>
                    <div class="hard" id="upload_document">
                        <div class="card"  >
                            <div class="card-header">
                                Upload Document
                            </div>
                            <div class="body" id="nb" >
                                <input type="file" class="dropify">


                            </div>
                        </div>
                    </div>
                    <button type="button" name="uploaddocument" id="upload_document_button" class="btn btn-primary btn-m " ><i class="fa fa-plus"></i> </button>
                    <br>
                    {{-- <a href="#" type="submit" class="btn btn-primary btn-lg mt-4">Submit</a> --}}
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion" id="accordionExample">

    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            University Form #1
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>University Form-1</h2>
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

                                <form id="wizard_with_validation" method="POST">
                                    <h3>Account Information</h3>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Password " name="password" id="password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Confirm Password " name="confirm" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Profile Information</h3>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="First Name " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="surname" placeholder="Last Name " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input min="18" type="number" name="age" placeholder="Age " class="form-control" required>
                                                    <div class="help-info">The warning step will show up if age is less than 18</div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="address" cols="30" rows="3" placeholder="Address " class="form-control no-resize" required></textarea>
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
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            University Form #2
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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

                                <form id="wizard_with_validation2" method="POST">
                                    <h3>Account Information</h3>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Username " name="username" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Password " name="password" id="password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Confirm Password " name="confirm" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Profile Information</h3>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="First Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="surname" placeholder="Last Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input min="18" type="number" name="age" placeholder="Age" class="form-control" required>
                                                    <div class="help-info">The warning step will show up if age is less than 18</div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="address" cols="30" rows="3" placeholder="Address" class="form-control no-resize" required></textarea>
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
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            University Form #3
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>University Form-3</h2>
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

                                <form id="wizard_with_validation3" method="POST">
                                    <h3>Account Information</h3>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Username " name="username" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Password " name="password" id="password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Confirm Password " name="confirm" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Profile Information</h3>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="First Name " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="surname" placeholder="Last Name " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input min="18" type="number" name="age" placeholder="Age " class="form-control" required>
                                                    <div class="help-info">The warning step will show up if age is less than 18</div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="address" cols="30" rows="3" placeholder="Address " class="form-control no-resize" required></textarea>
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
      clc=0;
      $('#add_document2').click(function(){
      rt=$('#document_name').val()
    //   console.log(rt);
$('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name="12marksheet"><span>'+rt+'</span></label>')
$('#documentModal').modal('hide')
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
