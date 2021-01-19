@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Courses')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Courses<small>All Courses</small></h2>
            {{-- <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                    <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
                </form>
            </div> --}}
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <a href="{{route('admin.courses.add')}}"class="btn btn-primary"><i class="fa fa-plus"></i>  Add Course</a>

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
                            <th> <b>Category</b></th>
                            <th><b> Name </b></th>
                            <th><b> Type</b></th>
                            <th><b>Action<b></th>

                        </tr>
                    </thead>
                    @if($courses->count() > 0)
                   <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->category->title ?? ''}}</td>
                             <td>{{$course->name}}</td>
                            <td>
                                @if ($course->type  == 0)

                                    <span class="">UG</span>

                                @elseif($course->type == 1)

                                    <span class="">PG</span>

                                @else

                                    <span class="">Diploma</span>

                                @endif
                            </td>


                            <td style="text-align: center;">
                            <a href="{{route('admin.courses.show', $course->id)}}" class="btn btn-warning btn-sm" data-toggle="tooltip" alt="View Course" title="" data-original-title="View"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.courses.edit', $course->id )}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit course" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp;



                              <a href="{{route('admin.courses.delete', $course->id)}}" class="confirmDeleteBtn btn btn-danger btn-sm btn-flat" data-toggle="tooltip" alt="Delete Course" data-url="" data-title="Delete"><i class="fa fa-trash"></i></a>

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
