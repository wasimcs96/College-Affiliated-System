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
                            <form action="{{ route('booking.application.store')}}"  id="basic-form" method="POST" novalidate  enctype="multipart/form-data">

                                {{-- <div class="form-group">
                                    <label> Consultant Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$book->consultant->company_name}}"id="name" required>
                                </div> --}}
                                <input type="text" class="form-control" name="client_id" value="{{$book->client_id}}"id="name" hidden>
                                <input type="text" class="form-control" name="consultant_id" value="{{$book->consultant_id}}"id="name" hidden>
                                <input type="text" class="form-control" name="booking_id" value="{{$book->id}}"id="name" hidden>
                                {{-- dd({{$book->consultant_id}}); --}}
                                <div class="form-group">
                                    <label>Student First Name</label>
                                    <input type="text" class="form-control" value="{{$book->user->first_name}}" name="first_name" id="first_name" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Student Last Name</label>
                                    <input type="text" class="form-control" value="{{$book->user->last_name}}" name="last_name" id="last_name" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" rows="5" name="note" cols="30" required></textarea>
                                </div>
<div id="documentHtml"></div>
                                <div class="form-group">
                                    <?php $univers=$book->userConsultant->consultantUniversity;
                                    $increase=0;
                                      ?>

                                    <div class="table-responsive" style="width: 100%; margin-top: 36px;">
                                        <label for="name">Select University</label>
                                        <table class="table table-bordered" id="dynamic_field">
                                            <tr class="dynamic-added" >
                                                <td class="country" data-row_id="{{$increase}}">
                                                    <select id="country-{{$increase}}" custom1="{{$increase}}"  custom2="" class="form-control " name="country[{{$increase}}]" placeholder="Select Country" required>
                                                    <option value="" selected>Select Country </option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->countries_id}}">{{$country->countries_name}}</option>
                                                    @endforeach
                                                  </select>
                                                </td>
                                                <td class="university" data-row_id="{{$increase}}">
                                                    <select id="university-{{$increase}}" custom1="{{$increase}}"  custom2="" class="form-control " name="university[{{$increase}}]" placeholder="Select University" required>
                                                     <option value="" selected>Select University</option>
                                                  {{--  @foreach($univers as $univer)
                                                    <option value="{{$univer->userUniversity->id}}">{{$univer->userUniversity->university->university_name}}</option>

                                                    @endforeach--}}
                                                  </select>
                                                </td>
                                                  <td id="" class="course" data-row_id="{{$increase}}">
                                                      <select id="course-{{$increase}}" name="course[{{$increase}}]" class="form-control" required>
                                                        <option value="" selected>Select Course</option>
                                                    {{-- @foreach($courses as $course)
                                                   <option value="{{$course->id}}">{{$course->name}}</option>
                                                   @endforeach --}}
                                                 </select>
                                                <div id="courseError-{{$increase}}"></div>
                                                </td>
                                                <td><button type="button" name="add" id="add" class="btn btn-primary btn-m"><i class="fa fa-plus"></i></button></td>
                                                @php $increase++ @endphp
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
                                            <input type="hidden" name="document[{{$key}}]" value="0" hidden>
                                            <input class="checkbox" type="checkbox" name="document[{{$key}}]" value="{{$value}}" customValue="{{$value}}" checked>
                                            <span>{{$key}}</span>
                                            </label>
                                            {{-- {{ dd($key,$value) }} --}}
                                            @php $inc++ @endphp
                                        @endforeach
                                    </div>

                                    <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal" ><i class="fa fa-plus"></i> </button>
                                    <p id="error-checkbox3"></p>
                                    <input type="file" name="documents[]" class="dropify" multiple>
                                    @csrf
                                    <br>
                                </div>
                                <button type="submit" id="consultantCreateApplication" class="btn btn-primary">Create Application</button>
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
                    <form id="basic-form2" method="post" novalidate action="#">
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
      var table_row = {{$increase}} ;
// console.log(table_row);
      $('#add').click(function(){
             i++;
           $('#dynamic_field').append('<tr  id="row'+i+'" class="dynamic-added"><td class="country" data-row_id='+table_row+'><select custom1="'+table_row+'"  id="country-'+table_row+'" name="country['+table_row+']" class="form-control" required><option selected>Choose Country</option><?php foreach($countries as $country){?> <option value="{{$country->countries_id}}">{{$country->countries_name}}</option><?php }?></select></td><td class="university" data-row_id='+table_row+'><select id="university-'+table_row+'" custom1="'+table_row+'"  name="university['+table_row+']" class="form-control" required><option value="" selected>University Name</option></select></td><td class="course" data-row_id='+table_row+'><select id="course-'+table_row+'" custom1="'+table_row+'"  name="course['+table_row+']" class="form-control" required><option value="" selected>Course Name</option></select><div id="courseError-'+table_row+'"></div></td><td><button type="button" name="remove" id="'+table_row+'" class="btn btn-danger btn_remove">X</button></td></tr>');
           r=$('#dynamic_field .dynamic-added').length;

            if(r==5){
                $('#add').prop('disabled', true);
            }
            table_row++;
      });


    $('#add_document2').click(function(){
    rt=$('#document_name').val()
    //   console.log(rt);
    $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="hidden" name="document['+rt+']" value="0"  hidden><input type="checkbox" customValue="'+rt+'" name= "document['+rt+']" value="1" class="checkbox"><span>'+rt+'</span></label>')
    $('#documentModal').modal('hide');
    document.getElementById("basic-form2").reset();
    document_row++;
    });

    $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
        //    console.log(button_id);
           $('#row'+button_id+'').remove();
           r=$('#dynamic_field .dynamic-added').length;
            if(r<5){
                $('#add').prop('disabled', false);
            }
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
<script>
    $(document).on('change', '.country', function ()
                   {
                          dt  = $(this).data("row_id");

                          $.ajaxSetup({headers:
                           {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                           });
                           countryid=$('#country-'+dt+'').val();
                        //    console.log(countryid);
                                 $.ajax({
                                     url:"{{ route('fetch.university_application') }}",
                                     method:"GET",
                                     data:{countryid:countryid,dt:dt},
                                     success: function(result){
                                     $('#university-'+dt+'').html(result);
                                    //  console.log('success');
                                   }
                                   });

                       });

</script>
<script>
     $(document).on('change', '.university', function ()
                    {
                           dt  = $(this).data("row_id");

                           $.ajaxSetup({headers:
                            {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            });
                            universityid=$('#university-'+dt+'').val();
                            // console.log(universityid);
                                  $.ajax({
                                      url:"{{ route('fetch.course_application') }}",
                                      method:"GET",
                                      data:{universityid:universityid,dt:dt},
                                      success: function(result){
                                      $('#course-'+dt+'').html(result);
                                    }
                                    });

                        });

</script>


<script>
    $(document).on('click', '.checkbox', function(){
        //    var document = $(this).attr("customValue");
           var value1 = 1;
           var value0 = 0;
           var documents = [];
           var docs = []
           $('.checkbox').each(function(){
         if($(this).is(":checked"))
         {
            documents.push({document:$(this).attr("customValue"),value:value1});

         }
         else
         {
            documents.push({document:$(this).attr("customValue"),value:value0});

         }
       });
       docs = JSON.stringify(documents);
        //   console.log(docs);
        //   console.log(value1);
          $('#basic-form').append('<input  class="form-control" value="'+docs+'" name="docs" id="docs" hidden>')
      });
</script>

<script>
     var university = '';
     var course = '';
     var client_id = {{ $book->client_id }}
    $(document).on('change', '.course', function ()
                   {
                          dt  = $(this).data("row_id");
                          course = $('#course-'+dt+'').val();
             university = $('#university-'+dt+'').val();
        console.log(course)
        console.log(university)
        console.log(dt)
        console.log(client_id)
                              $.ajaxSetup({headers:
                            {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            });

                                  $.ajax({
                                      url:"{{ route('consultant.university.course.check') }}",
                                      method:"GET",
                                      data:{university:university,course:course,client_id:client_id},
                                      success: function(result){
                                        if(result!='')
                                        {
                                        $('#courseError-'+dt+'').html(result);
                                        $('#course-'+dt+'').prop('selectedIndex',-1);
                                        }
                                        else
                                        {
                                            $('#courseError-'+dt+'').html('');
                                        }
                                    }
                                    });

                       });

</script>
{{-- <script>
    var university = '';
    var course = '';
    var client_id = {{ $book->client_id }}
   $(document).on('change', '', function ()
                  {
                         dt  = $(this).data("row_id");
                         course = $('#course-'+dt+'').val();
            university = $('#university-'+dt+'').val();
       console.log(course)
       console.log(university)
       console.log(dt)
       console.log(client_id)
                             $.ajaxSetup({headers:
                           {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                           });

                                 $.ajax({
                                     url:"{{ route('consultant.university.course.check') }}",
                                     method:"GET",
                                     data:{university:university,course:course,client_id:client_id},
                                     success: function(result){
                                       $('#courseError-'+dt+'').html(result);
                                       $('#course-'+dt+'').prop('selectedIndex',-1);                                   }
                                   });

                      });

</script> --}}
@stop
