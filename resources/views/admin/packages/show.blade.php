@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Packages')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Packages<small>Packages Details</small></h2>
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
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>

                    <tr>
                        <th scope="row"> Title</th>
                        <td>{{$package->title}}</td>
                    </tr>
                    <tr>
                        <th><b> Package Type </b></th>
                        <td>

                            @if ($package->package_type  == 0)

                            <span class="">Subscription</span>

                        @elseif($package->package_type == 1)

                            <span class="">Premium</span>

                        @else

                            <span class="">Advertisement</span>

                        @endif

                        </td>
                    </tr>

                    <tr>
                        <th><b> Description</b></th>
                        <td>{{$package->description}}</td>
                    </tr>

                    <tr>
                        <th><b> Package Time </b></th>
                        <td>{{$package->package_time}}{!!"&nbsp"!!}-{!!"&nbsp"!!}Months</td>
                    </tr>



                    <tr>
                        <th><b>Amount</b></th>
                        <td><i class="fa fa-inr" aria-hidden="true"></i>{!!"&nbsp"!!}{{$package->amount}}</td>
                    </tr>

                    <tr>
                        <th><b>Status</b></th>
                        <td>

                            @if ($package->status == 0)

                                <span class="btn btn-danger">InActive</span>

                            @else

                                <span class="btn btn-info">Active</span>

                            @endif

                        </td>
                    </tr>



            </div>


                    </tbody>

                </table>
                <div id="dec">

                </div>

                <a href="{{route('admin.packages')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
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
