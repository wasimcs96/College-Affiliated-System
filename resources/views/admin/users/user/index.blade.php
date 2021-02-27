@extends('layout.master')
@section('parentPageTitle', 'Users')
@section('title', 'Users')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Users<small>All Users</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                @if($id == 3)
                <a href="{{route('admin.university.upload')}}"class="btn btn-warning"><i class="fa fa-plus"></i>  Upload University </a>
                @endif
                <a href="{{route('admin.user.add')}}"class="btn btn-primary"><i class="fa fa-plus"></i>  Add User </a>
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
                                <th><b> Mobile </b></th>
                                <th><b> E-mail</b></th>
                                <th><b>Status</b></th>
                                <th><b>Country</b></th>
                                <th  style="text-align: center;"><b>Actions</b></th>
                            </tr>

                    </thead>
                    <tfoot>

                    </tfoot>
                    @if($users->count() > 0)
                        @if($id == 1)
                        <input type="text" value=1 name="parameter_id" hidden>
                            <tbody>
                                @foreach ($users as $user)
                                    @if($user->isClient())
                                        <tr>
                                            <td> @if(isset($user->first_name)){{$user->first_name ?? ''}} {{$user->last_name ?? ''}} @else N/A @endif</td>
                                            {{-- <td>{{$user->birth_year ?? ''}}</td> --}}
                                            <td>@if(isset($user->mobile)){{$user->mobile ?? ''}} @else N/A @endif</td>
                                            <td>@if(isset($user->email)){{$user->email ?? ''}} @else N/A @endif</td>
                                            <td>@if(isset($user->status)) @if($user->status==1) <button class="btn btn-success"> Active</button> @endif @if($user->status==0) <button class="btn btn-danger"> InActive </button> @endif  @endif</td>
                                            {{-- {{dd($user->countries_id->country)}} --}}


                                            <td>     @if(isset($user->countries_id) && $user->countries_id )
                                                <?php $country = DB::table('countries')->where('countries_id',$user->countries_id)->get()->first();?>
                                            {{$country->countries_name ?? ''}} @else N/A @endif </td>
                                            <td><a href="{{route('admin.user.show',['id' => $user->id])}}" class="btn btn-success"><i class="icon-eye"></i></a>
                                            <a href="{{route('admin.user.edit',['id' => $user->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.user.delete',['id' => $user->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        @endif
                        @if($id == 2)
                        <input type="text" value=2 name="parameter_id" hidden>
                            <tbody>
                                @foreach ($users as $user)
                                    @if($user->isConsultant())
                                        <tr>
                                            <td>   @if(isset($user->first_name)){{$user->first_name ?? ''}} {{$user->last_name ?? ''}} @else N/A @endif</td>
                                            {{-- <td>{{$user->birth_year ?? ''}}</td> --}}
                                            <td>  @if(isset($user->mobile)){{$user->mobile ?? ''}} @else N/A @endif</td>
                                            <td>  @if(isset($user->email)){{$user->email ?? ''}} @else N/A @endif</td>
                                            <td>@if(isset($user->status)) @if($user->status==1) <button class="btn btn-success"> Active</button> @endif @if($user->status==0) <button class="btn btn-danger"> InActive </button> @endif  @endif</td>
                                            <td>     @if(isset($user->countries_id) && $user->countries_id )
                                                <?php $country = DB::table('countries')->where('countries_id',$user->countries_id)->get()->first();?>
                                            {{$country->countries_name ?? ''}} @else N/A @endif</td>

                                            <td><a href="{{route('admin.user.show',['id' => $user->id])}}" class="btn btn-success"><i class="icon-eye"></i></a>
                                            <a href="{{route('admin.user.edit',['id' => $user->id])}}" class="btn btn-warning"><i class="icon-pencil"></i></a>
                                            <a href="{{route('admin.user.delete',['id' => $user->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        @endif
                        @if($id == 3)
                        <input type="text" value=3 name="parameter_id" hidden>
                            <tbody>
                                @foreach ($users as $user)
                                    @if($user->isUniversity())
                                        <tr>
                                            <td>  @if(isset($user->university->university_name )) {{$user->university->university_name ?? ''}}  @else N/A @endif</td>
                                            {{-- <td>{{$user->birth_year ?? ''}}</td> --}}
                                            <td>  @if(isset($user->mobile)){{$user->mobile ?? ''}} @else N/A @endif</td>
                                            <td>  @if(isset($user->email)){{$user->email ?? ''}} @else N/A @endif</td>
                                            <td>@if(isset($user->status)) @if($user->status==1) <button class="btn btn-success"> Active</button> @endif @if($user->status==0) <button class="btn btn-danger"> InActive </button> @endif  @endif</td>
                                            <td> @if(isset($user->countries_id) && $user->countries_id )
                                                <?php $country = DB::table('countries')->where('countries_id',$user->countries_id)->get()->first();?>
                                            {{$country->countries_name ?? ''}} @else N/A @endif</td>
                                            <td><a href="{{route('admin.user.show',['id' => $user->id])}}" class="btn btn-success"><i class="icon-eye"></i></a>
                                            <a href="{{route('admin.user.edit',['id' => $user->id])}}" class="btn btn-warning"><i class="icon-pencil"></i></a>
                                            <a href="{{route('admin.user.delete',['id' => $user->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        @endif
                        @if($id == 4)
                        <input type="text" value=4 name="parameter_id" hidden>
                            <tbody>
                                @foreach ($users as $user)
                                    @if($user->isSubAdmin())
                                        <tr>
                                            <td>  @if(isset($user->first_name)){{$user->first_name ?? ''}} {{$user->last_name ?? ''}} @else N/A @endif</td>
                                            <td>  @if(isset($user->mobile)){{$user->mobile ?? ''}} @else N/A @endif</td>
                                            <td>  @if(isset($user->email)){{$user->email ?? ''}} @else N/A @endif</td>
                                            <td>@if(isset($user->status)) @if($user->status==1) <button class="btn btn-success"> Active</button> @endif @if($user->status==0) <button class="btn btn-danger"> InActive </button> @endif  @endif</td>
                                            <td>     @if(isset($user->countries_id) && $user->countries_id )
                                                <?php $country = DB::table('countries')->where('countries_id',$user->countries_id)->get()->first();?>
                                            {{$country->countries_name ?? ''}} @else N/A @endif</td>

                                            <td><a href="{{route('admin.user.show',['id' => $user->id])}}" class="btn btn-success"><i class="icon-eye"></i></a>
                                            <a href="{{route('admin.user.edit',['id' => $user->id])}}" class="btn btn-warning"><i class="icon-pencil"></i></a>
                                            <a href="{{route('admin.user.delete',['id' => $user->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
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
