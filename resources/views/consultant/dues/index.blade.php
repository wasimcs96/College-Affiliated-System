@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'See Dues Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Dues<small>Dues Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        @if(isset($dues))
        <div class="body">
            <div class="table-responsive" >
                <form action="{{route('consultant.dues.pay')}}" method="POST">
@csrf
               
                <table class="table table-hover table-striped">

                    <tbody>
                    <tr>
                        <th scope="row">Total Due Amount</th>
                        <input type="text" name="amount" value="{{$dues->due_amount ?? ''}}" hidden>
                        <input type="text" name="payment_type" value="3" hidden>
                        <input type="text" name="title" value="paydue" hidden>
                        <td> <button class="btn btn-flat btn-danger"> Rs.{{$dues->due_amount ?? ''}} </button>  </td>
                    </tr>
                    <tr>
                        <th scope="row">Total Clients</th>
                        <input type="text" name="clients_total" value="{{$dues->temp_client_count ?? ''}}" hidden>
                        <td> <button class="btn btn-flat btn-warning"> {{$dues->temp_client_count ?? ''}} </button> </td>
                    </tr>

                    </tbody>

                </table>
                <button  type="submit" class="btn btn-success btn-flat">Pay</button>
            </form>
            </div>

        </div>
        @endif
        @if(isset($prDues))
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>
                    <tr>
                        <th scope="row">Total PR Due Amount</th>
                        <td> <button class="btn btn-flat btn-danger"> Rs.{{$prDues->due_amount}} </button>  </td>
                    </tr>
                    <tr>
                        <th scope="row">Total Clients</th>
                        <td> <button class="btn btn-flat btn-warning"> {{$prDues->temp_client_count}} </button> </td>
                    </tr>

                    </tbody>

                </table>
                <a  href="{{route('consultant.dues.pay')}}" class="btn btn-success btn-flat">Pay</a>
            </div>

        </div>
        @endif
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
