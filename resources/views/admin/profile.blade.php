@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Profile')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card social">
            <div class="profile-header d-flex justify-content-between justify-content-center">
                <div class="d-flex">
                    <div class="mr-3">
                        @if(isset(Auth()->user()->profile_image) && file_exists(Auth()->user()->profile_image))
                        <img src="{{ asset(Auth()->user()->profile_image) }}" class="rounded" alt="">
                        @else
                        <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
             @endif
                    </div>
                    <div class="details">
                    <h5 class="mb-0">@if(isset(Auth()->user()->first_name)){{Auth()->user()->first_name}}@endif</h5>
                        <span class="text-light">@if(isset(Auth()->user()->last_name)){{Auth()->user()->last_name}}@endif</span>
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
                <hr>
                <small class="text-muted">Birth Date: </small>
                <p class="m-b-0">@if(isset(Auth()->user()->birth_year)){{Auth()->user()->birth_year}}@endif</p>

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
                <form action="{{ route('admin.profile.update')}}" method="POST" id="profileForm" enctype="multipart/form-data" >
                    @csrf
                <div class="row clearfix">

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" value="@if(isset(auth()->user()->first_name)){{auth()->user()->first_name}}@endif" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" value="@if(isset(auth()->user()->last_name)){{auth()->user()->last_name}}@endif" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="landline_1">Landline 1</label>
                            <input type="text" value="@if(isset(auth()->user()->landline_1)){{auth()->user()->landline_1}}@endif" name="landline_1" class="form-control" placeholder="Landline1">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="landline_2">Landline 2</label>
                            <input type="text" value="@if(isset(auth()->user()->landline_2)){{auth()->user()->landline_2}}@endif" name="landline_2" class="form-control" placeholder="Landline2">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="birth_year">DOB</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input value="@if(isset(auth()->user()->birth_year)){{auth()->user()->birth_year}}@endif" data-provide="datepicker" data-date-autoclose="true" class="form-control" name="birth_year" placeholder="DOB" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-envelope-open"></i></span>
                                </div>
                                <input type="text" value="@if(isset(auth()->user()->email)){{auth()->user()->email}}@endif" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="number" value="@if(isset(auth()->user()->mobile)){{auth()->user()->mobile}}@endif" name="mobile" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="countries_id" class="form-control">
                                <option value="">-- Select Country --</option>
                                @if($countries->count() > 0)
                                @foreach($countries as $country)
                                <option value="{{$country->countries_id}}"  <?php if(Auth()->user()->countries_id == $country->countries_id) { echo "selected"; } ?>>{{$country->countries_name}}</option>
                                        @endforeach
                                        @else
                                        <option value="Data Not Available" >Data Not Available</option>
                                            @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" value="@if(isset(auth()->user()->city)){{auth()->user()->city}}@endif" name="city" class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea rows="4" type="text" name="address" class="form-control" placeholder="Address">@if(isset(auth()->user()->address)){{auth()->user()->address}}@endif
                            </textarea>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="password">Change Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                    </div> --}}
                    <div class="col-lg-6 col-md-12" id="confirmPassword">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input name="profile_image" type="file" class="dropify-fr" >
                        </div>
                    </div>

                </div>
            <button type="submit" class="btn btn-round btn-primary" id="update">Update</button> &nbsp;&nbsp;
            {{-- <button type="data-dismiss" class="btn btn-round btn-default">Cancel</button> --}}
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
    $(document).on('click', '#password', function ()
    {
        $('#confirmPassword').html('<div class="form-group"><label for="cpassword">Confirm Password</label><input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password"><div id="cpError"></div></div>')
    });
  </script>
{{-- <script>
    var email='';

    $(document).on('click', '#update', function ()
    {
    var password=$('#password').val();
    var cpassword=$('#cpassword').val();
   if(password==cpassword)
   {
       $('#profileForm').submit();
   }
   else
   {
     $('#cpError').html('<span style="color: red;">(Passwords do not match.)</span>')
   }

    });
  </script> --}}
@stop
