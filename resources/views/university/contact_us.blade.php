@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Contact Us')

@section('content')



<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Contact Us</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" novalidate>
                    <div class="form-group">
                        <label>University Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>University Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>University Mobile No.</label>
                        <input type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>University Phone No.</label>
                        <input type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>University Address</label>
                        <textarea class="form-control" rows="5" cols="30" required></textarea>
                    </div>


                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
