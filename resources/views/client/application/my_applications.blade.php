@extends('layout.master')
@section('parentPageTitle', 'Client')
@section('title', 'My Applications')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Applications<small>All Application requests</small></h2>
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
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th> <b>Consultant Name</b></th>
                            <th><b> Applied On</b></th>
                            <th><b> Status</b></th>
                            <th style="text-align: center;"><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    @if($applications->count() > 0)

                    <tbody>
                        @foreach($applications as $application)
                            @if(auth()->user()->id == $application->client_id)
                            <tr>
                                <td>{{$application->userConsultant->first_name ?? ''}} {{$application->userConsultant->last_name ?? ''}} </td>
                               {{-- {{ dd($application->university) }} --}}


                                <td>{{ Carbon\Carbon::parse($application->created_at)->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                                <td>
                                    @if($application->status==0 ?? '')<div class="btn btn-warning">In Progress</div>@endif
                                    @if($application->status==1 ?? '')<div class="btn btn-success">Completed</div>@endif
                                    @if($application->status==2 ?? '')<div class="btn btn-danger">Closed</div>@endif
                                </td>

                                <td style="text-align: center;"><a href="{{route('client.application.show',['id'=> $application->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
                            </tr>
                            @endif
                        @endforeach


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
.buttons-print{
    display: none;

}
.buttons-csv{
    display: none;
    
}
.buttons-copy{
    display: none;
    
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

