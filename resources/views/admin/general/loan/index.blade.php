@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Loan')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Loan<small>All Loans requests</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <a href="{{route('admin.loan.create')}}"class="btn btn-primary"><i class="fa fa-plus"></i>Add </a>
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
                            <th><b>Provider</b></th>
                            <th><b>Interest Rate </b></th>
                            <th><b>Tenure</b></th>
                            <th><b>Processing Fees</b></th>
                            <th><b>Loan Status</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    @if($loans->count() > 0)
                    <tbody>

                        @foreach($loans as $loan)
                        <tr>
                            <td>@if(isset($loan->provider)){{$loan->provider}}
                               @else N/A @endif</td>
                               <td>@if(isset($loan->interest_rate)){{$loan->interest_rate}}
                               @else N/A @endif</td>
                               <td>@if(isset($loan->tenure)){{$loan->tenure}}
                               @else N/A @endif</td>
                               <td>@if(isset($loan->processing_fees)){{$loan->processing_fees}}
                               @else N/A @endif</td>

                            <td>@if($loan->status==0 ?? '')<div class="btn btn-warning">In Active</div>@endif
                                @if($loan->status==1 ?? '')<div class="btn btn-success">Active</div>@endif

                            </td>
                            <td style="text-align: center;">
                                <a href="{{route('admin.loan.show', $loan->id)}}" class="btn btn-warning btn-sm" data-toggle="tooltip" alt="View " title="" data-original-title="View"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.loan.edit', $loan->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.loan.delete', $loan->id)}}" class="confirmDeleteBtn btn btn-danger btn-sm btn-flat" data-toggle="tooltip" alt="Delete " data-url="" data-title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
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
