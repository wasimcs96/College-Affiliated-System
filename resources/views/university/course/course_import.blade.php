@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Add Course')

@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Add Course</h2>
            </div>
            <div class="body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @php
                        $categorys = DB::table('categories')->select('parent_id', 'title')->distinct('parent_id')->get()->toArray();
                    @endphp
                 {{-- {{  dd($categorys) }} --}}
                    <div class="form-group">
                        <label for="title">Discipline</label>
                        <select name="parent_id" class="form-control" id="parent_category" required>
                            <option value="">--- Select Discipline ---</option>
                            @foreach ($categories->unique('parent_id')  as $category)
                                @if($category->parent_id != NULL)
                                    <option value="{{ $category->parent_id }}">{{ $category->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Select Sub-Discipline</label>
                        <select name="category_id" class="form-control" id="category" required>
                            <option value="">--- Select Discipline ---</option>
                            {{-- <option value="">--- Select  Category ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title ?? '' }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Import Courses</label>
                        <input type="file" name="file" class="form-control" style="padding-bottom: 33px;">
                    </div>

                    <button type="submit" class="btn btn-primary">Import Courses</button>
                </form>
            </div>
        </div>
    </div>

</div>



@stop

@section('page-styles')
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
    $(document).on('change', '#parent_category', function ()
                   {
                        //   dt  = $(this).data("row_id");

                          $.ajaxSetup({headers:
                           {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                           });
                           parentid=$('#parent_category').val();
                           console.log(parentid);
                                 $.ajax({
                                     url:"{{ route('fetch.category.course') }}",
                                     method:"GET",
                                     data:{parentid:parentid},
                                     success: function(result){
                                     $('#category').html(result);
                                   }
                                   });

                       });

</script>
@stop
