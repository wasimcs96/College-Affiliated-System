@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Dashboard')

@section('content')

@php
    $user = DB::table('applications')->where('consultant_id',auth()->user()->id)->where('is_commission_add',1)->count();
    $university = DB::table('university_consultants')->where('consultant_id',auth()->user()->id)->count();
    $booking = DB::table('bookings')->where('consultant_id',auth()->user()->id)->where('booking_for',0)->count();
    $pr = DB::table('bookings')->where('consultant_id',auth()->user()->id)->where('booking_for',1)->count();
    $runningApplication = DB::table('applications')->where('consultant_id',auth()->user()->id)->where('status',0)->count();
    $completedApplication = DB::table('applications')->where('consultant_id',auth()->user()->id)->where('status',1)->count();
    $closedApplication = DB::table('applications')->where('consultant_id',auth()->user()->id)->where('status',2)->count();
    $visaDues = DB::table('consultant_dues')->where('consultant_id',auth()->user()->id)->where('due_amount_type',0)->get('due_amount')->first();
    $prDues = DB::table('consultant_dues')->where('consultant_id',auth()->user()->id)->where('due_amount_type',1)->get('due_amount')->first();
    $visaPaid = DB::table('consultant_dues')->where('consultant_id',auth()->user()->id)->where('due_amount_type',0)->get('paid_amount')->first();
    $prPaid = DB::table('consultant_dues')->where('consultant_id',auth()->user()->id)->where('due_amount_type',1)->get('paid_amount')->first();
@endphp


<div class="row clearfix">

<div class="col-lg-4 col-md-6">
<div class="card">
    <div class="body">
        <div class="d-flex align-items-center">
            <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i></div>
            <div class="ml-4">
                <span>Total Students</span>
                <h4 class="mb-0 font-weight-medium">{{ $user }}</h4>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="body">
    <div class="d-flex align-items-center">
        <div class="icon-in-bg bg-danger text-white rounded-circle"><i class="fa fa-university" aria-hidden="true"></i>
        </div>
        <div class="ml-4">
            <span>Associated Universities</span>
            <h4 class="mb-0 font-weight-medium">{{$university}}</h4>
        </div>
    </div>
</div>
</div>
</div>

{{-- <div class="col-lg-4 col-md-6">
<div class="card">
    <div class="body">
        <div class="d-flex align-items-center">
            <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-briefcase" aria-hidden="true"></i>

            </div>
            <div class="ml-4">
                <span>Total Consultant</span>
                <h4 class="mb-0 font-weight-medium">{{$consultant}}</h4>
            </div>
        </div>
    </div>
</div>
</div> --}}

<div class="col-lg-4 col-md-6">
<div class="card">
    <div class="body">
        <div class="d-flex align-items-center">
            <div class="icon-in-bg bg-primary text-white rounded-circle"><i class="fa fa-sticky-note" aria-hidden="true"></i>
            </div>
            <div class="ml-4">
                <span>Total Bookings</span>
                <h4 class="mb-0 font-weight-medium">{{$booking}}</h4>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="card">
    <div class="body">

    <div class="d-flex align-items-center">
        <div class="icon-in-bg bg-green text-white rounded-circle"><i class="fa fa-plane" aria-hidden="true"></i>
        </div>
        <div class="ml-4">
            <span>PR Requests</span>
            <h4 class="mb-0 font-weight-medium">{{$pr}}</h4>
        </div>
    </div>
    </div>
    </div>
    </div>

<div class="col-lg-4 col-md-6">
<div class="card">

<div class="body">
    <div class="d-flex align-items-center">
        <div class="icon-in-bg bg-warning text-white rounded-circle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </div>
        <div class="ml-4">
            <span>Running Application</span>
            <h4 class="mb-0 font-weight-medium">{{ $closedApplication }}</h4>
        </div>
    </div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="card">

    <div class="body">
        <div class="d-flex align-items-center">
            <div class="icon-in-bg bg-success text-white rounded-circle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
            <div class="ml-4">
                <span>Completed Application</span>
                <h4 class="mb-0 font-weight-medium">{{ $completedApplication }}</h4>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card">

        <div class="body">
            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-danger text-white rounded-circle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div>
                <div class="ml-4">
                    <span>Closed Application</span>
                    <h4 class="mb-0 font-weight-medium">{{ $closedApplication }}</h4>
                </div>
            </div>
        </div>
        </div>
        </div>


<div class="col-lg-4 col-md-6">
<div class="card">
<div class="body">

<div class="d-flex align-items-center">
    <div class="icon-in-bg bg-cyan text-white rounded-circle"><i class="fa fa-credit-card" aria-hidden="true"></i>
    </div>
    <div class="ml-4">
        <span>Total Dues</span>
        <h4 class="mb-0 font-weight-medium"><i class="fa fa-inr" aria-hidden="true"></i>{!!"&nbsp"!!} {{ $visaDues->due_amount + $prDues->due_amount }}</h4>
    </div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="body">


<div class="d-flex align-items-center">
    <div class="icon-in-bg bg-cyan text-white rounded-circle"><i class="fa fa-money" aria-hidden="true"></i>
    </div>
    <div class="ml-4">
        <span>Total Paid Amount</span>
        <h4 class="mb-0 font-weight-medium"><i class="fa fa-inr" aria-hidden="true"></i>{!!"&nbsp"!!}{{ $visaPaid->paid_amount + $prPaid->paid_amount }}</h4>
    </div>
</div>
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
