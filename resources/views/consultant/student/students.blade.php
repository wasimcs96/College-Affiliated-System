@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Student')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Students<small>All Students</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th> <b>
                                Name</b></th>
                            <th><b> Mobile </b></th>
                            <th><b> E-mail</b></th>
                            <th><b>City</b></th>
                            <th><b>Country</b></th>
                            {{-- <th><b> Status</b></th> --}}
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    {{-- {{ dd($students) }} --}}
                    @if($students->count() > 0)
                    <tbody>

                @foreach($students as $student)
                {{-- {{ dd($student->user->first_name) }} --}}

                        <tr>
                            <td>{{$student->user->first_name ?? ''}} </td>
                            <td>{{$student->user->mobile ?? ''}}</td>
                            <td>{{$student->user->email ?? ''}}</td>
                            <td>{{$student->user->city ?? ''}}</td>
                            <td>      @if(isset($student->user->countries_id) && $student->user->countries_id )
                                <?php $country = DB::table('countries')->where('countries_id',$student->user->countries_id)->first();
                                
                                
                                ?>
                            {{$country->countries_name ?? 'N/A'}} @else N/A @endif</td>


                            <td style="text-align: center;"><a href="{{route('client.application.show',['id'=> $student->id])}}" class="btn btn-success">Go to application</a></td>
                        </tr>

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
