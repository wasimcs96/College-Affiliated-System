@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Application')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Applications<small>All application created</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th> <b>
                                Name</b></th>
                            <th><b> Mobile </b></th>
                            <th><b> E-mail</b></th>
                            {{-- <th><b> Universities</b></th> --}}
                            {{-- <th><b> Date</b></th> --}}
                            <th><b> Status</b></th>
                            <th style="text-align: center;"><b> Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <?php $applications=auth()->user()->consultant->application; ?>
                    @if($applications->count() > 0)
                    <tbody>

                        @foreach($applications as $application)

                        <tr>
                            <td>{{$application->user->first_name}} </td>
                            <td>{{$application->user->mobile}}</td>
                            <td>{{$application->user->email}}</td>
                            {{-- <td>{{$application->consultant->university->university_name}}</td> --}}
                            {{-- <td>{{$booking->booking_start_time}}-{{$booking->booking_end_time}}</td> --}}
                            <td>@if($application->status==0)<div class="btn btn-warning">In Progress</div>@endif
                                @if($application->status==1)<div class="btn btn-danger">Closed</div>@endif

                            </td>
                            <td style="text-align: center;"><a href="{{route('consultant.application.create',['id'=> $application->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
                        </tr>
@endforeach
@else

Records not available
@endif
                    </tbody>
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
