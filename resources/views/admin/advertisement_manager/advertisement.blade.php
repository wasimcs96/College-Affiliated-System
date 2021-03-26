@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Advertisement')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Advertisement</h2>
            <ul class="header-dropdown dropdown">
{{-- <li><a class="btn btn-primary btn-sm" style="color: white;" href="{{route('consultant.advertisement.add')}}">Purchase AD</a></li> --}}
<li><a href="https://campusinterest.com/university/all" target="_blank" style="margin-right: 3px;" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Inner Advertisement Page" style="color: white;">Inner Ad Page</a></li>
<li><a href="https://campusinterest.com" target="_blank" style="margin-right: 3px;" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Outer Advertisement Page" style="color: white;">Outer Ad Page</a></li>
                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable" id="example">
                    <thead>
                        <tr>
                            <th  style="text-align: center;"><b>Banner Image</b></th>
                            <th><b>User Name</b></th>
                            <th><b>User type </b></th>
                            <th><b>Click Count </b></th>
                            <th><b>Start Date</b></th>
                            <th><b>End Date</b></th>
                            <th><b>Purchased Date</b></th>
                            <th><b>Link</b></th>
                            <th><b>Status</b></th>
                            <th><b>Updated At</b></th>
                            <th style="text-align: center;"><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                        <?php  $rts=App\Models\Advertisement::all();
                    ?>
                    @if($rts->count() > 0)
                    <tbody>
{{-- {{dd($rts)}} --}}
                        @foreach($rts as $key => $rt)
                    {{-- @if($rt->payment_type == 2) --}}

                        {{-- {{dd($rt->advertisement)}} --}}
                        <tr>
                                     <td style="text-align: center;">
                                @if(isset($rt->banner_image) && file_exists($rt->banner_image))<a href="{{asset($rt->banner_image ?? '')}}" target="_blank"> <img src="{{asset($rt->banner_image ?? '')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"></a>@else <img src="{{asset('assets/default/default-banner.jpg')}}" class="user-photo" id="zm" alt="Banner image" width="40px" height="40px"> @endif</td>

                                <td>{{$rt->user->first_name ?? ''}}</td>

                            <td>@if(isset($rt->user))
                                @if($rt->user->isConsultant() ?? '') Consultant @endif
                            @if($rt->user->isUniversity() ?? '') Univeristy @endif @endif</td>
                            <td>@if(isset($rt->click_count)){{$rt->click_count ?? ''}}@else N/A @endif</td>
                            <td>
                                @if(isset($rt->start_date )){{ Carbon\Carbon::parse($rt->start_date )->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif
                            </td>
                            <td>
                                @if(isset($rt->expire_date )){{ Carbon\Carbon::parse($rt->expire_date )->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif
                            </td>
                            <td>@if(isset($rt->created_at)){{ Carbon\Carbon::parse($rt->created_at)->format(config('get.ADMIN_DATE_FORMAT')) }}@else N/A @endif</td>
                            <td>   <a href="{{$rt->link}}" target="_blank" style="margin-right: 3px;" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Advertisement Link" style="margin-left: 8px;"><i class="fa fa-link" aria-hidden="true"></i></a>
                            @if(isset($rt->type) && $rt->type == 1)
                            <a href="{{route('frontend.index')}}" target="_blank" style="margin-right: 3px;" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Check Advertisement Page " style="margin-left: 8px;"><i class="fa fa-link" aria-hidden="true"></i></a>
                            @else
                            <a href="{{route('university_all')}}" target="_blank" style="margin-right: 3px;" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Check Advertisement Page " style="margin-left: 8px;"><i class="fa fa-link" aria-hidden="true"></i></a>
                            @endif</td>
                            <td>
                                    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                                {{-- @if($rt->status==0)<div class="btn btn-warning">Pending</div>@endif --}}
                                @if($rt->expire_date>$mytime)<div class="btn btn-success">Activated</div>@endif
                                @if($rt->expire_date<$mytime && $rt->expire_date == !null)<div class="btn btn-danger">Expired</div>@endif
                                @if($rt->expire_date == null)<div class="btn btn-warning">Pending</div>@endif
                                {{-- @if($rt->status==2)<div class="btn btn-primary">Inactive</div>@endif --}}
                            </td>
                            <td> {{ $rt->updated_at ?? '' }} </td>
                            <td style="justify-content: center;"> @if($rt->expire_date == null)
                                <div class="row" >
                                <form action="{{route('admin.advertisement_manager.update')}}" method="POST" >
                                @csrf
                                <input type="hidden" value="{{$rt->id}}" name="rtid"> <input type="hidden" value="{{$rt->time_period}}" name="time_period">
                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Accept" class="btn btn-success"><i class="icon-check"></i></button>
                            </form>

                                <a href="javascript:void(0);" @if(isset($rt->user)) @if($rt->user->isConsultant() ?? '') custom2="{{ $rt->user->id }}" @endif @if($rt->user->isUniversity() ?? '') custom2="{{ $rt->user->id }}" @endif @endif custom1="{{ $rt->id }}" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal" data-placement="top" title="Reject" style="margin-left: 8px;" id="rejectTrigger"><i class="icon-trash"></i></a>
                        </div>

                        @endif</td>
                        </tr>
                        {{-- @endif --}}
@endforeach

@endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3" style="color:white; text-align: center;">Reject Advertisement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <form id="basic-form6" class="basic-form" method="post" novalidate action="{{route('admin.application.followup.store')}}">
                    @csrf
                    {{-- <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div> --}}
                  {{-- <input type="text" name="application_id" value={{$application->id ?? ''}} hidden> --}}
                    <div class="form-group" id="reasonError">
                        <label style="color:white">State Reason</label>
                        <textarea class="form-control" id="reason" name="reason" rows="5" cols="30" required></textarea>
                    </div>
                    <br>

        </div>
        <div class="modal-footer">
          {{-- <button type="submit" class="btn btn-primary">Add Follow Up</button> --}}
          <a href="javascript:void(0)"  class="btn btn-primary" id="rejectButton"> Done </a>
          <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
            Cancel
          </button>
        </form>
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
<!--<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>-->
<script>
    var advertisement_id='';
    var user_id='';
    var reason ='';
     $(document).on('click', '#rejectTrigger', function ()
 {
    advertisement_id=$(this).attr('custom1');
    user_id=$(this).attr('custom2');
 console.log(advertisement_id);
 });
 $(document).on('click', '#rejectButton', function ()
 {

       var reason=$('#reason').val();
    if( reason == '')
    {
        $('#reasonError').html('<label style="color:white">State Reason</label><textarea class="form-control" id="reason" name="reason" rows="5" cols="30" required></textarea><strong><span style="color:red">*Please State Reason</span></strong>')
    }
    else
    {
       if(advertisement_id > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.advertisement.reject')}}",
                     data: {advertisement_id:advertisement_id,reason:reason,user_id:user_id},
                     success: function (result) {
                         console.log('success');
                        //  alert('Follow Up created Successfully');
                         $('#alert_add').append('<div class="container" style="width: 1026px;"><div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Rejection Message Sent Successfully.</strong></div></div>')
                     }
                 });
       }

             $('#rejectModal').modal('hide');
             document.getElementById("basic-form6").reset();
    }
     });


 </script>
 <script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 9, "desc" ]]
        } );
    });
</script>
@stop
