@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Contact')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Contact <small>All Contact Messages</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
               {{-- <li><a  style="color: white;" href="{{route('admin.blog.add')}}"class="btn btn-primary"><i class="fa fa-plus"></i>{!! "&nbsp;"!!}Add</a></li> --}}
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
                            <th> <b> Name</b></th>
                            <th> <b>Email</b></th>
                            <th><b>Type</b></th>
                            {{-- <th><b>Message</b></th> --}}
                            {{-- <th><b>Status</b></th> --}}
                            <th style="text-align: center;"><b>Action<b></th>

                        </tr>
                    </thead>
                    <?php $contacts=App\Models\Contact::orderBy('updated_at', 'DESC')->get(); ?>
                    @if($contacts->count() > 0)
                   <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            {{-- <td><img style="height: 56px;width: 56px;" src="{{asset($blog->main_image ?? '')}}"></td> --}}
                            <td>{{$contact->name ?? ''}}</td>


                             {{-- <td>{{$blog->content ?? ''}}</td> --}}

                             <td>{{$contact->email ?? ''}}</td>

                             <td>
                                    @if ($contact->type == 0)

                                        <span class="">Normal Enquiry</span>

                                     @else

                                        <span class="">Loan Enquiry</span>

                                     @endif
                            </td>

                             {{-- <td>{{$contact->message ?? ''}}</td> --}}




                            <td style="text-align: center;">
                            <a href="{{route('admin.contact.show', $contact->id ?? '')}}" class="btn btn-warning btn-sm" data-toggle="tooltip" alt="View Course" title="" data-original-title="View"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;

                           {{--  <a href="{{route('admin.contact.reply', $contact->id ?? '')}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit course" title="" data-original-title="reply"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp;



                              <a href="{{route('admin.contact.delete', $contact->id ?? '')}}" class="confirmDeleteBtn btn btn-danger btn-sm btn-flat" data-toggle="tooltip" alt="Delete request" data-url="" data-title="Delete"><i class="fa fa-trash"></i></a>

                            </td> --}}

                        </tr>

                        @endforeach
                    <tbody>
                        {{-- @else
                        <tfoot>
                            <tr>
                                <td colspan='7' align='center'> <strong>Record Not Available</strong> </td>
                            </tr>
                        </tfoot> --}}
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
