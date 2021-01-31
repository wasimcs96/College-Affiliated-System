@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Dashboard')

@section('content')


<div class="row clearfix">
                <?php $users = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'client');
                })->count();
                $university = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'university');
                })->count();
                $consultant = App\Models\User::whereHas('roles', function($q){
                    $q->where('name', 'consultant');
                })->count();

                ?>
    <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="body">
                    <div class="d-flex align-items-center">
                        <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i></div>
                        <div class="ml-4">
                            <span>Total Clients</span>
                            <h4 class="mb-0 font-weight-medium">{{$users}}</h4>
                        </div>
                    </div>
                </div>
            </div>
     </div>
     <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-danger text-white rounded-circle"><i class="fa fa-university" aria-hidden="true"></i>
                    </div>
                    <div class="ml-4">
                        <span>Total University</span>
                        <h4 class="mb-0 font-weight-medium">{{$university}}</h4>
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
                <?php $booking = DB::table('bookings')->count(); ?>
                <div class="body">
                    <div class="d-flex align-items-center">
                        <div class="icon-in-bg bg-primary text-white rounded-circle"><i class="fa fa-sticky-note" aria-hidden="true"></i>
                        </div>
                        <div class="ml-4">
                            <span>Total Bookings</span>
                            <h4 class="mb-0 font-weight-medium">{{$booking}}</h4>
                        </div>
                    </div>
                </div>
            </div>
     </div>

     <div class="col-lg-4 col-md-6">
        <div class="card">
            <?php $applications = DB::table('applications')->count(); ?>

            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-success text-white rounded-circle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <div class="ml-4">
                        <span>Total Application</span>
                        <h4 class="mb-0 font-weight-medium">{{$applications}}</h4>
                    </div>
                </div>
            </div>
        </div>
     </div>

     <div class="col-lg-4 col-md-6">
        <div class="card">
            <?php $fly = DB::table('university_consultant_clients')->count(); ?>

            <div class="body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-blue text-white rounded-circle"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <div class="ml-4">
                        <span>Ready to Fly Clients</span>
                        <h4 class="mb-0 font-weight-medium">{{$fly}}</h4>
                    </div>
                </div>
            </div>
        </div>
 </div>

 <div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="body">
            <?php $pr = DB::table('bookings')->where('booking_for',1)->count(); ?>

            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-green text-white rounded-circle"><i class="fa fa-plane" aria-hidden="true"></i>
                </div>
                <div class="ml-4">
                    <span>PR Requests</span>
                    <h4 class="mb-0 font-weight-medium">{{$pr}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="body">

            <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');?>
            <td>
            <?php $ad = App\Models\Advertisement::where('expire_date','>',$mytime)->count()?>

            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-cyan text-white rounded-circle"><i class="fa fa-adn" aria-hidden="true"></i>
                </div>
                <div class="ml-4">
                    <span>Active Advertisement</span>
                    <h4 class="mb-0 font-weight-medium">{{$ad}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="body">
            <?php $revenue = App\Models\Order::all()->sum('amount');?>

            <div class="d-flex align-items-center">
                <div class="icon-in-bg bg-cyan text-white rounded-circle"><i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <div class="ml-4">
                    <span>Total Revenue</span>
                    <h4 class="mb-0 font-weight-medium"><i class="fa fa-inr" aria-hidden="true"></i>{!!"&nbsp"!!}{{$revenue}}</h4>
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
