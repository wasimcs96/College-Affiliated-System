@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Advertisement')


@section('content')
<div id="al">

</div>
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
<form action="{{route('university.advertisement.store')}}" id="frm-{{$package->id}}" enctype="multipart/form-data" method="POST">
@csrf

        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle" src="{{asset('assets/images/plan-1.svg')}}" alt="" /></li>
                <li class="price">
                    <h3><span><i class="fa fa-inr"></i></span>{{$package->amount}}<small>{!! "&nbsp;" !!}/{!! "&nbsp;" !!}{{$package->package_time}}{!! "&nbsp;" !!}-{!! "&nbsp;" !!}months</small></h3>                    <span>Advertisement</span>
                </li>
                <li>{{$package->title ?? ''}}</li>
                <hr>

                 <li>{{$package->description ?? ''}}</li>
                <input name="image" id="photo-{{$package->id ?? ''}}" type="file" class="dropify-frrr" >
                <div class="form-group">
                    <label for="website">Link</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-globe"></i></span>
                        </div>
                        <input name="link" type="url" id="url-{{$package->id ?? ''}}" class="form-control"placeholder="http://" >                    </div>
                </div>
                <input type="text" name="amount" value="{{$package->amount ?? ''}}" hidden>
                <input type="text" name="user_id" value="{{auth()->user()->id ?? ''}}" hidden>
                <input type="text" name="payment_type" value="2" hidden>
                <input type="text" name="title" value="{{$package->title ?? ''}}" hidden>
                <input type="hidden" name="expire_date" value="{{ $package->package_time ?? ''}}"/>

                <li class="plan-btn"><a href="javascript:void(0);" customId="{{$package->id ?? ''}}"  customDescription="{{$package->description ?? ''}}" customAmount="{{$package->amount ?? ''}}" customUser="{{auth()->user()->id ?? ''}}" customPackage="{{$package->package_time ?? ''}}" customPayment="2" customTitle="{{$package->title ?? ''}}" class="btn btn-round btn-outline-secondary chooseplan">Choose plan</a></li>

            </ul>
        </div>
    </form>

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
              <a href="{{route('university.advertisement')}}" class="btn btn-primary" style="
              border-radius: 35px;font-weight: 500;
                font-family: sans-serif;" id="add_document3">Close</a>
            </div>
            </div>
           </div>
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
        function isEmpty(val){
            return (val === undefined || val == null || val.length <= 0) ? true : false;
        }
        $(document).on('click', '.chooseplan', function ()
    {
    var package_id='';
        user_id=$(this).attr('customUser');
        title=$(this).attr('customTitle');
        description=$(this).attr('customDescription');
        amount=$(this).attr('customAmount');
        payment_type=$(this).attr('customPayment');
        package_time=$(this).attr('customPackage');
        package_id=$(this).attr('customId');
        url=$(`#url-${package_id}`).val();
        var orderId='';
        photo=$(`#photo-${package_id}`).val()


    if (isEmpty(photo) || isEmpty(url)){
        if(isEmpty(photo))
        {
            $(`#al`).html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Image not found!</strong>Please select the image
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>`)
        }
        else
        {
            $(`#al`).html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>URL not found!</strong>Please fill the url
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>`)
        }
          window.scrollTo(0, 0);
    }
    else{
        $("html, body").animate({
                    scrollTop: $(
                      'html, body').get(0).scrollHeight
                }, $(document).height());
        var html=`<div class="row clearfix">
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
                                <div class="align-center" ><h5 style="float:left; margin-left: -6px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span>${amount}<small>{!! "&nbsp;" !!}/{!! "&nbsp;" !!}${package_time}{!! "&nbsp;" !!}-{!! "&nbsp;" !!}months</small></h5></div>
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
                    orderId=result.id
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
                                data:{transactionId:transactionId,amount:amount,userId:user_id,payment_type:payment_type,title:title,package_time:package_time},
                                success: function(result){
                                    //console.log(result)
                                    $(`#frm-${package_id}`).append(`<input type="text" name="orderId" value="${result}" hidden>`);
                                    $(`#frm-${package_id}`).submit();
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




    }


    })
    </script>

@stop
