@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Go Premium')

@section('content')

<div class="row clearfix">
    @foreach ($packages as $package)

    <div class="col-lg-4 cool-md-4 col-sm-12">

        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle" src="{{asset('assets/images/plan-1.svg')}}" alt="" /></li>
                <li class="price">
                    <h3><span>{{ Config::get('define.currency.currency') }}</span>{{$package->amount}}<small>{!! "&nbsp;" !!}/{!! "&nbsp;" !!}{{$package->package_time}}{!! "&nbsp;" !!}-{!! "&nbsp;" !!}months</small></h3>
                    <span>Premium</span>
                    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');
        $rt=auth()->user()->Premium_expire_date;
?>
                </li>
                <li>{{$package->title}}</li>
                <hr>
                <li>{{$package->description}}</li>
                <input type="text" name="amount" value="{{$package->amount}}" hidden>
                <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="payment_type" value="1" hidden>
                <input type="text" name="title" value="{{$package->title}}" hidden>
                @if($rt>$mytime && $rt != null)

                <li class="plan-btn"><button class="btn btn-round btn-outline-secondary"  data-toggle="modal" data-target="#mdlerror">Choose plan</button></li>
                @else
                <li class="plan-btn"><button customDescription="{{$package->description}}" id="choosePlanScroll" customPackage="{{$package->package_time}}" customAmount="{{$package->amount}}" customUser="{{auth()->user()->id}}" customPayment="1" customTitle="{{$package->title}}" class="btn btn-round btn-outline-secondary chooseplan">Choose plan</button></li>

                @endif
            </ul>
        </div>

    </div>
    @endforeach
    {{-- <img style="width: 100px; height: 50px; border-radius: 11px;" id="rzp-button1" src="{{asset('assets/images/razor_pay.jpeg')}} "> --}}
</div>

<div class="container" id="choosedcontent">

</div>
<div class="container">

<br>





</div>


<div class="modal fade" id="mdlerror" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body" style="
        text-align:center;
        padding: 0px;
        ">
            <div style="
            padding: 0px;
            background-color: #fdb719;
        ">
            <img  style=" width: 122px;margin-top: 18px;margin-bottom: 18px"; src="{{asset('frontEnd/assets/images/error.png')}}">
            </div>

            <div style="
            background-color: white;
            color: #585550;
            font-family: sans-serif;
        ">
                <h1>You can't buy Plan ! </h1>
                <h4 style="

                margin: 0px;
                font-size: large;
                "
            >Previous Plan is still active</h4>
            </div>
        </div>
        <div class="modal-footer"  style="
        padding: 0px;
        border: 0px;
        justify-content: center;
        background-color: white;
    ">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type= class="btn btn-primary">Submit</button> --}}
          <a href="{{route('university.premium')}}"  style="border-radius: 62px;
          background-color: #fdb719;
          border-color: #fdb719;
          color: black;
          font-weight: 500;
    font-family: sans-serif;" class="btn btn-primary" id="add_document3">Close</a>
        </div>
        </div>
       </div>
</div>
{{-- ####################################################ERROR###################### --}}
<div class="modal fade" id="mdlup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body" style="
        text-align:center;
        padding: 0px;
        ">
            <div style="
            padding: 0px;
            background-color: #5890ff;
        ">
            <img  style=" width: 122px;margin-top: 18px;margin-bottom: 18px"; src="{{asset('frontEnd/assets/images/checkmark.png')}}">
            </div>

            <div style="
            text-align:center;
            background-color: white;
            color: black;
            ">
                <h1 style="
                margin: 0px;
                font-family: sans-serif;
                padding: 18px;
            ">Thank You</h1>
            </div>
        </div>
        <div class="modal-footer" style="
        padding: 6px;
        background-color: white;
        border: 0px;
        justify-content: center;
    ">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type= class="btn btn-primary">Submit</button> --}}
          <a href="{{route('university.premium')}}" class="btn btn-primary" style="
          border-radius: 35px;font-weight: 500;
    font-family: sans-serif;" id="add_document3">Close</a>
        </div>
        </div>
       </div>
</div>
@stop

@section('page-styles')

@stop

@section('page-script')
<script src="backend.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
<script src="https://unpkg.com/zdog@1/dist/zdog.dist.min.js"></script>


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
    $(document).on('click', '.chooseplan', function ()
{

    user_id=$(this).attr('customUser');
    title=$(this).attr('customTitle');
    description=$(this).attr('customDescription');
    amount=$(this).attr('customAmount');
    payment_type=$(this).attr('customPayment');
    package_time=$(this).attr('customPackage');


   var html=`
   <div class="row clearfix">

<div class="col-lg-12">
    <div class="card">
        <div class="body">
            <div class="row clearfix">
                <br>

                <div class="col-md-3">
                    <br>

                    <p><b>Plan Name</b></p>
                    <ul style="list-style-type: none;margin-left: -40px;">
    <li class="plan-img">${title}</li>


</ul>
                </div>
                <div class="col-md-3">
                    <br>

                    <p class="align-center" ><b  style="float: left;">Amount To Pay</b></p>
                    <br>
                    <div class="align-center" ><h5 style="float:left; margin-left: -6px;"><span>{{ Config::get('define.currency.currency') }}</span>${amount}<small>{!! "&nbsp;" !!}/{!! "&nbsp;" !!}${package_time}{!! "&nbsp;" !!}-{!! "&nbsp;" !!}months</small></h5></div>
                </div>
                <br>

                <div class="col-md-3">
                    <br>

                    <p class="align-right"><b style="float: left;">Description</b></p>
                    <br>
                    <div class="align-left" style="float: left;     margin-left: -4px;">${description} </div>
                </div>
                <br>

                <div class="col-md-3">
                    <br>

                    <p class="align-justify"><b >Payment Method</b></p>
                    <div class="align-justify"> <img style="margin-top: -57px; margin-left: 1px;"  class="cntr" id="rzp-button1" src="{{asset('assets/images/razor_pay.png')}} "></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>`;
$('#choosedcontent').html(html);
    $.ajaxSetup({headers:
        {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
        url:"{{ route('subscription.payment') }}",
        method:"post",
        data:{user_id:user_id,title:title,description:description,amount:amount,payment_type:payment_type,package_time:package_time},
        success: function(result){
            {{-- console.log() --}}
            var options = {
                "key": "rzp_test_6PaQ95AP7ZPT1S", // Enter the Key ID generated from the Dashboard
                "amount": result.amount, // Amount is in currency subunits. Default currency is USD. Hence, 50000 refers to 50000 paise
                "currency": "USD",
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
                        data:{transactionId:transactionId,amount:amount,userId:user_id,payment_type:payment_type,title:title,package_time:package_time},
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
<script>
    $(document).on('click', '#choosePlanScroll', function ()
    {
        $("html, body").animate({
                    scrollTop: $(
                      'html, body').get(0).scrollHeight
                }, $(document).height());
    });
  </script>
@stop
