@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Commission')

@section('content')


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Edit Your Commission</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                </ul>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Form for @if(isset($com->due_amount_type)) @if($com->due_amount_type==0)Visa @else PR @endif @endif</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('admin.commission.update', $com->id)}}">
                                @csrf

                                <div class="form-group">
                                    <label>Due Amount</label>
                                    <input type="decimal" class="form-control" value="{{$com->due_amount ?? ''}}" name="due_amount" id="due_amount" required>
                                </div>

                                <div class="form-group">
                                    <label>Client Dues</label>
                                    <input type="number" class="form-control" value="{{$com->temp_client_count ?? ''}}" name="temp_client_count" id="temp_client_count" required>
                                </div>
                                <input type="text" name="parameter_id" value="@if(isset($com->due_amount_type)) @if($com->due_amount_type==0) 1 @else 2 @endif @endif" hidden>
                                <br>
                                <button type="submit" class="btn btn-primary">Update Commission</button>
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
