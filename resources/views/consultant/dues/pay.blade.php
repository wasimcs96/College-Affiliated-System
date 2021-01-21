@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Payment ')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Your Totals</h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>
                    <tr>
                        <th scope="row">Total Due Amount</th>
                        <td> <button class="btn btn-flat btn-danger"> </button>  </td>
                    </tr>
                    <tr>
                        <th scope="row">Total Clients</th>
                        <td> <button class="btn btn-flat btn-warning">  </button> </td>
                    </tr>

                    </tbody>

                </table>
                <div class="align-justify"> <img style="margin-top: -57px; margin-left: 1px;"  class="cntr" id="rzp-button1" src="{{asset('assets/images/razor_pay.png')}} "></div>
            </div>
        </div>
    </div>
</div>

</section>


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
    var payment_type="{{Session::get('type')}}"
    var amount="{{Session::get('amount')}}"
    var user_id="{{Session::get('userId')}}"
    var title="{{Session::get('title')}}"
    var options = {
        "key": "rzp_test_6PaQ95AP7ZPT1S", // Enter the Key ID generated from the Dashboard
        "amount":"{{Session::get('amount')}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name":"{{Session::get('name')}}",
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
        "order_id": "{{Session::get('order_id')}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function (response){

            $.ajaxSetup({headers:
                {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });


                 transactionId=response.razorpay_payment_id;
console.log(transactionId);
                $.ajax({
                url:"{{ route('transaction.pay') }}",
                method:"GET",
                data:{transactionId:transactionId,amount:amount,userId:user_id,payment_type:payment_type,title:title},
                success: function(result){
                    console.log('success')
                    
                    //$('#mdlup').modal('show')
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
