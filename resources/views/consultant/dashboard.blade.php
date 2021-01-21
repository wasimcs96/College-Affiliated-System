@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Dashboard')

@section('content')



<div class="row clearfix">
    <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Income status</div>
                            <div class="py-4 m-0 text-center h2 text-info">$2,258</div>
                            <div class="d-flex">
                                <small class="text-muted">New income</small>
                                <div class="ml-auto">0%</div>
                            </div>
                        </div>
                        {{-- <div class="back p-3 px-4 bg-info text-center">
                            <p class="text-light">This Week</p>
                            <span id="minibar-chart2" class="mini-bar-chart"></span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4 bg-danger text-light">
                            <div>Student status</div>
                            <div class="py-4 m-0 text-center h2">428</div>
                            <div class="d-flex">
                                <small>New Student</small>
                                <div class="ml-auto"><i class="fa fa-caret-down"></i>10%</div>
                            </div>
                        </div>
                        <div class="back p-3 px-4 text-center">
                            <p>This Week</p>
                            <span id="minibar-chart4" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4 bg-warning text-light">
                            <div>University status</div>
                            <div class="py-4 m-0 text-center h2">232</div>
                            <div class="d-flex">
                                <small>New universities</small>
                                <div class="ml-auto"><i class="fa fa-caret-up"></i>3%</div>
                            </div>
                        </div>
                        <div class="back p-3 px-4 text-center">
                            <p>This Week</p>
                            <span id="minibar-chart3" class="mini-bar-chart"></span>
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

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row text-center">
                    <div class="col-lg-12 col-md-5">
                        <div class="text-center">
                            <input type="text" class="knob" value="77" data-width="68" data-height="68" data-thickness="0.1" data-bgColor="#383b40" data-fgColor="#17C2D7">
                        </div>
                        <label class="mb-0 mt-2">New Users</label>
                        <h4 class="h4 mb-0 font-weight-bold text-cyan">225</h4>
                    </div>
                    <div class="col-12 col-md-2 col-lg-12">
                        <hr class="mt-4 mb-4">
                    </div>
                    <div class="col-lg-12 col-md-5">
                        <div class="text-center">
                            <input type="text" class="knob" value="38" data-width="68" data-height="68" data-thickness="0.1" data-bgColor="#383b40" data-fgColor="#dc3545">
                        </div>
                        <label class="mb-0 mt-2">Return Visitors</label>
                        <h4 class="h4 mb-0 font-weight-bold text-info">124</h4>
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
