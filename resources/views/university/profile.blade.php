@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Profile')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card social">
            <div class="profile-header d-flex justify-content-between justify-content-center">
                <div class="d-flex">
                    <div class="mr-3">
                        @if(isset(Auth()->user()->profile_image))
                        <img src="{{ asset(Auth()->user()->profile_image) }}" class="rounded" alt="">
                        @else
                        <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
             @endif
                    </div>
                    <div class="details">

                    <h5 class="mb-0">{{Auth()->user()->university->university_name ?? ''}}</h5>
                        {{-- <span class="text-light">Role</span> --}}
                        {{-- <p class="mb-0"><span>Posts: <strong>321</strong></span> <span>Followers: <strong>4,230</strong></span> <span>Following: <strong>560</strong></span></p> --}}
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-5">
        <div class="card">
            <div class="header">
                <h2>Info</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <div class="body">

                <hr>
                <small class="text-muted">Email address: </small>
            <p>@if(isset(Auth()->user()->email)){{Auth()->user()->email}}@endif</p>
                <hr>
                <small class="text-muted">Mobile: </small>
                <p>@if(isset(Auth()->user()->mobile)){{Auth()->user()->mobile}}@endif</p>

            </div>
        </div>
    </div>




    <div class="col-xl-8 col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h2>My Information</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                </ul>
            </div>
            <div class="body">
                <form action="{{ route('university.profile.update')}}" method="POST" enctype="multipart/form-data" >
@csrf
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input type="text" name="university_name"  value="@if(isset(auth()->user()->university->university_name)){{auth()->user()->university->university_name}}@endif" class="form-control" placeholder="University Name">
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="University Name">
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <select class="form-control" name="type">
                                <option value="">-- Select Type -- </option>
                                <option value="0" <?php if($user->medium == 0) { echo "selected"; } ?>>Private
                                <option value="1" <?php if($user->medium == 1) { echo "selected"; } ?>>Government</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-envelope-open"></i></span>
                                </div>
                                <input name="email" type="text" class="form-control" value="@if(isset(auth()->user()->email)){{auth()->user()->email}}@endif" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset(auth()->user()->mobile)){{auth()->user()->mobile}}@endif"name="mobile" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" name="landline_1" class="form-control" value="@if(isset(auth()->user()->landline_1)){{auth()->user()->landline_1}}@endif" placeholder="Landline1">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" name="landline_2" value="@if(isset(auth()->user()->landline_2)){{auth()->user()->landline_2}}@endif"class="form-control" placeholder="Landline2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <select name="country" class="form-control">
                                <option value="">-- Select Country --</option>
                                @if($countries->count() > 0)
                                    @foreach($countries as $country)
                            <option value="{{$country->countries_id}}"  <?php if($user->country == $country->countries_id) { echo "selected"; } ?>>{{$country->countries_name}}</option>
                                    @endforeach
                                    @else
                                    <option value="Data Not Available" >Data Not Available</option>
                                        @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" name="city"  value="@if(isset(auth()->user()->city)){{auth()->user()->city}}@endif" class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea rows="4" name="address"  type="text" class="form-control" placeholder="Address">@if(isset(auth()->user()->address_1)){{auth()->user()->address_1}}@endif</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>
                                <input name="website" type="text" class="form-control" value="@if(isset(auth()->user()->university->website)){{auth()->user()->university->website}}@endif" placeholder="http://">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input name="profile_image" value="@if(isset(auth()->profile_image)){{auth()->profile_image}}@endif"type="file" class="dropify-fr" multiple>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
            <button type="data-dismiss" class="btn btn-round btn-default ">Cancel</button>
            </form>
            </div>
        </div>


    </div>
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
                        <div class="form-group">
                            <div class="card-group">
                                <?php $rts=auth()->user()->university->universityMedia;?>
                                @foreach($rts as $rt)
                                @if ($rt->file_type==0)
                                <div class="card">
                                    <img style="height: 84px;" src="{{asset($rt->media)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="{{route('media.destroy',['id'=>$rt->id])}}"  class="deleteRecord" data-id="{{ $user->id }}" ><h5 style="color: red;"><i class="fa fa-times" aria-hidden="true"></i></h5></a>


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
                              </div>
                            <label>University Image</label>

                                    <input name="images[]" value="@if(isset(auth()->profile_image)){{auth()->profile_image}}@endif"type="file" class="dropify-frrr" multiple>
                                </div>

                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Video Link</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>

                                <input name="link" type="text" class="form-control" placeholder="Video link">
                            </div>
                        </div>
                    </div>



                </div>
                <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
            <button type="data-dismiss" class="btn btn-round btn-default ">Cancel</button>
            </form>
            </div>
        </div>


    </div>


</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>

<script>
    $('.dropify-fr').dropify({
        messages: {
            default: 'Upload Profile Image',
            replace: 'Upload Profile Image',
            remove: 'Cancel',
            error: 'Sorry,the file is too large'
        }
    });
</script>

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
$(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax(
    {
        url: "{{route('university.profile')}}",
        type: 'delete',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
        }
    });

});

</script>
@stop
