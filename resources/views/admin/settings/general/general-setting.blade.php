@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'General Settings')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2> Manage Setting
                <small>Here you can manage the settings</small></h2>
            <ul class="header-dropdown dropdown">
                <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('setting.general')}}" class="active">Settings</a></li>
                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <h3 class="box-title"><span class="caption-subject font-green bold uppercase">List Settings</span></h3>
                    <div class="box-tools" >
                        <a href="{{route('setting.general.add')}}" style="
    float: right;" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> New Setting</a>
                    </div>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col"><a href="{{ URL::route('setting.general',['sort' => 'title','direction'=> request()->direction == 'asc' ? 'desc' : 'asc']) }}">Title</a></th>
                            <th scope="col"><a href="{{ URL::route('setting.general',['sort' => 'slug','direction'=> request()->direction == 'asc' ? 'desc' : 'asc']) }}">Constant</a></th>
                            <th scope="col">Value</th>
                            <th scope="col" class="actions" style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                            @if($settings->count() > 0)
                            <tbody>
                        @php
                        $i = (($settings->currentPage() - 1) * ($settings->perPage()) + 1)
                        @endphp
                        @foreach($settings as $setting)
                            <tr>
                                <td> {{$i}}. </td>
                                <td>{{$setting->title}}</td>
                                <td>{{$setting->slug}}</td>
                                <td>{{$setting->config_value}}</td>
                                <td class="actions">
                                    <div class="btn-group">
                                        <a href="{{url('admin/settings/general/view/'.$setting->id)}}" class="btn btn-warning btn-sm" data-toggle="tooltip" alt="View setting" title="" data-original-title="View"><i class="fa fa-fw fa-eye"></i></a>
                                        <a href="{{url('admin/settings/general/edit/'.$setting->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        </tbody>

                        @endif
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        {{-- <div class="container"> --}}
            <div class="card">
            {{-- <div class="header"> --}}
                {{-- </div><!-- /.box-header --> --}}
                <div class="body">
                <h3 class="title">
                    <i class="fa fa-exclamation"></i> Important Rules
                </h3>
                <p>
                    For each config settings that would be added to the system, make sure it has these constant/slug:
                </p>
                <ul>
                    <li>
                        <small class="label bg-yellow">
                            SITE_TITLE
                        </small> - Will be replaced by website title from the admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            ADMIN_EMAIL
                        </small> - Will be replaced by admin email from the admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            FROM_EMAIL
                        </small> - Will be replaced by email from the admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            WEBSITE_OWNER
                        </small> - Will be replaced by Owner name from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            TELEPHONE
                        </small> - Will be replaced by phone number from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            ADMIN_PAGE_LIMIT
                        </small> - Will be replaced by admin page limit from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            FRONT_PAGE_LIMIT
                        </small> - Will be replaced by front page limit from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            ADMIN_DATE_FORMAT
                        </small> - Will be replaced by admin date format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            ADMIN_DATE_TIME_FORMAT
                        </small> - Will be replaced by admin date time format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            FRONT_DATE_FORMAT
                        </small> - Will be replaced by front date format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            FRONT_DATE_TIME_FORMAT
                        </small> - Will be replaced by front date time format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            CONTACT_US_TEXT
                        </small> - Will be replaced by front date time format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            GOOGLE_MAP_KEY
                        </small> - Will be replaced by front date time format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            OFFICE_ADDRESS
                        </small> - Will be replaced by front date time format from admin settings.
                    </li>
                    <li>
                        <small class="label bg-yellow">
                            DEVELOPMENT_MODE
                        </small> - Will be replaced by debug mode from admin settings.
                    </li>


                </ul>
            </div><!-- ./box-body -->
        </div>
    </div>
{{-- </div> --}}

</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
    /* * {
      box-sizing: border-box;
    } */

    #zm {
      /* padding: 50px; */
      /* background-color: green; */
      transition: transform .2s;

      margin: 0 auto;
    }

    #zm:hover {

      -ms-transform: scale(1.5); /* IE 9 */
      -webkit-transform: scale(1.5); /* Safari 3-8 */
      transform: scale(1.5);
    }
    </style>
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
