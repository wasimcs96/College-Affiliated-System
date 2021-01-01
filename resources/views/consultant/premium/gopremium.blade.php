@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Go Premium')

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
                    <h3><span>$</span>{{$package->amount}}<small>/ mo</small></h3>
                    <span>Premium</span>
                </li>
                <li>{{$package->description}}</li>
                <input type="text" name="amount" value="{{$package->amount}}" hidden>
                <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="payment_type" value="1" hidden>
                <input type="text" name="title" value="{{$package->title}}" hidden>
                <li class="plan-btn"><button class="btn btn-round btn-outline-secondary">Choose plan</button></li>
            </ul>
        </div>
    </form>
    </div>
    @endforeach
    <button id="rzp-button1">Pay</button>
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
