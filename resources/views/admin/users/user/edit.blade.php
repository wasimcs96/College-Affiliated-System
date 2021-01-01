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
                                                    <option value="{{$country->countries_name}}"  <?php if($user->country == $country->countries_name) { echo "selected"; } ?>>{{$country->countries_name}}</option>
                                                @endforeach
                                        @else
                                                <option value="Data Not Available" >Data Not Available</option>
                                        @endif
                                    </select>
                                </div>
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
                                <button type="submit" class="btn btn-primary">Update User</button>
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
@stop
