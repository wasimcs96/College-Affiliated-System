@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Edit Course')

@section('content')



<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Course</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="POST" enctype="multipart/form-data" action="{{route('university.course.update', $universitycourse->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="course_id">Course Name</label>
                        <select name="course_id" class="form-control" required>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"<?php if($universitycourse->course_id ==  $course->id) { echo "selected"; } ?>>{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                   <input type="text" name="university_id" value="{{auth()->user()->university->id}}" hidden>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" value="" name="description" rows="5" cols="30" required>{{$universitycourse->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Fees</label>
                        <input type="number" name="fees" value= "{{$universitycourse->fees}}"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Course Start Date</label>
                        <input type="date" name="start_date" value="{{$universitycourse->start_date}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Course End Date</label>
                        <input type="date" name="end_date" value="{{$universitycourse->end_date}}" class="form-control" required>
                    </div>
                    <input type="hidden" value="{{$universitycourse->id}}" name="university_course_id">
                    <!--  Show Uploaded Image   -->

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            {{-- @if(!empty(auth()->user()->university->universityCourse->courseMedia) && auth()->user()->university->universityCourse->courseMedia != null) --}}
                            <div class="form-group">
                              <div id="lightgallery" class="row clearfix lightGallery">
                                 @foreach($universitycourse->courseMedia as $rt)

                                                {{-- {{dd($rt->course->courseMedia)}} --}}
                                        @if ($rt->file_type==0)
                                                <div style="margin-left:24px;" id="{{$rt->id}}">
                                                    <input type="text" class="" value="{{$rt->id}}" name="media_id" hidden id="deleteRecord">
                                                        <div class="img-responsive iws">
                                                            <a class="light-link" href="{{asset($rt->media)}}"><img class="img-fluid rounded" src="{{asset($rt->media)}}"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>
                                                            <div class="card-body">
                                                                {{-- <a href="{{route('course.media.destroy',['id'=>$cm->id])}}"  class="deleteRecord" data-id="{{auth()->user()->id}}" ><h5 style="color: red; position:absolute;   top: 0;
                                                                    right: 0;"><i class="fa fa-times" aria-hidden="true"></i></h5></a> --}}

                                                                <span class="closes"  custom2="{{$rt->id}}" title="Delete">
                                                                    <a href="javascript:void(0)"  custom1="{{$rt->id}}" data-id="{{auth()->user()->id}}" onclick="deleteRecord()" >&times;</a></span>
                                                            </div>
                                                        </div>
                                                </div>
                                        @else
                                            No Data Found.
                                         @endif


                                 @endforeach
                                </div>
                             </div>
                                     {{-- @endif --}}
                        </div>
                    </div>
                    <div class="form-group">
                                <label>Upload Media</label>
                           <div class="body"id="nb"  >
                              <input type="file" name="image[]"class="dropify" multiple>
                           </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>



@stop

@section('page-styles')
<style>


    .iws {
    position: relative;
    display: inline-block;

    font-size: 0;
    }
    .iws .closes {
    position: absolute;
    top: 5px;
    right: 8px;
    z-index: 6;
    background-color:#22252a;
    padding: 4px 3px;

    color: #000;
    font-weight: bold;
    cursor: pointer;

    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
    border:1px solid #22252a;
    }
    .iws:hover .closes {
    opacity: 1;
    }
    </style>
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">

@stop

@section('page-script')

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

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


<script>
    var media_id=""



    $('.closes').click(function(){


        var media_id = $(this).attr('custom2');
    console.log(media_id);
    document.getElementById(media_id).style.display="none";
    console.log(media_id);
            $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
                });
                $.ajax({
                    type: "post",
                    url: "{{route('course.media.delete')}}",
                    data: {media_id: media_id},
                    success: function (result) {
                        console.log('success');

                    }
                });



    });
     </script>
@stop
