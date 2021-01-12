@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Premium')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Membership</h2>
            <ul class="header-dropdown dropdown">
<li><a class="btn btn-primary btn-sm" style="color: white;" href="{{route('university.gopremium')}}">Go Premium</a></li>
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
                           <th><b>Start Date</b></th>
                            <th><b>End Date</b></th>
                            <th><b>Purchased Date</b></th>
                            <th><b> Status</b></th>
                            {{-- <th><b>Actions</b></th> --}}
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    {{-- {{dd($rts)}} --}}
                    <?php $premiums= auth()->user()->order;

                    ?>
                    @if($premiums->count() > 0)
                    <tbody>
                                            @foreach($premiums as $key => $premium)

                                            @if($premium->payment_type == 1)
                                            <tr>
                                                <td>{{$premium->OrderItem[0]->Item_title}}</td>
                                                <td>{{$premium->amount}}$</td>
                                                <td>{{$premium->transaction_id}}</td>
                                                <td>{{$premium->userPurchasedPlans[0]->start_date}}</td>
                                                <td>{{$premium->userPurchasedPlans[0]->end_date}}</td>
                                                <td>{{$premium->created_at}}</td>
                                                <td>
                                                    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                                    @if($premium->userPurchasedPlans[0]->end_date > $mytime)<div class="btn btn-success">Activated</div>@endif

                                                    @if($premium->userPurchasedPlans[0]->end_date < $mytime)<div class="btn btn-danger">Expired</div>@endif
                                                </td>
                                                {{-- <td><a href="#" class="btn btn-danger"><i class="icon-trash"></i></a></td> --}}
                                            </tr>
                                            @endif

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
