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
                      @if(isset(Auth()->user()->profile_image) && file_exists(Auth()->user()->profile_image))
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


                    <a href="{{route('university_detail',auth()->user()->id)}}" class="btn btn-outline-primary" title="View Profile Page">View Profile
                    </a>
                <hr>
                <small class="text-muted">Email address: </small>
            <p>@if(isset(Auth()->user()->email)){{Auth()->user()->email}}@endif</p>
                <hr>
                <small class="text-muted">Mobile: </small>
                <p>@if(isset(Auth()->user()->mobile)){{Auth()->user()->mobile}}@endif</p>
                {{-- @if(file_exists(Auth()->user()->university->brochure))
                <hr>
                <small class="text-muted">See Brochure: </small>
            <p> <a href="{{asset(auth()->user()->university->brochure)}}" class="btn btn-primary" target="blank">See</a></p>
                <hr>
                <small class="text-muted">Download Brochure: </small>
                <p><a href="{{asset(auth()->user()->university->brochure)}}" class="btn btn-primary"  download>Download</a></p>
                @endif --}}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Add Default Document</h2> <small style="color: white">Note: These document will be shown at consultant end for creating application.</small>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <div class="body">
                <form action="{{ route('university.document.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="documents">
                            <p id="error-checkbox3">
                                <div class="dynamic_document" id="dynamic_document"></label>
                                <?php $inc = 0 ?>
                                @if(isset($documents))
                                    @foreach($documents as $key => $value)
                                       <label class="control-inline fancy-checkbox">
                                       <input type="checkbox" name= "document[{{$key}}]" value="1" checked><span>{{$key}}</span></label>
                                       @php $inc++ @endphp
                                    @endforeach
                                @endif

                                </div>
                    </div>
                    <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal" ><i class="fa fa-plus"></i>Add Document </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
                        <label for="university_name">University Name</label>
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
                            <label for="type">University Type</label>
                            <select class="form-control" name="type">
                                <option value="">-- Select Type -- </option>

                                <option value="0" @if(isset(auth()->user()->university->type)) <?php if(auth()->user()->university->type == 0) { echo "selected"; } ?> @endif>Private
                                <option value="1" @if(isset(auth()->user()->university->type)) <?php if(auth()->user()->university->type == 1) { echo "selected"; } ?> @endif>Government</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="email">University Email</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-envelope-open"></i></span>
                                </div>
                                <input name="email" type="text" class="form-control" value="@if(isset(auth()->user()->email)){{auth()->user()->email}}@endif" placeholder="Email" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                        <label for="mobile">University Mobile</label>

                            <input type="text" value="@if(isset(auth()->user()->mobile)){{auth()->user()->mobile}}@endif"name="mobile" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>



                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_1">Landline 1</label>
                            <input type="text" name="landline_1" class="form-control" value="@if(isset(auth()->user()->landline_1)){{auth()->user()->landline_1}}@endif" placeholder="Landline1" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_2">Landline 2</label>
                            <input type="text" name="landline_2" value="@if(isset(auth()->user()->landline_2)){{auth()->user()->landline_2}}@endif"class="form-control" placeholder="Landline2" required>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="countries_id" class="form-control" required>
                                <option value="">-- Select Country --</option>
                                @if($countries->count() > 0)
                                    @foreach($countries as $country)
                            <option value="{{$country->countries_id}}"  <?php if(auth()->user()->countries_id == $country->countries_id) { echo "selected"; } ?>>{{$country->countries_name}}</option>
                                    @endforeach
                                    @else
                                    <option value="Data Not Available" >Data Not Available</option>
                                        @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_1">Establishment Year</label>
                            <input type="text" name="establish_at" class="form-control" value="@if(isset(auth()->user()->university->established_at)){{auth()->user()->university->established_at}}@endif" placeholder="Ex. 1885" required>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_2">IELTS Rating</label>
                            <input type="text" name="ilts" value="@if(isset(auth()->user()->university->iltes)){{auth()->user()->university->iltes}}@endif" class="form-control" placeholder="ILTS Rating" required>
                        </div>
                    </div> --}}
                <div class="col-lg-4 col-md-12">
                    <div class="input-box" >
                        <span class="la la-university mr-1 form-icon"></span>
                        <label class="label-text">IELTS Rating</label>

                        <div class="form-group">

                            <select name="ilts" class="form-control" required>
                                <option value="0" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 0) selected @endif @endif>0</option>
                                <option value="0.5" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 0.5) selected @endif @endif>0.5</option>
                                <option value="1" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 1) selected @endif @endif>1</option>
                                <option value="1.5" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 1.5) selected @endif @endif>1.5</option>
                                <option value="2" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 2) selected @endif @endif>2</option>
                                <option value="2.5" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 2.5) selected @endif @endif>2.5</option>
                                <option value="3" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 3) selected @endif @endif>3</option>
                                <option value="3.5" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 3.5) selected @endif @endif>3.5</option>
                                <option value="4" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 4) selected @endif @endif >4</option>
                                <option value="4.5"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 4.5) selected @endif @endif>4.5</option>
                                <option value="5"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 5) selected @endif @endif>5</option>
                                <option value="5.5"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 5.5) selected @endif @endif>5.5</option>
                                <option value="6"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 6) selected @endif @endif>6</option>
                                <option value="6.5"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 6.5) selected @endif @endif>6.5</option>
                                <option value="7"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 7) selected @endif @endif>7</option>
                                <option value="7.5"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 7.5) selected @endif @endif>7.5</option>
                                <option value="8"  @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 8) selected @endif @endif>8</option>
                                <option value="8.5" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes == 8.5) selected @endif @endif>8.5</option>
                                <option value="9" @if(isset(auth()->user()->university->iltes)) @if(auth()->user()->university->iltes ==9) selected @endif @endif>9</option>
                            </select>
                            <div id="universityError"></div>
                            {{-- <input class="form-control" type="name" name="name" placeholder="Your name" required> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="input-box" >
                        <span class="la la-university mr-1 form-icon"></span>
                        <label class="label-text">In Take </label>

                        <div class="form-group">

                            <select class="selectpicker" multiple="multiple" data-live-search="true"  placeholder="Intakes" id="university" name="in_take[]" >
                                <option value="Jan" >Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="July">July</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                            </select>
                            <div id="universityError"></div>
                            {{-- <input class="form-control" type="name" name="name" placeholder="Your name" required> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="input-box" >
                        <span class="la la-university mr-1 form-icon"></span>
                        <label class="label-text">Exam</label>

                        <div class="form-group">

                            <select class="selectpicker" multiple="multiple" data-live-search="true"  placeholder="Exam" id="university" name="exam[]" >
                                <option value="IELTS">IELTS</option>
                                <option value="TOEFL">TOEFL</option>
                                <option value="PTE">PTE</option>
                                <option value="TOEIC">TOEIC</option>
                                <option value="SAT">SAT</option>
                                <option value="GMAT">GMAT</option>
                                <option value="GRE">GRE</option>
                            </select>
                            <div id="universityError"></div>
                            {{-- <input class="form-control" type="name" name="name" placeholder="Your name" required> --}}
                        </div>
                    </div>
                </div>

                          <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city"  value="@if(isset(auth()->user()->city)){{auth()->user()->city}}@endif" class="form-control" placeholder="City" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="landline_2">Average Fees</label>
                            <input type="text" name="average_fees" value="@if(isset(auth()->user()->university->average_fees)){{auth()->user()->university->average_fees}}@endif" class="form-control" placeholder="Average Fees">
                        </div>
                    </div>


                    {{-- <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea rows="4" name="address"  type="text" class="form-control" placeholder="Address">@if(isset(auth()->user()->address_1)){{auth()->user()->address_1}}@endif</textarea>
                        </div>
                    </div> --}}

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div> --}}
                                <input name="website" type="text" class="form-control" value="@if(isset(auth()->user()->university->website)){{auth()->user()->university->website}}@endif" placeholder="http://" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea rows="4" name="address"  type="text" class="form-control" placeholder="Address" required>@if(isset(auth()->user()->address)){{auth()->user()->address}}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="address">Describe Yourself</label>
                            <textarea rows="4" minlength="150" name="about_me"  type="text" class="form-control" placeholder="Address" required>@if(isset(auth()->user()->university->about_me)){{auth()->user()->university->about_me}}@endif</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="brochure">Upload Brochure</label>
                            <div class="input-group">
                                <input type="file" name="brochure" accept="application/pdf" />
                                {{-- <br> --}}
                                @if(file_exists(Auth()->user()->university->brochure) && isset(Auth()->user()->university->brochure))
                                <a href="{{asset(auth()->user()->university->brochure)}}" class="btn btn-primary" download style="float: right;">Download Brochure</a>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="profile_image">Upload Profile Image</label>
                            <input name="profile_image" value="@if(isset(auth()->profile_image)){{auth()->profile_image}}@endif" type="file" class="dropify-fr"  >
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="profile_image">Upload Cover Image</label>
                            <input name="cover_image" type="file" class="dropify-frr"  >
                             <label><span><b>Please Note </b>: Image should be in Given Dimensions:min-width=1200 | min-height=300  </span></label>
                             <label><span><b>Please Note </b>: Please click on the link <a href="https://online-image-resizer.com/" target="_blank">Image Resizer</a> to resize your image  </span></label>

                            @if(file_exists(Auth()->user()->university->cover_image) && isset(Auth()->user()->university->cover_image))
                                <a href="{{asset(auth()->user()->university->cover_image)}}" class="btn btn-primary" target="_blank" style="float: right;">See Cover Image</a>
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

        <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Document Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form id="basic-form" method="post" novalidate action="#">
                            <div class="form-group">
                                <label>Document Name</label>
                                <input type="text" class="form-control" name="document_name" id="document_name" required>
                            </div>
                       </form>
                    </div>
                    <div class="modal-footer">
                       {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                       {{-- <button type= class="btn btn-primary">Submit</button> --}}
                           <a href="javascript:void(0)" class="btn btn-primary" id="add_document2"> Add </a>
                    </div>
                </div>
            </div>
        </div>

@stop
@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

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

<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

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

<script type="text/javascript">
     $(document).ready(function(){
      var i=0;
      var document_row = {{$inc}} ;



    $('#add_document2').click(function(){
    rt=$('#document_name').val()
    //   console.log(rt);
    $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="hidden" name="document['+rt+']" value="0"  hidden><input type="checkbox" customValue="'+rt+'" name= "document['+rt+']" value="1" class="checkbox"><span>'+rt+'</span></label>')
    $('#documentModal').modal('hide');
    document.getElementById("basic-form").reset();
    document_row++;
    });

    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

@stop

