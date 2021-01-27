@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Dashboard')

@section('content')


<div class="row clearfix">
                <?php $users = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'client');
                })->count();
                $university = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'university');
                })->count();
                $consultant = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'consultant');
                })->count();

                ?>
    <div class="col-lg-4 col-md-6">
        <div class="card text-white bg-green">
            <div class="card-header">Total Clients</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-success">{{$users}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card text-white bg-red">
            <div class="card-header">Total University</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-danger">{{$university}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card text-white bg-blue">
            <div class="card-header">Total Consultant</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-primary">{{$consultant}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card text-white bg-orange">
            <?php $booking = DB::table('bookings')->count(); ?>
            <div class="card-header">Total Bookings</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-warning">{{$booking}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>

        <div class="col-lg-4 col-md-6">
            <div class="card text-white bg-cyan">
                <?php $applications = DB::table('applications')->count(); ?>
                <div class="card-header">Total Application</div>
                <div class="card-body">
                    <div class="pb-4 m-0 text-center h1 text-info">{{$applications}}</div>
                    {{-- <div class="d-flex">
                        <small class="text-muted">Previous Month</small>
                        <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                    </div> --}}
                </div>
            </div>
        </div>
    <div class="col-lg-4 col-md-6">
        <div class="card text-white" style="background-color:teal; color:white;">
            <?php $fly = DB::table('university_consultant_clients')->count(); ?>
            <div class="card-header">Ready to Fly Clients</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-info">{{$fly}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card text-white " style="background-color:slateblue; color:white;">
            <?php $pr = DB::table('bookings')->where('booking_for',1)->count(); ?>
            <div class="card-header">PR Requests</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-info">{{$pr}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card text-white " style="background-color: palegreen; color:white;">
            <?php $revenue = App\Models\Order::all()->sum('amount');?>
            <div class="card-header">Total Revenue</div>
            <div class="card-body">
                <div class="pb-4 m-0 text-center h1 text-info">{{$revenue}}</div>
                {{-- <div class="d-flex">
                    <small class="text-muted">Previous Month</small>
                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                </div> --}}
            </div>
        </div>
    </div>
</div>




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
