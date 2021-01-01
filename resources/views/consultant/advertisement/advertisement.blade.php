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
                            <th><b> Date </b></th>
                            <th><b> Status</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <?php $adid=auth()->user()->id?>
                        <?php  $rts=App\Models\Advertisement::where('user_id',$adid)->orderBy('updated_at', 'DESC')->get();
                    ?>
                    {{-- {{dd($rts)}} --}}
                    @if($rts->count() > 0)
                    <tbody>

                        @foreach($rts as $rt)

                        <tr>
                            <td>  <img src="{{asset($rt->banner_image)}}" class="user-photo" alt="User Profile Picture" width="40px" height="40px"></td>
                            {{-- <td>{{$booking->user->mobile}}</td>
                            <td>{{$booking->user->email}}</td> --}}
                            <td>{{$rt->expire_date}}</td>
                            {{-- <td>{{$booking->booking_start_time}}-{{$booking->booking_end_time}}</td> --}}
                            <td>
                                <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>

                                {{-- @if($rt->status==0)<div class="btn btn-warning">Pending</div>@endif --}}
                                @if($rt->expire_date>$mytime)<div class="btn btn-success">Active</div>@endif
                                @if($rt->expire_date<$mytime)<div class="btn btn-danger">Expired</div>@endif
                                @if($rt->status==2)<div class="btn btn-primary">Inactive</div>@endif
                            </td>
                            {{-- <td><a href="#" class="btn btn-danger"><i class="icon-trash"></i></a></td> --}}
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
