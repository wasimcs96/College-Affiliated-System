@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Advertisement')


@section('content')

  <div class="col-lg-12 col-md-7">
         <div class="card">
            <div class="header">
                <h2>Advertisement</h2>
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
                <form action="{{ route('university.advertisement.store')}}" method="POST" enctype="multipart/form-data" >
@csrf
<div class="row clearfix">
    <?php $packages=App\Models\Package::where('package_type',2)->where('status',1)->get()?>
    @foreach ($packages as $package)
{{-- {{dd($package)}}  --}}
    <div class="col-lg-4 cool-md-4 col-sm-12">
        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle"src="{{asset('assets/images/plan-1.svg')}}"  alt="" /></li>
                <li class="price">
                    <h3><span>$</span>{{$package->amount}}<small>/ mo</small></h3>
                    <span>@if($package->package_type==2)
                    Advertisement
                @else
                Plan Not Defiend
                @endif
                </span>
                </li>
                 <li>{{$package->description}}</li>

                <li class="plan-btn"><button class="btn btn-round btn-outline-secondary"> <input type="checkbox" value="1" name="expire_date" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
               <input type="hidden" name="expire_date" value="{{ $package->expire_date }}" />Choose plan</button></li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
<input type="hidden" value="3" name="expire_date" hidden>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        {{-- @if(!empty(auth()->user()->consultant->advertisement) && auth()->user()->university->universityMedia != null) --}}
                        <div class="form-group">
                            <div id="lightgallery" class="row clearfix lightGallery">
        <?php $adid=auth()->user()->id?>
                          <?php $rts=App\Models\Advertisement::where('user_id',$adid)->get()->first()?>
                          {{-- {{dd($rts)}} --}}
                          {{-- @if($rts->count()>0) --}}
                          {{-- @foreach($rts as $rt)
                          @if ($rt->file_type==0) --}}
                          {{-- <div class="card">
                              <img style="height: 84px;" src="{{asset($rt->media)}}" class="card-img-top" alt="...">

                            </div> --}}
                            {{-- <div id="lightgallery" class="row clearfix lightGallery">
                              <div class="col-lg-4 col-md-5 mb-4"><a class="light-link" href="{{asset($rt->media)}}"><img class="img-fluid rounded" src="{{asset($rt->media)}}" alt=""></a></div>
                            </div> --}}
                            {{-- <input type="text" class="" value="{{$rt->id}}" name="media_id" hidden>
                              <div class="col-lg-3 col-md-5 m-b-30"><a class="light-link" href="{{asset($rt->media)}}"><img class="img-fluid rounded" src="{{asset($rt->media)}}"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>

                                  <div class="card-body">
                                      <a href="{{route('media.destroy',['id'=>$rt->id])}}"  class="deleteRecord" data-id="{{auth()->user()->id}}" ><h5 style="color: red; position:absolute;   top: 0;
                                          right: 0;"><i class="fa fa-times" aria-hidden="true"></i></h5></a>


                                  </div>
                              </div>
 --}}


                          {{-- @else --}}
                          {{-- @if ($rt->file_type==2)

                      <div class="container">
                            <div class="ratio ratio-16x9">
                              <iframe src="{{$rt->link}}"></iframe>
                            </div>
                          </div>
@endif --}}
                          {{-- @endif --}}


                            {{-- @endforeach --}}
                            {{-- @else --}}
                            {{-- <h2 class="mt-5" style="text-align: center"> No Media Available</h2> --}}
                            {{-- @endif --}}

                      {{-- <div class="container">

                            <div class="ratio ratio-16x9">
                              <iframe src="https://www.youtube.com/embed/WNeLUngb-Xg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div>
                      </div> --}}
                        </div>

                          </div>

<label>Advertisement Banner</label>

<input name="image" type="file" class="dropify-frrr" >
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
