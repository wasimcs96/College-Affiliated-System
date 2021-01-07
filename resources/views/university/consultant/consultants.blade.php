@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Consultants')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Consultants<small>All consultant requests</small></h2>
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
                            <th><b> Sno. </b></th>
                            <th> <b>
                                Name</b></th>
                            <th><b> Mobile </b></th>
                            <th><b> E-mail</b></th>

                            <th><b>Status</b></th>

                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    @if($universityConsultants ?? ''->count()>0)
                    <tbody>
                        <?php $sno=0;?>
                        @foreach($universityConsultants as $universityConsultant)
                        @if($universityConsultant->status == 0)
                        <tr class="row-{{ $universityConsultant->userConsultant->id }}">
                            <td> {{ $sno=$sno+1}}. </td>
                            <td>{{ $universityConsultant->userConsultant->first_name }} {{ $universityConsultant->userConsultant->last_name }}</td>
                            <td>{{ $universityConsultant->userConsultant->mobile }}</td>
                            <td>
                                {{ $universityConsultant->userConsultant->email }}
                            </td>

                            <td> @if($universityConsultant->status == 0)
                                <span class="btn btn-warning" >Pending</span>
                                @else
                                <span class="btn btn-info" >Accepted</span>
                              @endif</td>

                            <td><a href="{{route('university.consultant_show',['id' => $universityConsultant->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
                        </tr>
@endif
                     @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr>
                            <td colspan='7' align='center'> <strong>Record Not Available</strong> </td>
                        </tr>
                    </tfoot>
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
