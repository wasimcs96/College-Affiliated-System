@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'See Course Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Course<small>Course Details</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                {{-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another Action</a></li>
                        <li><a href="javascript:void(0);">Something else</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>


                        <tr>
                            <th scope="row"> Course</th>
                            <td>{{$courses->title ?? 'NA'}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Description</th>
                            <td>{{$courses->description ?? 'NA'}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Fees</th>
                            <td>₹ {{$courses->fees ?? 'NA'}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Start Date</th>
                            <td>{{ Carbon\Carbon::parse($courses->start_date)->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                        </tr>

                        <tr>
                            <th scope="row">End Date</th>
                            <td>{{ Carbon\Carbon::parse($courses->end_date)->format(config('get.ADMIN_DATE_FORMAT')) }}</td>
                        </tr>


                    </tbody>

                </table>
                <a href="{{route('university.courses')}}" id="bac" class="btn btn-danger btn-flat">Back</a>

            </div>
        </div>
    </div>
</div>

<!-- Media############################################################################## -->





@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>

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
