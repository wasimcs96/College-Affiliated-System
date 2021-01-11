@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Students')

@section('content')


<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Students<small>All related students</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another Action</a></li>
                        <li><a href="javascript:void(0);">Something else</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th> <b>
                               Student Name</b></th>
                            <th><b>Student Mobile </b></th>
                            <th><b>Student E-mail</b></th>
                            <th><b>Student City</b></th>
                            <th><b>Student Country</b></th>

                            <th style="text-align: center;"><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @if($users->count() > 0)



                        @foreach ($users as $user)
                        {{-- {{dd($user->application->user->first_name)}} --}}
                        @if($user->application == !null)
                               <tr>
                                   <td> {{$user->application->user->first_name ?? ''}} {{$user->application->user->last_name ?? ''}}</td>

                                   <td>{{$user->application->user->mobile ?? ''}}</td>
                                   <td>{{$user->application->user->email ?? ''}}</td>
                                   <td>{{$user->application->user->city ?? ''}}</td>
                                   <td> {{$user->application->user->country ?? ''}} </td>
                                   <td style="text-align: center;"><a href="{{route('university.student.show',['id' => $user->application->user->id ?? ''])}}" class="btn btn-success"><i class="icon-eye"></i></a>
                                    {{-- <a href="{{route('admin.user.edit',['id' => $user->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.user.delete',['id' => $user->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}
                                </td>
                            </tr>

                        @endif

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
<script>
    $(function() {
        // (Optional) Active an item if it has the class "is-active"
        $(".accordion2 > .accordion-item.is-active").children(".accordion-panel").slideDown();

        $(".accordion2 > .accordion-item").click(function() {
            // Cancel the siblings
            $(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
            // Toggle the item
            $(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
        });
    });
</script>
@stop
