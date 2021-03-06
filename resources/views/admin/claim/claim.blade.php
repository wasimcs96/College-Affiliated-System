@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Claim')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Claim <small>All University Claim Request</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
               
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>

                        <tr>
                            <th> <b> Name</b></th>
                            <th> <b>Email</b></th>
                            <th> <b> Mobile Number</b></th>
                            <th> <b>Designation</b></th>
                            <th> <b>Message</b></th>
                            {{-- <th><b>Type</b></th> --}}
                            
                            {{-- <th style="text-align: center;"><b>Action<b></th> --}}

                        </tr>
                    </thead>
                    <?php $claims=App\Models\Claim::orderBy('updated_at', 'DESC')->get(); ?>
                    @if($claims->count() > 0)
                   <tbody>
                    @foreach ($claims as $claim)
                        <tr>
                            {{-- <td><img style="height: 56px;width: 56px;" src="{{asset($blog->main_image ?? '')}}"></td> --}}
                            <td>{{$claim->name ?? ''}}</td>

                            <td>{{$claim->email ?? ''}}</td>

                            <td>{{$claim->number ?? ''}}</td>

                        <td>{{$claim->designation ?? ''}}</td>
                        <td class="col-lg-3">  
@if(isset($claim->message))
                            <div class="comment more">
                            <?php $aRoom= $claim->message ?>
       @if(strlen($aRoom) > 100)
       {{substr($aRoom,0,100)}}
       <span class="read-more-show hide_content"><span class="btn btn-warning btn-sm">More<i class="fa fa-angle-down"></i></span></span>
       <span class="read-more-content"> <?php $reamm = substr($aRoom,100,strlen($aRoom)) ?> {!! $reamm!!}
       <span class="read-more-hide hide_content"><span class="btn btn-warning btn-sm">Less <i class="fa fa-angle-up"></i></span></span> </span>
       @else
       {!!$aRoom !!}
       @endif
    @else
    N/A
    @endif
    </td>
                     

                    

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
<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }

    <style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #ed8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ed8323;
    }

    .hide_content{
      display: none;
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

<script type="text/javascript">
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
                $('.read-more-content').addClass('hide_content')
                $('.read-more-show, .read-more-hide').removeClass('hide_content')
    
                // Set up the toggle effect:
                $('.read-more-show').on('click', function(e) {
                  $(this).next('.read-more-content').removeClass('hide_content');
                  $(this).addClass('hide_content');
                  e.preventDefault();
                });
    
                // Changes contributed by @diego-rzg
                $('.read-more-hide').on('click', function(e) {
                  var p = $(this).parent('.read-more-content');
                  p.addClass('hide_content');
                  p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
                  e.preventDefault();
                });
    </script>
@stop
