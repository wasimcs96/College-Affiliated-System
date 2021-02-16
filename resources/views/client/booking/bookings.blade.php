@extends('layout.master')
@section('parentPageTitle', 'Client')
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
                            <th><b> Consultant  Name</b></th>
                            <th><b> Booking Date </b></th>
                            <th><b> Booking Time Slot </b></th>
                            <th><b> Status</b></th>
                            <th><b> Actions</b></th>

                        </tr>
                    </thead>
                    @if($bookings->count() > 0)

                    <tbody>
                        @foreach($bookings as $booking)
                            @if(auth()->user()->id == $booking->client_id)
                            <tr>
                                <td>{{$booking->userConsultant->first_name ?? ''}}  {{$booking->userConsultant->last_name ?? ''}} </td>

                                <td>@if(isset($booking->booking_date)){{ Carbon\Carbon::parse($booking->booking_date)->format(config('get.ADMIN_DATE_FORMAT')) }} @else N/A @endif</td>
                                {{-- <td>tru</td>--}}
                                <td>@if(isset($booking->booking_start_time)){{$booking->booking_start_time}}-{{$booking->booking_end_time}}@else N/A @endif</td>
                                {{-- <td>2020/30/11</td> --}}
                                @if(isset($booking->status))
                                 <td>@if($booking->status==0)<div class="btn btn-warning">Pending</div>@endif
                                @if($booking->status==1)<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==2)<div class="btn btn-primary">In Progress</div>@endif
                                @if($booking->status==3)<div class="btn btn-danger">Declined</div>@endif
                                @if($booking->status==4)<div class="btn btn-info">Closed</div>@endif
                            </td>
                            @endif

                                <td><a href="{{route('client.booking.show',['id'=> $booking->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
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
