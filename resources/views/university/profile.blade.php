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
                    <h5 class="mb-0">{{Auth()->user()->first_name}}</h5>
                        <span class="text-light">Role</span>
                        {{-- <p class="mb-0"><span>Posts: <strong>321</strong></span> <span>Followers: <strong>4,230</strong></span> <span>Following: <strong>560</strong></span></p> --}}
                    </div>
                </div>
                <div>
                    {{-- <button class="btn btn-primary btn-sm">Follow</button>
                    <button class="btn btn-success btn-sm">Message</button> --}}
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
                {{-- <small class="text-muted">Address: </small>
                <p>795 Folsom Ave, Suite 600 San Francisco, 94107</p>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1923731.7533500232!2d-120.39098936853455!3d37.63767091877441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522391841133" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> --}}
                <hr>
                <small class="text-muted">Email address: </small>
            <p>{{Auth()->user()->email}}</p>
                <hr>
                <small class="text-muted">Mobile: </small>
                <p>{{Auth()->user()->mobile}}</p>
                <hr>
                <small class="text-muted">Birth Date: </small>
                <p class="m-b-0">October 17th, 93</p>
                {{-- <hr>
                <small class="text-muted">Social: </small>
                <p><i class="fa fa-twitter m-r-5"></i> twitter.com/example</p>
                <p><i class="fa fa-facebook  m-r-5"></i> facebook.com/example</p>
                <p><i class="fa fa-github m-r-5"></i> github.com/example</p>
                <p><i class="fa fa-instagram m-r-5"></i> instagram.com/example</p> --}}
            </div>
        </div>
    </div>




    <div class="col-xl-8 col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h2>My Information</h2>
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

                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input name="birth_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Established Date">
                            </div>
                        </div>
                    </div> --}}
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
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" name="latitude" class="form-control" placeholder="Latitude">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" name="longitude" class="form-control" placeholder="Longitude">
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <select name="country" class="form-control">
                                <option value="">-- Select Country --</option>

                                    @foreach($countries as $country)
                            <option value="{{$country->countries_id}}"  <?php if($user->country == $country->countries_id) { echo "selected"; } ?>>{{$country->countries_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" name="state" class="form-control"  placeholder="State/Province">
                        </div>
                    </div> --}}
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
                    {{-- <div class="col-12">
                        <ul class="list-group mb-3 tp-setting">
                            <li class="list-group-item">
                                Anyone seeing my profile page
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Anyone send me a message
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Anyone posts a comment on my post
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Anyone invite me to group
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div> --}}

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
                            <input name="profile_image" value="@if(isset(auth()->profile_image)){{auth()->profile_image}}@endif"type="file" class="dropify-fr" >
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
                <form action="{{ route('university.profile.update')}}" method="POST" enctype="multipart/form-data" >
@csrf
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>University Image</label>

                            <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Video Link</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>

                                <input name="Video" type="text" class="form-control" placeholder="Video link">
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
@stop
