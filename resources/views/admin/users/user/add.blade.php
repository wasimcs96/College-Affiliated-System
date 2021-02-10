@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Add Users')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Add Users</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('admin.user.store')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label>Select Account Type</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="">Select Account Type</option>
                                        <option value="2">University</option>
                                        <option value="3">Student</option>
                                        <option value="4">Consultant</option>
                                        <option value="5">SubAdmin</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" required>
                                </div>
                                <div style='display:none;' class="form-group" id="uniname">
                                    <label>University Name</label>
                                    <input type="text" class="form-control" name="university_name" id="university_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                {{-- <div class="col-lg-4 col-md-12"> --}}
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select name="country" class="form-control" required>
                                            <option value="">-- Select Country --</option>
                                            <?php $countries = App\Models\Country::all(); ?>
                                            @if($countries->count() > 0)
                                                @foreach($countries as $country)
                                                    <option value="{{$country->countries_id ?? ''}}" >{{$country->countries_name ?? ''}}</option>
                                                @endforeach
                                            @else
                                        <option value="Data Not Available" >Data Not Available</option>
                                            @endif
                                        </select>

                                    </div>
                                {{-- </div> --}}
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" name="mobile" id="mobile" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Create User</button>
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
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script>
$(document).ready(function(){
    $('#role').on('change', function() {
      if ( this.value == '2')
      //.....................^.......
      {
        $("#uniname").show();
      }
      else
      {
        $("#uniname").hide();
      }
    });
});
</script>
@stop
