@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Loan')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Loan<small>Loan Details</small></h2>
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
            <div class="table-responsive" >

                <table class="table table-hover table-striped">

                    <tbody>

                     <tr>
                        <th><b> Provider</b></th>
                        <td>{{$loan->provider}}</td>
                    </tr>

                    <tr>
                        <th><b> interest_rate</b></th>
                        <td>{{$loan->interest_rate}}</td>
                    </tr>

                    <tr>
                        <th><b> tenurer</b></th>
                        <td>{{$loan->tenure}}</td>
                    </tr>

                    <tr>
                        <th><b> processing_fees</b></th>
                        <td>{{$loan->processing_fees}}</td>
                    </tr>

                    <tr>
                        <th><b>Status</b></th>
                        <td>

                            @if ($loan->status == 0)

                                <span class="btn btn-danger">InActive</span>

                            @else

                                <span class="btn btn-info">Active</span>

                            @endif

                        </td>
                    </tr>



                    </tbody>

                </table>


                <a href="{{route('admin.general.loan')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
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
