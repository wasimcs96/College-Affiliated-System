@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Packages')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Packages<small>All Packages</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <a href="{{route('admin.packages.add')}}"class="btn btn-primary"><i class="fa fa-plus"></i>Add </a>
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
                            <th> <b>Title</b></th>
                            <th><b> Package Type </b></th>
                            <th><b> Description</b></th>
                            <th><b> Package Time(in months) </b></th>
                            <th><b>Amount</b></th>
                            <th><b>Status</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    @if($packages->count() > 0)
                   <tbody>
                    @foreach ($packages as $package)
                        <tr>

                            <td>{{$package->title}}</td>
                            <td>
                                @if ($package->package_type  == 0)

                                    <span class="">Subscription</span>

                                @elseif($package->package_type == 1)

                                    <span class="">Premium</span>

                                @else

                                    <span class="">Advertisement</span>

                                @endif
                            </td>
                            <?php
                                            $myvalue =$package->description ?? '';
                                            if (strlen($myvalue) > 140)
                                                {
                                                    $myvalue = substr($myvalue, 0, 40);
                                                    $myvalue = explode(' ', $myvalue);
                                                    array_pop($myvalue); // remove last word from array
                                                    $myvalue = implode(' ', $myvalue);
                                                    // $myvalue = $myvalue . ' ...';
                                                } ?>
                            <td><?php echo ($myvalue . '...')?>  </td>
                            <td>{{$package->package_time}}{!!"&nbsp"!!}-{!!"&nbsp"!!}Months</td>
                            <td>{{ Config::get('define.currency.currency') }}{!!"&nbsp"!!}{{$package->amount}}</td>
                            <td>
                                @if ($package->status == 0)

                                    <span class="btn btn-danger">InActive</span>

                                @else

                                 <span class="btn btn-info">Active</span>

                                @endif
                            </td>
                            <td>
                            <a href="{{route('admin.packages.show', $package->id)}}" class="btn btn-warning btn-sm" data-toggle="tooltip" alt="View Package" title="" data-original-title="View"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.packages.edit', $package->id )}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp;



                              <a href="{{route('admin.packages.delete', $package->id)}}" class="confirmDeleteBtn btn btn-danger btn-sm btn-flat" data-toggle="tooltip" alt="Delete Package" data-url="" data-title="Delete Package"><i class="fa fa-trash"></i></a>

                            </td>

                        </tr>

                        @endforeach
                    <tbody>
                        @else
                        <tfoot>
                            <tr>
                                <td colspan='7' align='center'> <strong>Record Not Available</strong> </td>
                            </tr>
                        </tfoot>
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
