@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Dashboard')

@section('content')

@php
    $user = DB::table('university_consultant_clients')->where('university_id',auth()->user()->id)->count();
    $consultant = DB::table('university_consultants')->where('university_id',auth()->user()->id)->count();
    $course = DB::table('university_courses')->where('user_id',auth()->user()->id)->count();
    $application = DB::table('application_applied_universities')->where('university_id',auth()->user()->id)->count();
@endphp


<div class="row clearfix">

    <div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="body">
            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i></div>
                <div class="ml-4">
                    <span>Total Students</span>
                    <h4 class="mb-0 font-weight-medium">{{ $user }}</h4>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="body">
            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-briefcase" aria-hidden="true"></i>

                </div>
                <div class="ml-4">
                    <span>Total Consultant</span>
                    <h4 class="mb-0 font-weight-medium">{{$consultant}}</h4>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card">
        <div class="body">


        <div class="d-flex align-items-center">
            <div class="icon-in-bg bg-cyan text-white rounded-circle"><i class="icon-notebook" aria-hidden="true"></i>
            </div>
            <div class="ml-4">
                <span>Total Course</span>
                <h4 class="mb-0 font-weight-medium">{{ $course }}</h4>
            </div>
        </div>
        </div>
        </div>
        </div>

    <div class="col-lg-4 col-md-6">
        <div class="card">

        <div class="body">
            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-success text-white rounded-circle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div>
                <div class="ml-4">
                    <span>Total Application</span>
                    <h4 class="mb-0 font-weight-medium">{{ $application }}</h4>
                </div>
            </div>
        </div>
        </div>
        </div>

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
@stop
