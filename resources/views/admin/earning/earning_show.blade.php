@extends('layout.master')
@section('parentPageTitle', 'Earning')
@section('title', 'See Earnings Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Earning<small>Earning Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>

                    <tr>
                        <th scope="row"> Name</th>
                        <td>{{$order->user->first_name ?? ''}}{{$order->user->last_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">User Type</th>
                        <td>@if($order->user->isConsultant()) Consultant @endif
                            @if($order->user->isUniversity()) University @endif
                            @if($order->user->isAdmin()) Admin @endif
                            @if($order->user->isSubAdmin()) SubAdmin @endif
                            @if($order->user->isClient()) Client @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Amount</th>
                        <td>{{$order->amount ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>
                        <td> @if ($order->status == 0)
                            <span class="btn btn-danger">InActive</span>
                        @else
                            <span class="btn btn-info">Active</span>
                        @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Transaction ID</th>
                        <td>{{$order->transaction_id ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Payment Type</th>
                        <td>@if($order->payment_type == 0)Subscription @endif
                            @if($order->payment_type == 1)Premium @endif
                            @if($order->payment_type == 2)Advertisement @endif
                            @if($order->payment_type == 3)Consultant Visa Commission @endif
                            @if($order->payment_type == 4)Consultant PR Commission @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Package Description</th>
                        @foreach($order->OrderItem as $key=>$item)
                        <td>{{$item->Item_title ?? ''}}</td>
                        @endforeach
                    </tr>
            </div>


                    </tbody>

                </table>
                <div id="res">

                </div>
                <br>
                <div id="dec">

                </div>
                {{-- <a  href="{{route('admin.booking.client_app')}}" class="btn btn-success btn-flat" id="accept">Accept</a> --}}
                <a href="{{route('admin.earning')}}" id="bac" class="btn btn-danger btn-flat">Back</a>
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

@stop
