@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Edit Users')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Edit Users</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <form id="basic-form" method="post" novalidate action="{{route('admin.user.update', $user->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="{{$user->first_name ?? ''}}" name="first_name" id="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="{{$user->last_name ?? ''}}" name="last_name" id="last_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{$user->email ?? ''}}" name="email" id="email" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" value="{{$user->mobile ?? ''}}" name="mobile" id="mobile" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Landline 1</label>
                                    <input type="number" class="form-control" value="{{$user->landline_1 ?? ''}}" name="landline_1" id="landline_1">
                                </div>
                                <div class="form-group">
                                    <label>Landline 2</label>
                                    <input type="number" class="form-control" value="{{$user->landline_2 ?? ''}}" name="landline_2" id="landline_2">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="{{$user->city ?? ''}}" name="city" id="city">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea rows="4" type="text" name="address" class="form-control" placeholder="Address"> {{$user->address ?? ''}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control">
                                        <option value="">-- Select Country --</option>
                                        @if($countries->count() > 0)
                                                @foreach($countries as $country)
                                                    <option value="{{$country->countries_id}}"  <?php if($user->countries_id == $country->countries_id) { echo "selected"; } ?>>{{$country->countries_name}}</option>
                                                @endforeach
                                        @else
                                                <option value="Data Not Available" >Data Not Available</option>
                                        @endif
                                    </select>
                                </div>
                                @if($user->isConsultant() ||$user->isUniversity())
                                <div class="form-group">
                                    <div class="row">
                        <label for="rating" style="font-size: 16px;margin: 17px;">Add Ratings</label>
                                <div class="rat">

                                    {{-- <label for="rating">Add Rating</label> --}}

                                    <label>
                                      <input type="radio" name="rating" value="1" checked/>
                                      <span class="icn">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="rating" value="2" @if($user->rating == 2) checked @endif/>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="rating" value="3" @if($user->rating == 3) checked @endif/>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="rating" value="4" @if($user->rating == 4) checked @endif/>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="rating" value="5" @if($user->rating == 5) checked @endif/>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                      <span class="icn">★</span>
                                    </label>
                                                </div>
                                            </div>

                                            </div>
                                            @endif
                            @if($user->isConsultant())
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" value="{{$user->consultant->company_name ?? ''}}" name="company_name" id="landline_1">
                                </div>
                                      <div class="form-group">
                                    <label for="address">About Consultant</label>
                                    <textarea rows="4" type="text" name="about_me" class="form-control" placeholder="About Consultant">{{$user->consultant->about_me ?? ''}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="url" class="form-control" value="{{$user->consultant->website ?? ''}}" name="website" id="website">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Working  Week Days</label>
                                    <input type="text" class="form-control" value="{{$user->consultant->working_week_days?? ''}}" name="city" id="city">
                                </div>
                                 <div class="form-group">
                                    <label>Time Slots</label>
                                    <input type="text" class="form-control" value="{{$user->consultant->start_time ?? ''}}-{{$user->consultant->end_time ?? ''}}" name="city" id="city">
                                </div> --}}
                                @endif
                                      @if($user->isUniversity())
                                <div class="form-group">
                                    <label>University Name</label>
                                    <input type="text" class="form-control" value="{{$user->university->university_name ?? ''}}" name="university_name" id="landline_1">
                                </div>
                                      <div class="form-group">
                                    <label for="address">About University</label>
                                    <textarea rows="4" type="text" name="about_me" class="form-control" placeholder="About University">{{$user->university->about_me ?? ''}} </textarea>
                                </div>
                                  <div class="form-group">
                                    <label>Average Fees</label>
                                    <input type="number" class="form-control" value="{{$user->university->average_fees ?? ''}}" name="average_fees" id="website">
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="url" class="form-control" value="{{$user->university->website ?? ''}}" name="website" id="website">
                                </div>
                                <input type="hidden" name="uni_id" value="{{$user->id}}">
                                {{-- <div class="form-group">
                                    <label>Working  Week Days</label>
                                    <input type="text" class="form-control" value="{{$user->consultant->working_week_days?? ''}}" name="city" id="city">
                                </div>
                                 <div class="form-group">
                                    <label>Time Slots</label>
                                    <input type="text" class="form-control" value="{{$user->consultant->start_time ?? ''}}-{{$user->consultant->end_time ?? ''}}" name="city" id="city">
                                </div> --}}
                                @endif
                                @if($user->isClient())
                                <input type="text" name="parameter_id" value=1 hidden>
                                @endif
                                @if($user->isConsultant())
                                <input type="text" name="parameter_id" value=2 hidden>
                                @endif
                                @if($user->isUniversity())
                                <input type="text" name="parameter_id" value=3 hidden>
                                @endif
                                <br>
                                <button type="submit" class="btn btn-primary">Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
@section('page-styles')
<style>
    .rat {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rat label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rat label:last-child {
  position: static;
}

.rat label:nth-child(1) {
  z-index: 5;
}

.rat label:nth-child(2) {
  z-index: 4;
}

.rat label:nth-child(3) {
  z-index: 3;
}

.rat label:nth-child(4) {
  z-index: 2;
}

.rat label:nth-child(5) {
  z-index: 1;
}

.rat label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rat label .icn {
  float: left;
  color: transparent;
}

.rat label:last-child .icn {
  color: rgb(241, 231, 231);
}

.rat:not(:hover) label input:checked ~ .icn,
.rat:hover label:hover input ~ .icn {
  color: rgb(240, 243, 39);
}

.rat label input:focus:not(:checked) ~ .icn:last-child {
  color: rgb(247, 240, 240);
  text-shadow: 0 0 5px #09f;
}
    </style>
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
td.details-control {
background: url('../assets/images/details_open.png') no-repeat center center;
cursor: pointer;
}
tr.shown td.details-control {
    background: url('../assets/images/details_close.png') no-repeat center center;
}
</style>
@stop
@section('page-script')

<script>
    $(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});
</script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@stop
