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
     </div>
     <div class="col-lg-6 col-md-6">
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
