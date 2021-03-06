@extends('layout.master')
@section('parentPageTitle', 'Consultant')
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

                {{-- <small class="text-muted">Profile Page: </small><br> --}}
                <a href="{{route('consultant_detail',auth()->user()->id)}}" class="btn btn-outline-primary" title="View Profile Page">View Profile
                </a>
                <hr>
                <small class="text-muted">Email address:   </small>
                 <p>@if(isset(Auth()->user()->email)){{Auth()->user()->email}}@endif</p>
                <hr>
                <small class="text-muted">Mobile: </small>
                <p>@if(isset(Auth()->user()->mobile)){{Auth()->user()->mobile}}@endif</p>
                <hr>
                <small class="text-muted">Birth Date: </small>
                <p class="m-b-0">@if(isset(Auth()->user()->birth_year)){{Auth()->user()->birth_year}}@endif</p>
                <br>

            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>PR Migration</h2>
            </div>
            <div class="body demo-card">
                <form action="{{route('consultant.prmigration.store')}}" id="basic-form" method="POST">
                    @csrf

                    <div class="fancy-checkbox">
                        <input type="text" class="hidden" name="pr_service" value="0" hidden>
                        <label> @if(isset(auth()->user()->consultant->pr_service) && auth()->user()->consultant->pr_service==1)  <input type="checkbox"  name="pr_service" value="1" checked><span> PR Enabled </span> @else <input type="checkbox"  name="pr_service" value="1" required><span> Enable PR</span>  @endif</label>
                        {{-- <label> <input type="checkbox"  name="pr_service" value="1" @if(isset(auth()->user()->consultant->pr_service) && auth()->user()->consultant->pr_service==1) checked @endif><span> @if(auth()->user()->consultant->pr_service==1)PR Enabled @else Enable PR @endif</span></label>                    --}}
                     </div>
                        @if(auth()->user()->consultant->pr_service==1)
                    <div class="row clearfix">
                        {{-- <input type="text" value="{{$au}}" hidden> --}}
                        <div class="col-lg-4 col-md-12">
                            <label>Select Countries</label>
                            <div class="multiselect_div" style="width: 300px">
                                <select id="multiselect4-filter" name="country[]" class="multiselect multiselect-custom" multiple="multiple">
                                    @foreach($countries as $country)
                                    <option value="{{$country->countries_id}}" <?php if(isset($consultantCountries) && $consultantCountries > 0) { if (in_array($country->countries_id, $consultantCountries)) { echo "selected"; } } ?> >{{$country->countries_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    @endif
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>


                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">

                                    <div id="nouislider_basic_example" hidden></div>
                                </div>
                                <div class="col-lg-6 col-md-12" hidden>

                                    <div id="nouislider_range_example"></div>
                                </div>
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
                <form action="{{ route('consultant.profile.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                <div class="row clearfix">

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" value="@if(isset(Auth()->user()->first_name)){{Auth()->user()->first_name}}@endif" name="first_name" class="form-control" placeholder="First Name" required>
                            <input type="text"  name="userid" value="@if(isset(auth()->user()->id)){{auth()->user()->id}} @else {{ old('first_name') }}  @endif" hidden>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" value="@if(isset(Auth()->user()->last_name)){{Auth()->user()->last_name}} @else {{ old('last_name') }} @endif" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="birth_year">DOB</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input value="@if(isset(Auth()->user()->birth_year)){{Auth()->user()->birth_year}} @else {{ old('birth_year') }} @endif" data-provide="datepicker" data-date-autoclose="true" class="form-control" name="birth_year" placeholder="DOB" required>
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
                                <input value="@if(isset(Auth()->user()->email)){{Auth()->user()->email}} @else {{ old('email') }} @endif" type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="phone" value="@if(isset(Auth()->user()->mobile)){{Auth()->user()->mobile}} @else {{ old('mobile') }}  @endif" name="mobile" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_1">Landline 1</label>
                            <input type="text" value="@if(isset(Auth()->user()->landline_1)){{Auth()->user()->landline_1}} @else {{ old('landline_1') }} @endif" name="landline_1" class="form-control" placeholder="Landline1" >
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_2">Landline 2</label>
                            <input type="text" value="@if(isset(Auth()->user()->landline_2)){{Auth()->user()->landline_2}} @else {{ old('landline_2') }}  @endif"  name="landline_2" class="form-control" placeholder="Landline2" >
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="countries_id" class="form-control" required>
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
                            <label for="city" >City</label>
                            <input type="text" value="@if(isset(Auth()->user()->city)){{Auth()->user()->city}} @else {{ old('city') }} @endif" name="city" class="form-control" placeholder="City" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-21">
                        <div class="form-group">
                            <label for="address">Address (Geolocation)</label>
                            <div id="locationField">
                                <input class="form-control"
                                  id="autocomplete"
                                  name="googleAddress"
                                  value="@if(isset(auth()->user()->address_1)){{auth()->user()->address_1}} @else {{ old('googleAddress') }} @endif"
                                  placeholder="Enter your address"
                                  onFocus="geolocate()"
                                  type="text"
                                 required/>
                              </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="address">Full Address (This Address will be seen on frontend)</label>
                            <textarea rows="4"  type="text" name="address" class="form-control" placeholder="Full Address">@if(isset(Auth()->user()->address)){{Auth()->user()->address}} @else {{ old('address') }} @endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <div class="input-group">
                                <input name="company_name" type="text" class="form-control" value="@if(isset(auth()->user()->consultant->company_name)){{auth()->user()->consultant->company_name}}@else {{ old('company_name') }} @endif" placeholder="Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="website">GSTIN</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div> --}}
                                <input name="website" type="text" class="form-control" value="@if(isset(auth()->user()->consultant->website)){{auth()->user()->consultant->website}} @else {{ old('website') }}  @endif" placeholder="http://" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="address">Describe Yourself</label>
                            <textarea rows="4" minlength="150" type="text" name="about_me" class="form-control" placeholder="Describe Yourself" required>@if(isset(Auth()->user()->consultant->about_me)){{Auth()->user()->consultant->about_me}} @else {{ old('about_me') }} @endif</textarea>
                        </div>
                    </div>



                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">

                            <label for="weekday">Working Days</label>
                            <div class="fancy-checkbox">
                                <?php
                                $weekarray = Config::get('define.weekday');
                                if(isset(auth()->user()->consultant->working_week_days))
                                {
                                $setWorkingDays = explode(",", auth()->user()->consultant->working_week_days);
                                }
                                else {
                                    $setWorkingDays = [];
                                }
                            ?>

                                  @if(count($weekarray)>0)
                                 @foreach($weekarray as $key => $value)
                                    @if(in_array($key, $setWorkingDays))
                                    <label><input type="checkbox" checked name="weekday[]" value="{{$key}}"><span>{{$value}}</span></label>
                                    @else
                                    <label><input type="checkbox"  name="weekday[]" value="{{$key}}"><span>{{$value}}</span></label>
                                    @endif
                                 @endforeach
                                 @endif

                            </div>
                        </div>
                    </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="start_time">Select Start Time</label>
                        <?php get_times( $default = '00:00', $interval = '+30 minutes' ); ?>
                        <select class="form-control" id="starttime" name="start_time" onchange="setEndTime(this.value)">
                        <option value="{{auth()->user()->consultant->start_time ?? ''}}">@if(isset(auth()->user()->consultant->start_time)){{auth()->user()->consultant->start_time}} @else Select Start Time @endif </option>
                        <?php echo get_times(); ?></select>
                    </div><br><br>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="exampleInputCity1">Select End Time</label>
                        <?php get_times( $default = '00:00', $interval = '+30 minutes' )?>
                        <select class="form-control" id="endtime" name="end_time" disabled>
                        <option value="{{auth()->user()->consultant->end_time ?? ''}}">@if(isset(auth()->user()->consultant->end_time)){{auth()->user()->consultant->end_time}} @else Select End Time @endif</option>
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
                              $output .= "<option value=\"{$time}\"{$sel} >" . date( 'H:i ', $current ) . '</option>';
                              $current = strtotime( $interval, $current );
                          }
                          return $output;
                      }
                      ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="profile_image">Upload Profile Image</label>
                            <input value="@if(isset(Auth()->user()->profile_image)){{Auth()->user()->profile_image}}@endif"  name="profile_image" type="file" class="dropify-fr" >
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="cover_image">Upload Cover Image</label>
                            <input name="cover_image" id="cover_image" type="file" class="dropify-frr">
<label><span><b>Please Note </b>: Image should be in Given Dimensions:min-width=1200 | min-height=300  </span></label>
<label><span><b>Please Note </b>: Please click on the link <a href="https://online-image-resizer.com/" target="_blank">Image Resizer</a> to resize your image  </span></label>

@if(file_exists(Auth()->user()->consultant->cover_image) && isset(Auth()->user()->consultant->cover_image))
<a href="{{asset(auth()->user()->consultant->cover_image)}}" class="btn btn-primary" target="_blank" style="float: right;">See Cover Image</a>
@endif
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
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

<style>
    .tltp {
      position: relative;
      display: inline-block;
    }

    .tltp .tltptxt {
      visibility: hidden;
      width: 140px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      bottom: 150%;
      left: 50%;
      margin-left: -75px;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .tltp .tltptxt::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }

    .tltp:hover .tltptxt {
      visibility: visible;
      opacity: 1;
    }
    </style>
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script><!-- Bootstrap Colorpicker Js -->
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script><!-- Input Mask Plugin Js -->
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script><!-- Multi Select Plugin Js -->
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script><!-- noUISlider Plugin Js -->


<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script>
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");

      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copied: " + copyText.value;
    }

    function outFunc() {
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copy to clipboard";
    }
    </script>
    <script type="text/javascript">

    function setEndTime(start_time){
        if(start_time){
          $("#endtime").prop('disabled', false);
          $("#endtime").val('');
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

<script>
    $('.dropify-frr').dropify({
        messages: {
            default: 'Upload Cover Image',
            replace: 'Upload Cover Image',
            remove: 'Cancel',
            error: 'Sorry,the file is too large'
        }
    });
</script>

@stop
