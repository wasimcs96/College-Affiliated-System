@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Earning')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Earning<small>All Earning</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th> <b>
                                Name</b></th>
                            <th><b> User type </b></th>
                            <th><b> Amount</b></th>
                            <th><b>Transaction ID</b></th>
                            <th><b> Payment Type</b></th>
                            <th><b>Purchased Date</b></th>
                            <th><b> Status</b></th>
                            <th style="text-align: center;"><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    @if($orders->count() > 0)
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->user->first_name ?? ''}}{{$order->user->last_name ?? ''}}</td>
                            <td>@if($order->user->isConsultant()) Consultant @endif
                                @if($order->user->isUniversity()) University @endif
                                @if($order->user->isAdmin()) Admin @endif
                                @if($order->user->isSubAdmin()) SubAdmin @endif
                                @if($order->user->isClient()) Client @endif
                            </td>
                            <td><i class="fa fa-inr"></i> {{$order->amount ?? ''}}</td>
                            <td>{{$order->transaction_id}}</td>
                            <td>@if($order->payment_type == 0)Subscription @endif
                                @if($order->payment_type == 1)Premium @endif
                                @if($order->payment_type == 2)Advertisement @endif
                                @if($order->payment_type == 3)Consultant Visa Commission @endif
                                @if($order->payment_type == 4)Consultant PR Commission @endif
                            </td>
                            <td style="text-align: center;">{{$order->created_at->format('Y-m-d')}}</td>
                            <td>
                            @if ($order->status == 0)
                                <span class="btn btn-danger">InActive</span>
                            @else
                                <span class="btn btn-info">Active</span>
                            @endif </td>

                            <td style="text-align: center;"><a href="{{route('admin.earning.earning_show',['id'=>$order->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
                        </tr>
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
