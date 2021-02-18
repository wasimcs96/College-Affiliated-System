@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Loan')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Add  Loan</h2>
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
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Form</h2>
                        </div>
                        <div class="body">
                            <form method="post" action="{{route('admin.loan.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Provider</label>
                                    <input type="text" class="form-control" name="provider" id="provider" required>
                                </div>
                                <div class="form-group">
                                    <label>Interest Rate</label>
                                    <input type="number" class="form-control" name="interest_rate" id="interest_rate" required>
                                </div>
                                <div class="form-group">
                                    <label>Tenure</label>
                                    <input type="number" class="form-control" name="tenure" id="tenure" required>
                                </div>
                                <div class="form-group">
                                    <label>Processing Fees</label>
                                    <input type="number" class="form-control" name="processing_fees" id="processing_fees" required>
                                </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                               </div>


                    </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Add Loan</button>
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
<link rel="stylesheet"
    href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" />
<style>

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
