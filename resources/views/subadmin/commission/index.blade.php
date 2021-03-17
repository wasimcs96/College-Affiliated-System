@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Commission')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Commission<small>Commission List</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                {{-- <a href="{{route('subadmin.user.add')}}"class="btn btn-primary"><i class="fa fa-plus"></i>  Add User </a> --}}
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>

                           <tr>
                               <th> <b>
                                Name</b></th>
                                {{-- <th><b> DOB</b></th> --}}
                                <th><b> Client Dues </b></th>
                                <th><b> Paid Amount</b></th>
                                <th><b>Total Client</b></th>
                                <th><b>Dues Amount</b></th>
                                <th><b>Client Count</b></th>
                                <th><b>Commission Type</b></th>
                                <th style="
                                text-align: center;
                            "><b>Actions</b></th>
                            </tr>

                    </thead>
                    <tfoot>

                    </tfoot>
                    @if($coms->count() > 0)
                        @if($id == 1)
                        <input type="text" value=1 name="parameter_id" hidden>
                            <tbody>
                                @foreach ($coms as $com)
                                        <tr>
                                            <td> {{$com->userConsultant->first_name ?? ''}} {{$com->userConsultant->last_name ?? ''}}</td>
                                            {{-- <td>{{$user->birth_year ?? ''}}</td> --}}
                                            <td>{{ Config::get('define.currency.currency') }}{!!"&nbsp"!!}{{$com->due_amount ?? ''}}</td>
                                            <td>{{ Config::get('define.currency.currency') }}{!!"&nbsp"!!}{{$com->paid_amount ?? ''}}</td>
                                            <td>{{$com->total_client_count ?? ''}}</td>
                                            <td>{{ Config::get('define.currency.currency') }}{!!"&nbsp"!!}{{$com->due_amount ?? ''}}</td>
                                            <td>{{$com->temp_client_count ?? ''}}</td>
                                            <td>Visa</td>
                                            <td style="
                                            text-align: center;
                                        ">
                                                {{-- <a href="{{route('subadmin.commission.show',['id' => $com->id])}}" class="btn btn-success"><i class="icon-eye"></i></a> --}}
                                            <a href="{{route('subadmin.commission.edit',['id' => $com->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            {{-- <a href="{{route('subadmin.user.delete',['id' => $com->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td> --}}
                                        </tr>
                                @endforeach
                            </tbody>
                        @endif
                        @if($id == 2)
                        <input type="text" value=2 name="parameter_id" hidden>
                            <tbody>
                                @foreach ($coms as $com)
                                        <tr>
                                            <td> {{$com->userConsultant->first_name ?? ''}} {{$com->userConsultant->last_name ?? ''}}</td>
                                            {{-- <td>{{$user->birth_year ?? ''}}</td> --}}
                                            <td>{{ Config::get('define.currency.currency') }}{!!"&nbsp"!!}{{$com->due_amount ?? ''}}</td>
                                            <td>{{ Config::get('define.currency.currency') }}{!!"&nbsp"!!}{{$com->paid_amount ?? ''}}</td>
                                            <td>{{$com->total_client_count ?? ''}}</td>
                                            <td>{{$com->due_amount ?? ''}}</td>
                                            <td>{{$com->temp_client_count ?? ''}}</td>
                                            <td>PR</td>
                                            <td style="text-align: center;">
                                                {{-- <a href="{{route('subadmin.commission.show',['id' => $com->id])}}" class="btn btn-success"><i class="icon-eye"></i></a> --}}
                                            <a href="{{route('subadmin.commission.edit',['id' => $com->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            {{-- <a href="{{route('subadmin.user.delete',['id' => $com->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td> --}}
                                        </tr>
                                @endforeach
                            </tbody>
                        @endif
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
