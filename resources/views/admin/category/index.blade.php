@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Category')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Category<small>All Category</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <a href="{{route('admin.category.add')}}"class="btn btn-primary"><i class="fa fa-plus"></i>Add </a>
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
                            <th> <b>Category Image</b></th>
                            <th> <b>Parent Category</b></th>
                            <th><b> Title </b></th>
                            {{-- <th><b> Slug</b></th> --}}
                            <th><b>Status</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    @if($categories->count() > 0)
                   <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td style="text-align: center;">
                                @if(isset($category->banner) && file_exists($category->banner))<a href="{{asset($category->banner ?? '')}}" target="_blank"> <img src="{{asset($category->banner ?? '')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"></a>@else <img src="{{asset('assets/default/default-banner.jpg')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"> @endif</td>
                            <td>{{$category->parent_category->title ?? 'N/A'}}</td>
                            <td>
                               {{$category->title ?? ''}}
                            </td>

                            {{-- <td>{{$category->slug}}</td> --}}
                            <td>
                                @if (isset($category->status))
@if($category->status==0)
                                    <span class="btn btn-danger">InActive</span>

                                @else

                                 <span class="btn btn-info">Active</span>

                                @endif
                                @endif

                            </td>
                            <td style="text-align: center;">
                                <a href="{{route('admin.category.show', $category->id)}}" class="btn btn-warning btn-sm" data-toggle="tooltip" alt="View " title="" data-original-title="View"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.category.edit', $category->id )}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.category.delete', $category->id)}}" class="confirmDeleteBtn btn btn-danger btn-sm btn-flat" data-toggle="tooltip" alt="Delete " data-url="" data-title="Delete"><i class="fa fa-trash"></i></a>
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
