@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Advertisement')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Advertisement</h2>
            <ul class="header-dropdown dropdown">
{{-- <li><a class="btn btn-primary btn-sm" style="color: white;" href="{{route('consultant.advertisement.add')}}">Purchase AD</a></li> --}}
                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th  style="text-align: center;"><b>Banner Image</b></th>
                            <th><b>User Name</b></th>
                            <th><b>User type </b></th>
                            <th><b>Start Date</b></th>
                            <th><b>End Date</b></th>
                            <th><b>Purchased Date</b></th>
                            <th><b> Status</b></th>
                            <th style="text-align: center;"><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                        <?php  $rts=App\Models\Advertisement::all();
                    ?>
                    @if($rts->count() > 0)
                    <tbody>
{{-- {{dd($rts)}} --}}
                        @foreach($rts as $key => $rt)
                    {{-- @if($rt->payment_type == 2) --}}

                        {{-- {{dd($rt->advertisement)}} --}}
                        <tr>
                            <td style="text-align: center;">
                                @if(isset($rt->banner_image) && file_exists($rt->banner_image))<a href="{{asset($rt->banner_image)}}" target="_blank"> <img src="{{asset($rt->banner_image)}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"></a>@else <img src="{{asset('assets/default/default-banner.jpg')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"> @endif</td>
                                 <td>{{$rt->user->first_name ?? ''}}</td>

                            <td>@if($rt->user->isConsultant() ?? '') Consultant @endif
                            @if($rt->user->isUniversity() ?? '') Univeristy @endif</td>
                            {{-- <td>{{$rt->expire_date ?? ''}}</td> --}}
                            <td>
                                @if(isset($rt->start_date )){{ Carbon\Carbon::parse($rt->start_date )->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif
                            </td>
                            <td>
                                @if(isset($rt->expire_date )){{ Carbon\Carbon::parse($rt->expire_date )->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif
                            </td>
                            <td>@if(isset($rt->created_at)){{ Carbon\Carbon::parse($rt->created_at)->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif</td>
                            <td>
                                    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                {{-- @if($rt->status==0)<div class="btn btn-warning">Pending</div>@endif --}}
                                @if($rt->expire_date>$mytime)<div class="btn btn-success">Activated</div>@endif
                                @if($rt->expire_date<$mytime && $rt->expire_date == !null)<div class="btn btn-danger">Expired</div>@endif
                                @if($rt->expire_date == null)<div class="btn btn-warning">Pending</div>@endif
                                {{-- @if($rt->status==2)<div class="btn btn-primary">Inactive</div>@endif --}}
                            </td>
                            <td> @if($rt->expire_date == null)
                                <div class="row" style="justify-content: center;">
                                <form action="{{route('subadmin.advertisement_manager.update')}}" method="POST" >
                                @csrf
                                <input type="hidden" value="{{$rt->id}}" name="rtid"> <input type="hidden" value="{{$rt->time_period}}" name="time_period"><button type="submit" data-toggle="tooltip" data-placement="top" title="Accept" class="btn btn-success"><i class="icon-check"></i></button>
                            </form>

                                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Reject" style="margin-left: 8px;"><i class="icon-trash"></i></a>
                        </div>
                        @endif</td>
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
@stop
