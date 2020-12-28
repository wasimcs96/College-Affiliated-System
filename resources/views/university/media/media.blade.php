@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Media')


@section('content')

  <div class="col-lg-12 col-md-7">
        <div class="card">
            <div class="header">
                <h2>University Media</h2>
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
                <form action="{{ route('university.media.store')}}" method="POST" enctype="multipart/form-data" >
@csrf
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        @if(!empty(auth()->user()->university->universityMedia) && auth()->user()->university->universityMedia != null)
                        <div class="form-group">
                                  <div id="lightgallery" class="row clearfix lightGallery">

                                <?php $rts=auth()->user()->university->universityMedia;?>
                                @if($rts->count()>0)
                                @foreach($rts as $rt)
                                @if ($rt->file_type==0)
                                {{-- <div class="card">
                                    <img style="height: 84px;" src="{{asset($rt->media)}}" class="card-img-top" alt="...">

                                  </div> --}}
                                  {{-- <div id="lightgallery" class="row clearfix lightGallery">
                                    <div class="col-lg-4 col-md-5 mb-4"><a class="light-link" href="{{asset($rt->media)}}"><img class="img-fluid rounded" src="{{asset($rt->media)}}" alt=""></a></div>
                                  </div> --}}
                                  <input type="text" class="" value="{{$rt->id}}" name="media_id" hidden>
                                    <div class="col-lg-3 col-md-5 m-b-30"><a class="light-link" href="{{asset($rt->media)}}"><img class="img-fluid rounded" src="{{asset($rt->media)}}"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>

                                        <div class="card-body">
                                            <a href="{{route('media.destroy',['id'=>$rt->id])}}"  class="deleteRecord" data-id="{{auth()->user()->id}}" ><h5 style="color: red; position:absolute;   top: 0;
                                                right: 0;"><i class="fa fa-times" aria-hidden="true"></i></h5></a>


                                        </div>
                                    </div>



                                @else
                                {{-- @if ($rt->file_type==2)

                            <div class="container">
                                  <div class="ratio ratio-16x9">
                                    <iframe src="{{$rt->link}}"></iframe>
                                  </div>
                                </div>
@endif --}}
                                @endif


                                  @endforeach
                                  @else
                                  <h2 class="mt-5" style="text-align: center"> No Media Available</h2>
                                  @endif

                            {{-- <div class="container">

                                  <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/WNeLUngb-Xg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div> --}}
                              </div>

                                </div>
@endif
<label>University Image</label>

<input name="images[]" value="@if(isset(auth()->profile_image)){{auth()->profile_image}}@endif"type="file" class="dropify-frrr" multiple>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Video Link</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>

                                <input name="link" type="url" class="form-control" placeholder="Video link">
                            </div>
                        </div>
                    </div>



                </div>
                <button type="submit" class="btn btn-round btn-primary mt-3">Update</button> &nbsp;&nbsp;
            <button type="data-dismiss" class="btn btn-round btn-default mt-3 ">Cancel</button>
            </form>
            </div>
            @stop

            @section('page-styles')
            <link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">


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

{{-- <script>
$(".deleteRecord").click(function(){
    // for(int i=0; )

    foreach($rts as $rt){
    var media_id = $('input[name="media_id{{$rt->id}}"]').val();
    }
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

            document.getElementsByClassName(".deleteRecord").hide;

});

</script> --}}

@stop
