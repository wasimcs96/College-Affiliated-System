@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'See Dues Detail')

@section('content')
@if($id == 1)
<h6>Total Payment<small style="margin-left:3px;">Payment Details</small></h6>
<div class="row clearfix">
    <input type="text" name="amount" value="{{$dues->due_amount*100 ?? ''}}" hidden>
    <input type="text" name="payment_type" value="3" hidden>
    <input type="text" name="title" value="paydue" hidden>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                    <div class="ml-4">
                        <span>Total Payment</span>
                        <h4 class="mb-0 font-weight-medium">{{$dues->paid_amount ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Clients</span>
                        <h4 class="mb-0 font-weight-medium">{{$dues->total_client_count ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{route('consultant.dues.pay')}}" method="POST">
<h6>Total Dues<small style="margin-left:3px;">Dues Details</small></h6>
<div class="row clearfix">
    <input type="text" name="amount" value="{{$dues->due_amount*100 ?? ''}}" hidden>
    <input type="text" name="payment_type" value="3" hidden>
    <input type="text" name="title" value="paydue" hidden>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>                    <div class="ml-4">
                        <span>Total Dues</span>
                        <h4 class="mb-0 font-weight-medium">{{$dues->due_amount ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Clients</span>
                        <h4 class="mb-0 font-weight-medium">{{$dues->temp_client_count ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-lg-6 col-md-6">
    <div class="card">
        <div class="body"> --}}
            <div class="d-flex align-items-center">
                <button  type="submit" class="btn btn-success btn-flat btn-lg text-center">Pay Dues</button>
            </div>
       {{-- </div>
    </div>
</div> --}}

</form>
@endif

@if($id==2)
<h6>Total Payment<small style="margin-left:3px;">Payment Details</small></h6>
<div class="row clearfix">
    <input type="text" name="amount" value="{{$prDues->due_amount*100 ?? ''}}" hidden>
    <input type="text" name="payment_type" value="3" hidden>
    <input type="text" name="title" value="paydue" hidden>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                    <div class="ml-4">
                        <span>Total Payment</span>
                        <h4 class="mb-0 font-weight-medium">{{$prDues->paid_amount ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Clients</span>
                        <h4 class="mb-0 font-weight-medium">{{$prDues->total_client_count ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{route('consultant.dues.pay')}}" method="POST">
<h6>Total Dues<small style="margin-left:3px;">Dues Details</small></h6>
<div class="row clearfix">
    <input type="text" name="amount" value="{{$prDues->due_amount*100 ?? ''}}" hidden>
    <input type="text" name="payment_type" value="4" hidden>
    <input type="text" name="title" value="paydue" hidden>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>                    <div class="ml-4">
                        <span>Total Dues</span>
                        <h4 class="mb-0 font-weight-medium">{{$prDues->due_amount ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                    <div class="ml-4">
                        <span>Total Clients</span>
                        <h4 class="mb-0 font-weight-medium">{{$prDues->temp_client_count ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-lg-6 col-md-6">
    <div class="card">
        <div class="body"> --}}
            <div class="d-flex align-items-center">
                <button  type="submit" class="btn btn-success btn-flat btn-lg text-center">Pay Dues</button>
            </div>
       {{-- </div>
    </div>
</div> --}}

</form>
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
