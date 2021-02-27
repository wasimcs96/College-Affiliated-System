@extends('layout.master')
@section('parentPageTitle', 'Client')
@section('title', 'Dashboard')

@section('content')



<div class="row clearfix">
    {{-- <div class="col-lg-9 col-md-12 col-sm-12"> --}}
        @php
             $booking = DB::table('bookings')->where('client_id',auth()->user()->id)->where('booking_for',0)->count();
             $application = DB::table('applications')->where('client_id',auth()->user()->id)->where('status',0)->count();
        @endphp
        <div class="col-lg-6 col-md-6">
            <a href="{{route('client.bookings')}}">
            <div class="card">
                <div class="body">
                    <div class="d-flex align-items-center">
                        <div class="icon-in-bg bg-primary text-white rounded-circle"><i class="fa fa-sticky-note" aria-hidden="true"></i></div>
                        <div class="ml-4">
                            <span>Total Bookings</span>
                            <h4 class="mb-0 font-weight-medium">{{$booking}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
     </div>
     <div class="col-lg-6 col-md-6">
        <a href="{{route('client.applications')}}">

        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-success text-white rounded-circle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <div class="ml-4">
                        <span>Total Application</span>
                        <h4 class="mb-0 font-weight-medium">{{$application}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </a>
    </div>

</div>
<?php   $applications = DB::table('applications')->where('client_id',auth()->user()->id)->orderBy('created_at','DESC')->get(); ?>
@if($applications->count() > 0)
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Applications Status<small></small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
              
            </ul>
        </div>
     
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th> <b>Consultant Name</b></th>
                            <th><b> Applied On</b></th>
                            <th><b> Status</b></th>
                            <th style="text-align: center;"><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    

                    <tbody>
                        @foreach($applications as $application)
                      @if ($application->status != 2)
                          
                      
                            <tr>
                                <td>{{App\Models\User::find($application->consultant_id)->first_name ?? ''}} {{App\Models\User::find($application->consultant_id)->last_name ?? ''}}</td>
                                <td>{{ Carbon\Carbon::parse($application->created_at)->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                                <td>
                                    @if($application->status==0 ?? '')<div class="btn btn-warning">In Progress</div>@endif
                                    @if($application->status==1 ?? '')<div class="btn btn-success">Completed</div>@endif
                                    @if($application->status==2 ?? '')<div class="btn btn-danger">Closed</div>@endif
                                </td>

                                <td style="text-align: center;"><a href="{{route('client.application.show',['id'=> $application->id])}}" class="btn btn-success">Go to application</a></td>
                            </tr>
                            @endif
                        @endforeach


                       

                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</div>
@endif
@stop

@section('page-styles')
@stop

@section('page-script')

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

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
