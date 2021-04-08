@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Category')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Edit Your Category</h2>
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
                            <form id="basic-form" method="post" novalidate action="{{route('admin.category.update', $category->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Parent Category</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">--- Select Parent Category ---</option>
                                         @foreach ($categories as $cate)
                                        {{-- <option value="">--- Select Parent Category ---</option> --}}
                                        <option value="{{$cate->id}}" <?php if($cate->id == $category->parent_id) { echo "selected"; } ?>>{{ $cate->title }}</option>
                                        {{-- @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}">{{ $categories->title }}</option>--}}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{$category->title}}" name="title" id="title" required>
                                </div>

                                {{-- <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" value="{{$category->slug}}" name="slug" id="slug" required>
                                </div> --}}
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if($category->status == 1) { echo "selected"; } ?>>Active</option>
                                        <option value="0" <?php if($category->status == 0) { echo "selected"; } ?>>InActive</option>
                                    </select>
                               </div>
                               <div class="form-group">
                                <div id="lightgallery" class="row clearfix lightGallery">
                                <div style="margin-left:24px; "  id="{{$category->id}}">
                                <input type="text" class="" value="{{$category->id}}" name="media_id" hidden>
                                  <div class="img-responsive iws">
                                      <a class="light-link" href="{{asset($category->banner)}}"><img class="img-fluid rounded" src="{{asset($category->banner)}}"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>
                                      <br>
                                      <br>

                                      <div class="card-body">
                                          <span class="closes" custom2="{{$category->id}}"  title="Delete" ><a href="javascript:void(0)" id="deleteRecord" custom1="{{$category->id}}" data-id="{{auth()->user()->id}}" >&times;</a></span>

                                      </div>
                                  </div>
                                </div>
                                </div>

                              </div>
                               <div class="form-group">
                                Update Category Image
                           <div class="body"id="nb"  >
                              <input type="file" name="image"class="dropify" >
                           </div>

                    </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                                <a href="{{route('admin.category')}}"class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
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
<link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
td.details-control {
background: url('../assets/images/details_open.png') no-repeat center center;
cursor: pointer;
}
tr.shown td.details-control {
    background: url('../assets/images/details_close.png') no-repeat center center;
}
</style>

<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
td.details-control {
background: url('../assets/images/details_open.png') no-repeat center center;
cursor: pointer;
}
tr.shown td.details-control {
    background: url('../assets/images/details_close.png') no-repeat center center;
}
</style>
@stop
@section('page-script')

<script src="{{ asset('assets/bundles/lightgallery.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/medias/image-gallery.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>


<script>
    $('.dropify-frrr').dropify({
        messages: {
            default: 'Upload Image',
            replace: 'Upload  Image',
            remove: 'Cancel',
            error: 'Sorry,the file is too large'
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
                url: "{{route('media.destroy')}}",
                data: {media_id: media_id},
                success: function (result) {
                    console.log('success');

                }
            });



});
 </script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@stop
