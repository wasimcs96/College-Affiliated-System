@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Advertisement')


@section('content')
<div class="col-lg-12 col-md-7">
    <div class="card">
       <div class="header">
           <h2>Advertisement</h2>
           <ul class="header-dropdown dropdown">
               <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
           </ul>
       </div>


       </div>
</div>
<div class="row clearfix">
    <?php $packages=App\Models\Package::where('package_type',2)->where('status',1)->get();
    // dd($packages);
    ?>

    @foreach ($packages as $package)

    <div class="col-lg-4 cool-md-4 col-sm-12">
        
        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle" src="{{asset('assets/images/plan-1.svg')}}" alt="" /></li>
                <li class="price">
                    <h3><span>$</span> {{$package->amount}}<small>/ mo</small></h3>
                    <span>Advertisement</span>
                </li>
                 <li>{{$package->description}}</li>
               
                <input type="text" name="amount" value="{{$package->amount}}" hidden>
                <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="payment_type" value="2" hidden>
                <input type="text" name="title" value="{{$package->title}}" hidden>
                <input type="hidden" name="expire_date" value="{{ $package->package_time }}"  />
                <li class="plan-btn"><button customDescription="{{$package->description}}" customAmount="{{$package->amount}}" customUser="{{auth()->user()->id}}" customPayment="1" customTitle="{{$package->title}}" class="btn btn-round btn-outline-secondary chooseplan">Choose plan</button></li>
            </ul>
        </div>
  

    </div>

    @endforeach
    {{-- <button id="rzp-button1">Pay</button> --}}
</div>
{{-- <img style="width: 200px; height: 100px; border-radius: 7px; margin-top: -16px;" id="rzp-button1" src="{{asset('assets/images/razor_pay.png')}} "> --}}
<div class="container" id="choosedcontent">

</div>
<div class="container">
   
    <br>
    
    </div>

            @stop

            @section('page-styles')
            <style>
                .cntr {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;

                  }
                </style>
            <link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">


            @stop
@section('page-script')

<script src="{{ asset('assets/bundles/lightgallery.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/medias/image-gallery.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>


<script>
    $('.dropify-frrr').dropify({
        messages: {
            default: 'Upload Image',
            replace: 'Upload  Image',
            remove: 'Cancel',
            error: 'Sorry,the file is too large'
        }
    });
</script>

<script>
    $(":radio").click(function(){
   var radioName = $(this).attr("expire_date"); //Get radio name
   $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name
});
    </script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).on('click', '.chooseplan', function ()
        {
        
            user_id=$(this).attr('customUser');
            title=$(this).attr('customTitle');
            description=$(this).attr('customDescription');
            amount=$(this).attr('customAmount');
            payment_type=$(this).attr('customPayment');
            
        
        
           var html=`<div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <p><b>Plan Type</b></p>
                                <ul style="list-style-type: none;">
                <li class="plan-img"> Subscription Plan</li>
                <li class="price">
        
                    <span>Subscription</span>
                </li>
                <li></li>
            </ul>
                            </div>
                            <div class="col-md-3">
                                <input name="image" type="file" class="dropify-frrr" >
                            </div>
                            <div class="col-md-3">
                                <p class="align-center" ><b  style="float: left;">Amount To Pay</b></p>
                                <div class="align-center" ><h3 style="float:left; margin-left: -113px;"><span>$</span>${amount}<small>/ mo</small></h3></div>
                            </div>
                            <div class="col-md-3">
                                <p class="align-right"><b style="float: left;">Description</b></p>
                                <div class="align-left" style="float: left;margin-left: -85px;">${description} </div>
                            </div>
                            <div class="col-md-3">
                                <p class="align-justify"><b >Payment Method</b></p>
                                <div class="align-justify"> <img style="margin-top: -57px; margin-left: 1px;"  class="cntr" id="rzp-button1" src="{{asset('assets/images/razor_pay.png')}} "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        image=$('input[name="image"]').val()
        $('#choosedcontent').html(html);
            $.ajaxSetup({headers:
                {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
        
                $.ajax({
                url:"{{route('consultant.advertisement.store')}}",
                method:"post",
                data:{user_id:user_id,title:title,description:description,amount:amount,payment_type:payment_type,image:image},
                success: function(result){
                    {{-- console.log() --}}
                    var options = {
                        "key": "rzp_test_6PaQ95AP7ZPT1S", // Enter the Key ID generated from the Dashboard
                        "amount": result.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name":"{{Session::get('name')}}",
                        "description": "Test Transaction",
                        "image": "https://example.com/your_logo",
                        "order_id": result.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (response){
        
                            $.ajaxSetup({headers:
                                {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                });
        
        
                                 transactionId=response.razorpay_payment_id;
        
                                $.ajax({
                                url:"{{ route('transaction.pay') }}",
                                method:"GET",
                                data:{transactionId:transactionId,amount:amount,userId:user_id,payment_type:payment_type,title:title},
                                success: function(result){
                                    $('#mdlup').modal('show');
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
                }
                });
        
        
        
            })
    </script>

@stop
