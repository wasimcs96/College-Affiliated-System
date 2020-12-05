@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'See University details')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>My Universities<small>Universities Consultants Associated With</small></h2>
            <ul class="header-dropdown dropdown">

                {{-- <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <li class="dropdown">
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
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>


                    <tr>
                        <th scope="row">University Name</th>
                        <td>RTU</td>
                    </tr>
                    <tr>
                        <th scope="row">University Code</th>
                        <td>FY-312</td>
                    </tr>

                    <tr>
                        <th scope="row">University Fees</th>
                        <td>$ 500</td>
                    </tr>

                    <tr>
                        <th scope="row">University Address</th>
                        <td>Rawathbhata Road,
                            Kota - 324010
                            Rajasthan , India</td>
                    </tr>



                    <tr>
                        <th scope="row">University Nationality</th>
                        <td>Indian</td>
                    </tr>

            </div>
                    </tr>



                    </tbody>
                </table>
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
