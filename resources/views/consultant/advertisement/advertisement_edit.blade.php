@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Advertisement Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Advertisement<small>Advertisement Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                    <tr>
                        <th scope="row">Transaction Id</th>
                        <td>{{$ad->order->transaction_id ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Start Date</th>
                        <td>{{$ad->start_date ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">End Date</th>
                        <td>{{$ad->expire_date ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Purchased Date</th>
                        <td>{{$ad->created_at->format("Y-m-d") ?? ''}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Status</th>
                        <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
                        <td>
                        <td> @if($ad->expire_date>$mytime)<div class="btn btn-success">Activated</div>@endif
                            @if($ad->expire_date<$mytime && $ad->expire_date == !null)<div class="btn btn-danger">Expired</div>@endif
                            @if($ad->expire_date == null)<div class="btn btn-warning">Pending</div>@endif</td>

                    </tr>
            <tr>
                <td>

                </td>
            </tr>

                </tbody>

                </table>
            </div>
            <form action="{{route('consultant.advertisement.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <input name="image" id="photo" type="file" class="dropify-fr" >
                <input type="hidden" name="adID" value="{{$ad->id}}">

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>

</section>



@stop
@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@stop
@section('page-script')

<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

<script>
    $('.dropify-fr').dropify({
        messages: {
            default: 'Upload Profile Image',
            replace: 'Upload Profile Image',
            remove: 'Cancel',
            error: 'Sorry,the file is too large'
        }
    });
</script>

@endsection


