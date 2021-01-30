@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'About')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action = "{{route('subadmin.about.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <?php $select=App\Models\Page::where('page_type',0)->get()->first();?>
                    <div class="form-group">
                        <div class="row">
                        {{-- <div class="form-group col-lg-6">
                            <label>Title</label>
                            <input type="text" class="form-control" maxlength="100" name="title" value="{{$select->title ?? ''}}" id="name" required>
                        </div> --}}
                        <input type="hidden" name="title" value="About Us">
                        {{-- <div class="form-group col-lg-6">
                            <label>Subtitle</label>
                            <input type="text" class="form-control" value="{{$select->sub_title ?? ''}}" name="sub_title" id="name" required>
                        </div> --}}

                        {{-- <div class="form-group col-lg-4">
                            <label>Status</label>
                            <select name="type" class="form-control">
                                <option value="">-- Select --</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>

                            </select>
                       </div> --}}
                    </div>
                        {{-- <div class="form-group">
                            <label for="content">Short Description</label><br>
                        <textarea class="summernote" id="Short_description" value="" name="short_description" rows="10" cols="10" class="form-control" style="width:693px">{{$select->short_description ?? ''}}</textarea>
                        </div> --}}
                    <input type="hidden" name="page_type" value="0">

                           <label for="content">Add About Us </label><br>
                           <textarea class="summernote" id="description" value="" name="description" rows="10" cols="10" class="form-control" style="width:693px">{{$select->description ?? ''}}</textarea>

                           <div class="form-group">
                            <br>   <label for="content">Banner Image</label><br>
                       <div class="body"id="nb"  >
                          <input type="file" name="image"class="dropify" multiple>
                       </div>

                </div>
                <br>
                           <button type="submit" class="btn btn-primary">Store</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>




@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">

@stop

@section('page-script')
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
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
@stop
