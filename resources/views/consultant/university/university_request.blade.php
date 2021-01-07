@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'University')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Universities<small>Universities Consultant Requested to</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>
                              <b>Name</b></th>
                            <th><b> Website</b></th>
                            <th><b> Type</b></th>
                            <th><b> Action</b></th>
                            {{-- <th><b> Location</b></th>
                            <th><b>Actions</b></th> --}}
                        </tr>
                    </thead>
                    @if($universities->count()>0)
                    <tbody>
                        <?php $sno=0;?>
                        @foreach($universities as $university)
                        @if($university->status == 0)
                        <tr class="row-{{ $university->id ?? '' }}">
                            <td>{{ $sno=$sno+1}}.</td>
                            <td>{{$university->userUniversity->university->university_name ?? ''}}</td>
                            <td>{{$university->userUniversity->university->website ?? ''}}</td>
                            <td>@if($university->userUniversity->university->type==0)
                                <span class="btn btn-warning" >Private</span>
                                @else
                                <span class="btn btn-info" >Government</span>
                              @endif</td>
                            {{-- <td> {{$university->university->user->address}}</td>
                            <td>Indian</td>--}}
                            <td>
                            <a href="{{route('consultant.request_university.show',['id'=>$university->userUniversity->university->id])}}" class="btn btn-success"><i class="icon-eye"></i></a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                @endif
                </table>
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
