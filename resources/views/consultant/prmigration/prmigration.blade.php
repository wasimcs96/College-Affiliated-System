@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'PR Migration')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>PR Bookings<small>All PR booking requests</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable" id="example">
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
                    <?php $bookings=auth()->user()->consultantBooking;
                     ?>
                    {{-- {{ dd($bookings) }} --}}
                    @if($bookings->count() > 0)
                    <tbody>

                        @foreach($bookings as $booking)
@if($booking->booking_for == 1)
                        <tr>
                            <td>{{$booking->user->first_name ?? ''}} </td>
                            <td>{{$booking->user->mobile ?? ''}}</td>
                            <td>{{$booking->user->email ?? ''}}</td>

                            <td>{{ Carbon\Carbon::parse($booking->booking_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                            <td>{{$booking->booking_start_time ?? ''}}-{{$booking->booking_end_time ?? ''}}</td>
                            <td>@if($booking->status==0 ?? '')<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==1 ?? '')<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==2 ?? '')<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==3 ?? '')<div class="btn btn-success">Accepted</div>@endif
                            </td>
                            <td style="text-align: center;"><a href="{{route('prmigration.booking.show',['id'=> $booking->id ?? ''])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
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
{{-- <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );
</script>
@stop
