@extends('layout.master')
@section('parentPageTitle', 'Users')
@section('title', 'See Users Detail')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Users<small>User Details</small></h2>
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
                        <td>{{$user->first_name ?? ''}}{{$user->last_name ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Email</th>
                        <td>{{$user->email ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>
                        <td>{{$user->status ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mobile</th>
                        <td>{{$user->mobile ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Landline 1</th>
                        <td>{{$user->landline_1 ?? ''}} </td>
                    </tr>

                    <tr>
                        <th scope="row">Landline 2</th>
                        <td>{{$user->landline_2 ?? ''}} </td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td>{{$user->birth_year ?? ''}} </td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>{{$user->address ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>{{$user->city ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        @if(isset($user->countries_id))
                        <?php $country = DB::table('countries')->where('countries_id',$user->countries_id)->get()->first();?>
                        @endif
                        <td>{{$country->countries_name ?? ''}}</td>
                    </tr>
@if($user->isConsultant())
                        <tr>
                        <th scope="row">Company Name</th>
                        <td>{{$user->consultant->company_name ?? ''}} </td>
                    </tr>

                    <tr>
                        <th scope="row">Website</th>
                        <td>{{$user->consultant->website ?? ''}} </td>
                    </tr>
                    <tr>
                        <th scope="row">Working Week Days</th>
                        <td>{{$user->consultant->working_week_days ?? ''}} </td>
                    </tr>
                    <tr>
                        <th scope="row">Time Slot</th>
                        <td>{{$user->consultant->start_time ?? ''}}-{{$user->consultant->end_time ?? ''}}</td>
                    </tr>
                        <tr>
                        <th scope="row">About Me</th>
                          <?php
                                            $myvalue = $user->consultant->about_me ?? '';
                                            if (strlen($myvalue) > 140)
                                                {
                                                    $myvalue = substr($myvalue, 0, 80);
                                                    $myvalue = explode(' ', $myvalue);
                                                    array_pop($myvalue); // remove last word from array
                                                    $myvalue = implode(' ', $myvalue);
                                                    // $myvalue = $myvalue . ' ...';
                                                } ?>
                        <td> <?php echo ($myvalue . '...')?></td>
                    </tr>

                    @endif
                    @if($user->isUniversity())
                        <tr>
                        <th scope="row">University Name</th>
                        <td>{{$user->university->university_name ?? ''}} </td>
                    </tr>

                    <tr>
                        <th scope="row">Website</th>
                        <td>{{$user->university->website ?? ''}} </td>
                    </tr>
                    <tr>
                        <th scope="row">Average Fees</th>
                        <td>{{$user->university->average_fees ?? ''}} </td>
                    </tr>
                    <tr>
                        <th scope="row">About Me</th>
                          <?php
                                            $myvalue = $user->university->about_me ?? '';
                                            if (strlen($myvalue) > 140)
                                                {
                                                    $myvalue = substr($myvalue, 0, 80);
                                                    $myvalue = explode(' ', $myvalue);
                                                    array_pop($myvalue); // remove last word from array
                                                    $myvalue = implode(' ', $myvalue);
                                                    // $myvalue = $myvalue . ' ...';
                                                } ?>
                        <td> <?php echo ($myvalue . '...')?></td>
                    </tr>

                    @endif
                    </tbody>

                </table>
            </div>
                @if($user->isClient())
                   <a href="{{route('admin.users',['id'=>1])}}" id="bac" class="btn btn-danger btn-flat">Back</a>
                @endif
                @if($user->isConsultant())
                   <a href="{{route('admin.users',['id'=>2])}}" id="bac" class="btn btn-danger btn-flat">Back</a>
                @endif
                @if($user->isUniversity())
                   <a href="{{route('admin.users',['id'=>3])}}" id="bac" class="btn btn-danger btn-flat">Back</a>
                @endif
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
