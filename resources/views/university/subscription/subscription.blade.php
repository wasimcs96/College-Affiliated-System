@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Subscription')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Subscription</h2>
            <ul class="header-dropdown dropdown">
<li><a class="btn btn-primary btn-sm" style="color: white;" href="{{route('university.subscription.add')}}">Purchase subscription</a></li>
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
                            <th><b> Package Discription</b></th>
                            <th><b>Amount</b></th>
                            <th><b>Transaction Id </b></th>
                             {{--  <th><b>Date</b></th>
                            <th><b>Time Slot</b></th> --}}
                            <th><b> Status</b></th>
                            {{-- <th><b>Actions</b></th> --}}
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    {{-- {{dd($rts)}} --}}
                    @if($subscriptions->count() > 0)
                    <tbody>

                        @foreach($subscriptions as $subscription)
                        <?php $orders=$subscription->OrderItem?>
@foreach($orders as $order)
                        <tr>
                            <td>{{$order->Item_title}}</td>
                            <td>{{$subscription->amount}}$</td>
                            {{-- <td>{{$rt->expire_date}}</td> --}}
                            {{-- <td>{{$booking->booking_start_time}}-{{$booking->booking_end_time}}</td> --}}
                            <td>{{$subscription->transaction_id}}</td>
                            <td>

                                @if($subscription->status==0)<div class="btn btn-warning">Pending</div>@endif
                                {{-- @if($subscription->expire_date>$mytime)<div class="btn btn-success">Active</div>@endif
                                @if($subscription->expire_date<$mytime)<div class="btn btn-danger">Expired</div>@endif --}}
                                @if($subscription->status==1)<div class="btn btn-primary">Inactive</div>@endif
                            </td>
                            {{-- <td><a href="#" class="btn btn-danger"><i class="icon-trash"></i></a></td> --}}
                        </tr>
@endforeach
@endforeach
</tbody>
@else

Records not available
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