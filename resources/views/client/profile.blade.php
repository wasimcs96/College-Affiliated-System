@extends('layout.master')
@section('parentPageTitle', 'Client')
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
                        <span class="text-light">{{Auth()->user()->last_name}}</span>
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
            <p>{{Auth()->user()->email}}</p>
                <hr>
                <small class="text-muted">Mobile: </small>
                <p>{{Auth()->user()->mobile}}</p>
                <hr>
                <small class="text-muted">Birth Date: </small>
                <p class="m-b-0">{{Auth()->user()->birth_year}}</p>

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
                <form action="{{ route('client.profile.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                <div class="row clearfix">

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->first_name)){{$user->first_name}}@endif" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->last_name)){{$user->last_name}}@endif" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input value="@if(isset($user->birth_year)){{$user->birth_year}}@endif" data-provide="datepicker" data-date-autoclose="true" class="form-control" name="birth_year" placeholder="DOB">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-envelope-open"></i></span>
                                </div>
                                <input value="@if(isset($user->email)){{$user->email}}@endif" type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->mobile)){{$user->mobile}}@endif" name="mobile" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->landline_1)){{$user->landline_1}}@endif" name="landline_1" class="form-control" placeholder="Landline1">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->landline_2)){{$user->landline_2}}@endif"  name="landline_2" class="form-control" placeholder="Landline2">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->latitude)){{$user->latitude}}@endif" name="latitude" class="form-control" placeholder="Latitude">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->longitude)){{$user->longitude}}@endif" name="longitude" class="form-control" placeholder="Longitude">
                        </div>
                    </div>
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
                            <input type="text" value="@if(isset($user->state)){{$user->state}}@endif" name="state" class="form-control" placeholder="State/Province">
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->city)){{$user->city}}@endif" name="city" class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea rows="4"  type="text" name="address" class="form-control" placeholder="Address">@if(isset($user->address)){{$user->address}}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input value="@if(isset($user->profile_image)){{$user->profile_image}}@endif"  name="profile_image" type="file" class="dropify-fr" >
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
                </div>
            {{-- <a href="{{ route('client.update') }}" class="btn btn-round btn-primary">Update</a> &nbsp;&nbsp; --}}
            <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
            <button type="data-dismiss" class="btn btn-round btn-default ">Cancel</button>
            </form>
            </div>
        </div>
        {{-- <div class="card">
            <div class="header">
                <h2>Account Data</h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" value="admin" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="email" class="form-control" value="admin@yourdomain.com" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <hr>
                        <h6>Change Password</h6>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                <button type="button" class="btn btn-round btn-default">Cancel</button>
            </div>
        </div> --}}
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
@stop
