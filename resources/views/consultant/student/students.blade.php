@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Student')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Students<small>All Students</small></h2>
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
                            <th><b> Mobile </b></th>
                            <th><b> E-mail</b></th>
                            <th><b>City</b></th>
                            <th><b>Country</b></th>
                            <th><b> Status</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <?php $bookings=auth()->user()->consultantBooking;
                     ?>
                    {{-- {{ dd($bookings) }} --}}
                    @if($bookings->count() > 0)
                    <tbody>

                @foreach($bookings as $booking)
                    @if($booking->status==1 || $booking->status==2 || $booking->status==3)
                        <tr>
                            <td>{{$booking->user->first_name ?? ''}} </td>
                            <td>{{$booking->user->mobile ?? ''}}</td>
                            <td>{{$booking->user->email ?? ''}}</td>
                            <td>{{$booking->user->city ?? ''}}</td>
                            <td>{{$booking->user->country->countries_name ?? ''}}</td>
                            <td>@if($booking->status==0 ?? '')<div class="btn btn-warning">Pending</div>@endif
                                @if($booking->status==1 ?? '')<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==2 ?? '')<div class="btn btn-danger">Rejected</div>@endif
                                @if($booking->status==3 ?? '')<div class="btn btn-primary">Walking</div>@endif
                            </td>
                            <td style="text-align: center;"><a href="{{route('consultant.student.show',['id'=> $booking->id ?? ''])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
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
