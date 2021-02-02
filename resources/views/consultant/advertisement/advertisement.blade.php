@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Advertisement')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Advertisement</h2>
            <ul class="header-dropdown dropdown">
<li><a class="btn btn-primary btn-sm" style="color: white;" href="{{route('consultant.advertisement.add')}}">Purchase AD</a></li>
                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th><b>Banner Image</b></th>
                            <th><b>Transaction Id</b></th>
                            <th><b>Click Count</b></th>
                            <th><b>Start Date </b></th>
                            <th><b>End Date</b></th>
                            <th><b>Purchased Date</b></th>
                            <th><b> Status</b></th>
                            <th><b>Action<b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                        <?php  $rts= auth()->user()->advertisement;
                    ?>
                    @if($rts->count() > 0)
                    <tbody>
{{-- {{dd($rts)}} --}}
                        @foreach($rts as $key => $rt)
                    {{-- @if($rt->payment_type == 2) --}}

                        {{-- {{dd($rt->advertisement)}} --}}
                        <tr>
                            <td style="text-align: center;">
                                @if(isset($rt->banner_image) && file_exists($rt->banner_image))<a href="{{asset($rt->banner_image ?? '')}}" target="_blank"> <img src="{{asset($rt->banner_image ?? '')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"></a>@else <img src="{{asset('assets/default/default-banner.jpg')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"> @endif</td>
                             <td>{{$rt->order->transaction_id ?? ''}}</td>
                             <td>@if(isset($rt->click_count)){{$rt->click_count ?? ''}}@else N/A @endif</td>

                             <td>{{ Carbon\Carbon::parse($rt->start_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                             <td>{{ Carbon\Carbon::parse($rt->end_date ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                             <td>{{ Carbon\Carbon::parse($rt->created_at ?? '')->format(config('get.ADMIN_DATE_FORMAT')) }}</td>

                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                <td>
                                {{-- @if($rt->status==0)<div class="btn btn-warning">Pending</div>@endif --}}
                                @if($rt->expire_date>$mytime)<div class="btn btn-success">Activated</div>@endif
                                @if($rt->expire_date<$mytime && $rt->expire_date == !null)<div class="btn btn-danger">Expired</div>@endif
                                @if($rt->expire_date == null)<div class="btn btn-warning">Pending</div>@endif
                            </td>
                            <td>@if($rt->expire_date == null)<a href="{{route('consultant.advertisement.edit',['id'=>$rt->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>@endif</td>
                        </tr>
                        {{-- @endif --}}
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
    /* * {
      box-sizing: border-box;
    } */

    #zm {
      /* padding: 50px; */
      /* background-color: green; */
      transition: transform .2s;

      margin: 0 auto;
    }

    #zm:hover {

      -ms-transform: scale(1.5); /* IE 9 */
      -webkit-transform: scale(1.5); /* Safari 3-8 */
      transform: scale(1.5);
    }
    </style>
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
<script></script>
@stop
