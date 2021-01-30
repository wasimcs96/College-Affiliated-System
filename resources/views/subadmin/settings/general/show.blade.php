@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Settings')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2> Manage Setting
                <small>Setting Detail</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('setting.general')}}">Settings</a></li>
                <li><a href="javascript:void(0)" class="active">Setting Detail</a></li>
            </ul>

            {{-- <div class="box-header"><h3 class="box-title">Office Address</h3>
                <a href="{{route('setting.general')}}" class="btn btn-default pull-right" title="Cancel"><i
                    class="fa fa-fw fa-chevron-circle-left"></i> Back</a>
            </div> --}}
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">


                    <tbody><tr>
                        <th scope="row">Title</th>
                        <td>{{$settings->title}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Manager</th>
                        <td>{{$settings->manager}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Constant/Slug</th>
                        <td>{{$settings->slug}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Config Value</th>
                        <td>{{$settings->config_value}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Field Type</th>
                        <td>{{$settings->field_type}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created</th>
                        <td>{{$settings->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Modified</th>
                        <td>{{$settings->updated_at}}</td>
                    </tr>
                    </tbody>

                </table>
                {{-- <div class="box-header">
                    <a href="{{route('setting.general')}}" class="btn btn-default pull-right" title="Cancel"><i
                        class="fa fa-fw fa-chevron-circle-left"></i> Back</a>
                </div> --}}

                </div>
                <br>
                <div id="dec">

                </div>
                <a href="{{route('setting.general')}}" class="btn btn-danger" title="Cancel"><i
                    class="fa fa-fw fa-chevron-circle-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>

</section>

<div class="modal fade" id="followUpModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3" style="color:white; text-align: center;">Add Follow Up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <form id="basic-form6" class="basic-form" method="post" novalidate action="{{route('consultant.booking.followup.store')}}">
                    @csrf
                    {{-- <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div> --}}
                  <input type="text" name="booking_id" value={{$booking->id ?? ''}} hidden>
                    <div class="form-group" id="noteError">
                        <label style="color:white">Note</label>
                        <textarea class="form-control" id="note" name="note" rows="5" cols="30" required></textarea>
                    </div>
                    <div class="form-group" id="dateError">
                        <label style="color:white">Date</label>
                        <input  class="form-control" name="date" id="date" required>
                    </div>
                    <br>

        </div>
        <div class="modal-footer">
          {{-- <button type="submit" class="btn btn-primary">Add Follow Up</button> --}}
          <a href="javascript:void(0)"  class="btn btn-primary" id="add_follow_up"> Add </a>
        </form>
                    </div>
</div>
</div>
</div>


@stop

@section('page-styles')
@stop

@section('page-script')

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

@stop
