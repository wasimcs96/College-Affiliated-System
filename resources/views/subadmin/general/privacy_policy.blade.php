@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Privacy&Policy')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action = "#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                           <label for="content">Terms and Conditions</label><br>
                           <textarea class="summernote" id="content" name="content" rows="10" cols="10" class="form-control" style="width:693px"></textarea>
                           <button type="submit" class="btn btn-primary">Store</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Inline Editor</h2>
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
            <div class="body">
                <div class="inline-editor">
                    <p class="m-b-0">You can select content and edit inline</p>
                    <h5>Title Heading will be <b>apear here</b></h5>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right mr-3"></i> There are many variations of passages</li>
                        <li><i class="fa fa-angle-right mr-3"></i> If you are going to use a passage of Ipsum</li>
                        <li><i class="fa fa-angle-right mr-3"></i> Contrary to popular belief, Ipsum is not simply</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</div>




@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">

@stop

@section('page-script')
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

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
