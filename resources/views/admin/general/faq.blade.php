@extends('layout.master')
@section('parentPageTitle', 'admin')
@section('title', 'FAQ')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action = "{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="name" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Subtitle</label>
                            <input type="text" class="form-control" name="sub_title" id="name" required>
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Status</label>
                            <select name="type" class="form-control" required>
                                <option value="">-- Select --</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>

                            </select>
                       </div>
                    </div>
                        <div class="form-group">
                            <label for="content">Question</label><br>
                            <input type="text" class="form-control" name="short_description"  maxlength="100" required>
                        </div>


                           <label for="content">Answer</label><br>
                           <textarea class="summernote" id="content" name="description" rows="10" cols="10" class="form-control" style="width:693px"required></textarea>

                           <div class="form-group">
                            <br>   <label for="content">Banner Image</label><br>
                       <div class="body"id="nb"  >
                          <input type="file" name="image"class="dropify" multiple >
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
