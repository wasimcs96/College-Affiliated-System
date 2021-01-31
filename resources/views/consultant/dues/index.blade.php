@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'See Dues Detail')

@section('content')
@if($id == 1)
<h6>Total Payment<small style="margin-left:3px;">Payment Details</small></h6>
<div class="row clearfix">
    <input type="text" name="amount" value="{{$dues->due_amount ?? ''}}" hidden>
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

<h6>Total Dues<small style="margin-left:3px;">Dues Details</small></h6>
<div class="row clearfix">
    <input type="text" name="amount" value="{{$dues->due_amount ?? ''}}" hidden>
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
                <button  customAmount="{{$dues->due_amount ?? ''}}" customDue="0" customUser="{{auth()->user()->id}}" customPayment="3" customTitle="paydue" class="btn btn-round btn-outline-secondary chooseplan">Pay Dues</button>
            <br><br><br><br>
            </div>
       {{-- </div>
    </div>
</div> --}}

<div class="container" id="choosedcontent">

</div>
<div class="card">
    <div class="header">
        <h2>Dues<small>All PR Dues</small></h2>
    </div>
<div class="body">
<div class="table-responsive">
    <table class="table table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th> <b>
                    Amount</b></th>
                <th><b> Transaction Id </b></th>
                <th><b> Status</b></th>
                <th><b>Paid for</b></th>
                 <th><b>Paid On</b></th>
                {{--<th><b> Status</b></th>
                <th><b>Actions</b></th> --}}
            </tr>
        </thead>
        <tfoot>

        </tfoot>
        {{-- {{ dd($orders) }} --}}
        @if($orders->count() > 0)
        <tbody>
            @foreach($orders as $order)
@if($order->payment_type == 3)
            <tr>
                <td> ₹ {{$order->amount ?? ''}} </td>
                <td>{{$order->transaction_id ?? ''}}</td>
                <td> <div class="btn btn-success">Paid</div> </td>
                <td> <div class="btn btn-warning">Visa</div>  </td>
                <td> {{ Carbon\Carbon::parse($order->created_at)->format(config('get.ADMIN_DATE_TIME_FORMAT')) }}  </td>
            </tr>
@endif
            @endforeach
        @endif
        </tbody>
    </table>
</div>
</div>
</div>
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
          <a href="{{route('consultant.dues',['id'=>$id])}}" class="btn btn-primary" style="
          border-radius: 35px;font-weight: 500;
    font-family: sans-serif;" id="add_document3">Close</a>
        </div>
        </div>
       </div>
</div>
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
                <button  customAmount="{{$prDues->due_amount ?? ''}}" customDue="1" customUser="{{auth()->user()->id}}" customPayment="4" customTitle="paydue" class="btn btn-round btn-outline-secondary chooseplan">Pay Dues</button>

            </div>
            <br>
<div class="container" id="choosedcontent">

</div>
<div class="card">
    <div class="header">
        <h2>Dues<small>All PR Dues</small></h2>
    </div>
<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover dataTable js-exportable">
            <thead>
                <tr>
                    <th> <b>
                        Amount</b></th>
                    <th><b> Transaction Id </b></th>
                    <th><b> Status</b></th>
                    <th><b>Paid for</b></th>
                    <th><b>Paid On</b></th>
                    {{-- <th><b>Time Slot</b></th>
                    <th><b> Status</b></th>
                    <th><b>Actions</b></th> --}}
                </tr>
            </thead>
            <tfoot>

            </tfoot>
            {{-- {{ dd($orders) }} --}}
            @if($orders->count() > 0)
            <tbody>
                @foreach($orders as $order)
    @if($order->payment_type == 4)
                <tr>
                    <td> <i class="fa fa-inr"></i> {{$order->amount ?? ''}} </td>
                    <td>{{$order->transaction_id ?? ''}}</td>
                    <td> <div class="btn btn-success">Paid</div> </td>
                    <td> <div class="btn btn-warning">PR</div>  </td>
                    <td> {{ Carbon\Carbon::parse($order->created_at)->format(config('get.ADMIN_DATE_TIME_FORMAT')) }}  </td>
                </tr>
    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </div>
</div>

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
          <a href="{{route('consultant.dues',['id'=>$id])}}" class="btn btn-primary" style="
          border-radius: 35px;font-weight: 500;
    font-family: sans-serif;" id="add_document3">Close</a>
        </div>
        </div>
       </div>
</div>
@endif
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

<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

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
    due_type=$(this).attr('customDue');
    amount=$(this).attr('customAmount');
    payment_type=$(this).attr('customPayment');



   var html=`
   <div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <br>

                    <div class="col-md-3">
                        <br>

                        <p><b>Title</b></p>
                        <ul style="list-style-type: none;margin-left: -40px;">
        <li class="plan-img">Pay Dues</li>


    </ul>
                    </div>
                    <div class="col-md-3">
                        <br>

                        <p class="align-center" ><b  style="float: left;">Amount To Pay</b></p>
                        <br>
                        <div class="align-center" ><h5 style="float:left; margin-left: -6px;"><span>₹</span>${amount}<small></small></h5></div>
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
        data:{user_id:user_id,title:title,amount:amount,payment_type:payment_type},
        success: function(result){

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
                            //$('#mdlup').modal('show');
                            $.ajaxSetup({headers:
                                {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                });

                                $.ajax({
                                    url:"{{ route('consultant.dues.pay') }}",
                                    method:"post",
                                    data:{userId:user_id,due_type:due_type,amount:amount},
                                    success: function(result){
                                        $('#mdlup').modal('show');


                                    }
                                    });

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
