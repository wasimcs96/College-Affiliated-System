@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Booking')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Bookings<small>All booking requests</small></h2>
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
                            <th> <b>
                                Name</b></th>
                            <th><b> Mobile </b></th>
                            <th><b> E-mail</b></th>
                            <th><b>Date</b></th>
                            <th><b>Time Slot</b></th>
                            <th><b> Status</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                <?php $bookings=auth()->user()->consultant->booking; ?>
                        @foreach($bookings as $booking)

                        <tr>
                            <td>{{$booking->user->first_name}} </td>
                            <td>{{$booking->user->mobile}}</td>
                            <td>{{$booking->user->email}}</td>
                            <td>{{$booking->booking_date}}</td>
                            <td>{{$booking->booking_start_time}}</td>
                            <td>@if($booking->status==0)<div class="btn btn-warning">Pending</div>@endif
                                @if($booking->status==1)<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==2)<div class="btn btn-danger">Rejected</div>@endif
                                @if($booking->status==3)<div class="btn btn-primary">Walking</div>@endif
                            </td>
                            <td><a href="{{route('consultant.booking.show',['id'=> $booking->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
                        </tr>
@endforeach



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
