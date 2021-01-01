@extends('layout.master')
@section('parentPageTitle', 'Consultant ')
@section('title', 'PR Migration')


@section('content')
<!-- Color Pickers -->
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>PR Migration</h2>
            </div>
            <div class="body demo-card">
                <form action="{{route('consultant.prmigration.store')}}" method="POST">
                    @csrf


                <div class="row clearfix">
                    {{-- <input type="text" value="{{$au}}" hidden> --}}
                    <div class="col-lg-4 col-md-12">
                        <label>Select Countries</label>
                        <div class="multiselect_div">
                            <select id="multiselect4-filter" name="country[]" class="multiselect multiselect-custom" multiple="multiple">
                                @foreach($countries as $country)
                                <option value="{{$country->countries_id}}">{{$country->countries_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            </div>


                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">

                                    <div id="nouislider_basic_example" hidden></div>
                                </div>
                                <div class="col-lg-6 col-md-12" hidden>

                                    <div id="nouislider_range_example"></div>
                                </div>
                            </div>


        </div>
    </div>
</div>

<!-- Input Slider -->

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>
@stop

@section('page-script')

<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script><!-- Bootstrap Colorpicker Js -->
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script><!-- Input Mask Plugin Js -->
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script><!-- Multi Select Plugin Js -->
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script><!-- noUISlider Plugin Js -->

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
@stop
