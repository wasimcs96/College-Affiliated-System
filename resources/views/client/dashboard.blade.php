@extends('layout.master')
@section('parentPageTitle', 'Client')
@section('title', 'Dashboard')

@section('content')



<div class="row clearfix">
    {{-- <div class="col-lg-9 col-md-12 col-sm-12"> --}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Booking status</div>
                            <div class="py-4 m-0 text-center h2 text-info">Pending</div>
                            <div class="d-flex">
                                <small class="text-muted">Applied</small>
                                <div class="ml-auto">2020/12/12</div>
                            </div>
                        </div>
                        <div class="back p-3 px-4 bg-info text-center">
                            <p class="text-light">Booking Status</p>
                            <span id="minibar-chart2" class="mini-bar-chart">Applied</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Application status</div>
                            <div class="py-4 m-0 text-center h2 text-info">Pending</div>
                            <div class="d-flex">
                                <small class="text-muted">Applied</small>
                                <div class="ml-auto">2020/12/12</div>
                            </div>
                        </div>
                        <div class="back p-3 px-4 bg-info text-center">
                            <p class="text-light">Application Status</p>
                            <span id="minibar-chart2" class="mini-bar-chart">Applied</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Application status</div>
                            <div class="py-4 m-0 text-center h2 text-info">Pending</div>
                            <div class="d-flex">
                                <small class="text-muted">Applied</small>
                                <div class="ml-auto">2020/12/12</div>
                            </div>
                        </div>
                        <div class="back p-3 px-4 bg-info text-center">
                            <p class="text-light">Application Status</p>
                            <span id="minibar-chart2" class="mini-bar-chart">Applied</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Total revenue</div>
                            <div class="py-4 m-0 text-center h2 text-success">$9,653</div>
                            <div class="d-flex">
                                <small class="text-muted">Income</small>
                                <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4%</div>
                            </div>
                        </div>
                        <div class="back p-3 px-4 bg-success text-center">
                            <p class="text-light">This Week</p>
                            <span id="minibar-chart1" class="mini-bar-chart"></span>
                        </div>
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
