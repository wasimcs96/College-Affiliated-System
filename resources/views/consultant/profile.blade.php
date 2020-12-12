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
                <form action="{{ route('consultant.profile.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                <div class="row clearfix">

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->first_name)){{$user->first_name}}@endif" name="first_name" class="form-control" placeholder="First Name">
                            <input type="text"  name="userid" value="@if(isset(auth()->user()->id)){{auth()->user()->id}}@endif" hidden>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->last_name)){{$user->last_name}}@endif" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <select class="form-control">
                                <option value="">-- Select Gender --</option>
                                <option value="AF">Male</option>
                                <option value="AX">Female</option>
                            </select>
                        </div>
                    </div> --}}
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
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->latitude)){{$user->latitude}}@endif" name="latitude" class="form-control" placeholder="Latitude">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" value="@if(isset($user->longitude)){{$user->longitude}}@endif" name="longitude" class="form-control" placeholder="Longitude">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input name="company_name" type="text" class="form-control" value="{{auth()->user()->consultant->company_name}}" placeholder="Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>
                                <input name="website" type="text" class="form-control" value="{{auth()->user()->consultant->website}}" placeholder="http://">
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">

                            <label for="weekday">Working Days</label>
                            <div class="fancy-checkbox">
                                <?php
                                $weekarray = Config::get('define.weekday');
                                $setWorkingDays = explode(",", auth()->user()->consultant->working_week_days);

                            ?>


                                 @foreach($weekarray as $key => $value)
                                    @if(in_array($key, $setWorkingDays))
                                    <label><input type="checkbox" checked name="weekday[]" value="{{$key}}"><span>{{$value}}</span></label>
                                    @else
                                    <label><input type="checkbox"  name="weekday[]" value="{{$key}}"><span>{{$value}}</span></label>
                                    @endif
                                 @endforeach
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <select name="start_time" class="form-control">
                                <option value="">Start time</option>

                                <option value="00:00">00:00</option>
                                <option value="00:30">00:30</option>
                                <option value="1:00">1:00</option>
                                <option value="1:30">1:30</option>
                                <option value="2:00">2:00</option>
                                <option value="2:30">2:30</option>
                                <option value="3:00">3:00</option>
                                <option value="3:30">3:30</option>
                                <option value="4:00">4:00</option>
                                <option value="4:30">4:30</option>
                                <option value="5:00">5:00</option>
                                <option value="5:30">5:30</option>
                                <option value="6:00">6:00</option>
                                <option value="6:30">6:30</option>
                                <option value="7:00">7:00</option>
                                <option value="7:30">7:30</option>
                                <option value="8:00">8:00</option>
                                <option value="8:30">8:30</option>
                                <option value="9:00">9:00</option>
                                <option value="9:30">9:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                                <option value="22:00">22:00</option>
                                <option value="22:30">22:30</option>
                                <option value="23:00">23:00</option>
                                <option value="23:30">23:30</option>
                                <option value="24:00">24:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <select name="end_time" class="form-control">
                                <option value="">End time</option>

                                <option value="00:00">00:00</option>
                                <option value="00:30">00:30</option>
                                <option value="1:00">1:00</option>
                                <option value="1:30">1:30</option>
                                <option value="2:00">2:00</option>
                                <option value="2:30">2:30</option>
                                <option value="3:00">3:00</option>
                                <option value="3:30">3:30</option>
                                <option value="4:00">4:00</option>
                                <option value="4:30">4:30</option>
                                <option value="5:00">5:00</option>
                                <option value="5:30">5:30</option>
                                <option value="6:00">6:00</option>
                                <option value="6:30">6:30</option>
                                <option value="7:00">7:00</option>
                                <option value="7:30">7:30</option>
                                <option value="8:00">8:00</option>
                                <option value="8:30">8:30</option>
                                <option value="9:00" >9:00</option>
                                <option value="9:30">9:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00" >17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                                <option value="22:00">22:00</option>
                                <option value="22:30">22:30</option>
                                <option value="23:00">23:00</option>
                                <option value="23:30">23:30</option>
                                <option value="24:00">24:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input value="@if(isset($user->profile_image)){{$user->profile_image}}@endif"  name="profile_image" type="file" class="dropify-fr" multiple >
                        </div>
                    </div>

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
