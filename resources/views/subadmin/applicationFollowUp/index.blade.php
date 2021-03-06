@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Application Follow up')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Application<small>Application Follow up</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                {{-- <a href="{{route('consultant.application.followup.create')}}"class="btn btn-primary"><i class="fa fa-plus"></i>Add </a> --}}

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>

                        <tr>
                            <th> <b>Student Name</b></th>
                            <th> <b>Consultant Name</b></th>
                            <th><b> Note </b></th>
                            <th><b> Date </b></th>
                            <th style="text-align: center;"><b> Actions </b></th>
                        </tr>
                    </thead>
                    @if($applications->count() > 0)
                   <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{$application->application->user->first_name ?? ''}} {{$application->application->user->last_name ?? ''}}</td>
                            {{-- <td>@if($application->application->status==0)<div class="btn btn-warning">In Progress</div>@endif
                                @if($application->application->status==1)<div class="btn btn-danger">Closed</div>@endif
                            </td> --}}
                            <td>{{$application->application->userConsultant->first_name ?? ''}} {{$application->application->userConsultant->last_name ?? ''}}</td>
                            <td>{{$application->note ?? ''}}</td>
                            <td>@if(isset($application->date)){{ Carbon\Carbon::parse($application->date)->format(config('get.ADMIN_DATE_FORMAT')) }}@endif</td>

                            <td style="text-align: center;">
                                {{-- <a href="{{route('subadmin.application.followup.show',['id'=> $application->id])}}" class="btn btn-success"><i class="icon-eye"></i></a> --}}
                                <a href="{{route('subadmin.application.create',['id'=> $application->application_id])}}" class="btn btn-primary">Go to Application<i class="icon-arrow"></i></a>
                            </td>

                        </tr>

                        @endforeach
                    <tbody>
                        @endif
                </table>
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
