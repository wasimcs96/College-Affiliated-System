@extends('layout.master')
@section('parentPageTitle', 'Admin')
@section('title', 'Subscription')


@section('content')
<div class="row clearfix">
    @foreach ($packages as $package)

    <div class="col-lg-4 cool-md-4 col-sm-12">
        <form action="{{route('subscription.payment')}}" method="POST">
            @csrf
        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle" src="{{asset('assets/images/plan-1.svg')}}" alt="" /></li>
                <li class="price">
                    <h3><span>$</span> {{$package->amount}}<small>/ mo</small></h3>
                    <span>Subscription</span>
                </li>
                 <li>{{$package->description}}</li>
                <input type="text" name="amount" value="{{$package->amount}}" hidden>
                <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="payment_type" value="0" hidden>
                <input type="text" name="title" value="{{$package->title}}" hidden>
                <li class="plan-btn"><button type="submit" class="btn btn-round btn-outline-secondary">Choose plan</button></li>
            </ul>
        </div>
    </form>

    </div>

    @endforeach
<button id="rzp-button1">Pay</button>

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
@stop



@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var options = {
    "key": "rzp_test_6PaQ95AP7ZPT1S", // Enter the Key ID generated from the Dashboard
    "amount": "{{Session::get('amount')}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name":"{{Session::get('name')}}",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "{{Session::get('orderId')}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){

        $.ajaxSetup({headers:
            {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });


             transactionId=response.razorpay_payment_id;
             amount="{{Session::get('amount')}}";
             userId="{{Session::get('userId')}}";
             payment_type="{{Session::get('type')}}"
             title="{{Session::get('title')}}"
            $.ajax({
            url:"{{ route('transaction.pay') }}",
            method:"GET",
            data:{transactionId:transactionId,amount:amount,userId:userId,payment_type:payment_type,title:title},
            success: function(result){
           console.log(result);
            }
            });




    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

@stop
