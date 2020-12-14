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
                            <label for="first_name">First Name</label>
                            <input type="text" value="@if(isset($user->first_name)){{$user->first_name}}@endif" name="first_name" class="form-control" placeholder="First Name">
                            <input type="text"  name="userid" value="@if(isset(auth()->user()->id)){{auth()->user()->id}}@endif" hidden>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
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
                            <label for="birth_year">DOB</label>
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
                            <label for="email">Email</label>
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
                            <label for="mobile">Mobile</label>
                            <input type="text" value="@if(isset($user->mobile)){{$user->mobile}}@endif" name="mobile" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_1">Landline 1</label>
                            <input type="text" value="@if(isset($user->landline_1)){{$user->landline_1}}@endif" name="landline_1" class="form-control" placeholder="Landline1">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_2">Landline 2</label>
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
                            <label for="country">Country</label>
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
                            <label for="city">City</label>
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
                            <label for="start_time">Selected Start Time</label>
                            <input type="text" value="{{Auth()->user()->consultant->start_time}}" name="landline_1" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="start_time">Selected End Time</label>
                            <input type="text" value="{{Auth()->user()->consultant->end_time}}" name="landline_1" class="form-control" disabled>
                        </div>
                    </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="start_time">Select Start Time</label>
                        <?php get_times( $default = '00:00', $interval = '+30 minutes' ); ?>
                        <select class="form-control" id="starttime" name="start_time" onchange="setEndTime(this.value)">
                        <option value="">Select Start Time</option>
                        <?php echo get_times(); ?></select>
                    </div><br><br>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="exampleInputCity1">Select End Time</label>
                        <?php get_times( $default = '00:00', $interval = '+30 minutes' )?>
                        <select class="form-control" id="endtime" name="end_time" disabled>
                        <option value="">Select End Time</option>
                        <?php echo get_times(); ?></select>
                    </div>
                </div>

                      <!-- Function to call time -->
                      <?php

                      function get_times( $default = '00:00', $interval = '+30 minutes' ) {
                          $output = '';
                          $output1 = '';
                          $current = strtotime( '00:00' );
                          $end = strtotime( '23:59' );

                          while( $current <= $end ) {
                              $time = date( 'H:i:s', $current );
                              $sel = ( $time == $default ) ? ' selected' : '';
                            //   $selend = ( $time == Auth()->user()->consultant->end_time ) ? ' selected' : '';
                              $output .= "<option value=\"{$time}\"{$sel} >" . date( 'H:i ', $current ) . '</option>';
                            //   $output1 .= "<option value=\"{$time}\"{$selend} >" . date( 'H:i ', $current ) . '</option>';

                              $current = strtotime( $interval, $current );
                          }
                          return $output;
                        //   return $output1;
                      }
                      ?>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <script type="text/javascript">

    function setEndTime(start_time){
        if(start_time){
          $("#endtime").prop('disabled', false);

          $('#endtime option').filter(function() {
              return $(this).val() <= start_time;
          }).prop('disabled', true);
        }else{
          $("#endtime").prop('disabled', true);
        }
    }
    </script>
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
