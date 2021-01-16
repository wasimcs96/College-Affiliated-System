@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'See Application Follow up Details')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Application<small>Application Follow up Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                {{-- <a href="{{route('consultant.application.followup.create')}}"class="btn btn-primary"><i class="fa fa-plus"></i>Add </a> --}}

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">

                    <tbody>

                        <tr>
                            <th scope="row">Student Name</th>
                            <td>{{$applications->application->user->first_name ?? ''}} {{$applications->application->user->last_name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Name</th>
                            <td>{{$applications->application->userConsultant->first_name ?? ''}} {{$applications->application->userConsultant->last_name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Note</th>
                            <td>{{$applications->note ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>{{$applications->date ?? ''}}</td>
                        </tr>


                    </tbody>

                </table>

                <a href="{{route('admin.application.followup')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
                <a style="text-align: center;" href="{{route('admin.application.create',['id'=> $applications->application_id])}}" class="btn btn-primary">Go to Application<i class="icon-arrow"></i></a>

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
