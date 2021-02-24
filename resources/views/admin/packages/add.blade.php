@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Pacakges')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Add Your Package</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Form</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('admin.packages.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" id="title" required>
                                </div>
                              <div class="form-group">
                                        <label>Package Type</label>
                                        <select name="package_type" id="package_type" class="form-control" required>
                                            <option value="">-- Select Package --</option>
                                            <option value="0">Subscription</option>
                                            <option value="1">Premium</option>
                                            <option value="2">Advertisement</option>

                                        </select>
                              </div>
                              <div class="form-group" id="type">

                             </div>
                                <div class="form-group">
                                    <label>Package Time(in months)</label>
                                    <input type="number" class="form-control" name="package_time" id="package_time" required>
                                </div>
                                <div class="form-group">
                                    <label>Amount(in Rs.)</label>
                                    <input type="number" class="form-control" name="amount" id="amount" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                               </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="5" cols="30" required></textarea>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary">Add Package</button>
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
  $(document).on('change', '#package_type', function (){
            // console.log(this.value);
          if ( this.value == '2')
          {
            $("#type").html('<label>Select Advertisement Type</label><select name="advertisement_type" class="form-control" required><option value="">-- Select Advertisement Type --</option><option value="0">Inner</option><option value="1">Outer</option></select>');
          }
        else {
            $("#type").html('');
        }

        });

    </script>
@stop
