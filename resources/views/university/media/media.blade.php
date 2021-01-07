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
                        {{-- @if(!empty(auth()->user()->universityMedia) && auth()->user()->universityMedia != null) --}}
                        <div class="form-group">
                                  <div id="lightgallery" class="row clearfix lightGallery">

                                <?php $rts=App\Models\UniversityMedia::where('user_id',auth()->user()->id)->get();?>
                                {{-- {{dd($rts)}} --}}
                                @if($rts->count()>0)
                                @foreach($rts as $rt)
                                @if ($rt->file_type==0)

                                  <div style="margin-left:24px; "  id="{{$rt->id}}">
                                  <input type="text" class="" value="{{$rt->id}}" name="media_id" hidden>
                                    <div class="img-responsive iws">
                                        <a class="light-link" href="{{asset($rt->media)}}"><img class="img-fluid rounded" src="{{asset($rt->media)}}"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>
                                        <br>
                                        <br>

                                        <div class="card-body">
                                            <span class="closes" custom2="{{$rt->id}}"  title="Delete" ><a href="#" id="deleteRecord" custom1="{{$rt->id}}" data-id="{{auth()->user()->id}}" >&times;</a></span>

                                        </div>
                                    </div>
                                  </div>


                                @else

                                @endif


                                  @endforeach
                                  @else
                                  <h2 class="mt-5" style="text-align: center"> No Media Available</h2>
                                  @endif


                              </div>

                                </div>
{{-- @endif --}}
<label>University Image</label>

<input name="images[]" value=""type="file" class="dropify-frrr" multiple>
<small><b>Please Note:</b> Image Dimension Should be in (min_width:872.13|min_height:302|max_width=1024|max_height=640)</small>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12" style="margin-top: 13px;">
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
@stop
