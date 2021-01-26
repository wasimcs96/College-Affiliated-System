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
                        <td>  @if(isset($user->first_name)){{$user->first_name ?? ''}}{{$user->last_name ?? ''}} @else N/A @endif</td>
                    </tr>

                    <tr>
                        <th scope="row">Email</th>
                        <td>  @if(isset($user->email)){{$user->email ?? ''}} @else N/A @endif</td>
                    </tr>

                    <tr>
                        <th scope="row">Status</th>
                        <td>  @if(isset($user->status)){{$user->status ?? ''}} @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Mobile</th>
                        <td>  @if(isset($user->mobile)){{$user->mobile ?? ''}} @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Landline 1</th>
                        <td>  @if(isset($user->landline_1)){{$user->landline_1 ?? ''}}  @else N/A @endif</td>
                    </tr>

                    <tr>
                        <th scope="row">Landline 2</th>
                        <td>  @if(isset($user->landline_2)){{$user->landline_2 ?? ''}} @else N/A @endif </td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td>  @if(isset($user->birth_year)){{$user->birth_year ?? ''}} @else N/A @endif </td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>  @if(isset($user->address)){{$user->address ?? ''}} @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>  @if(isset($user->city)){{$user->city ?? ''}} @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        @if(isset($user->countries_id))
                        <?php $country = DB::table('countries')->where('countries_id',$user->countries_id)->get()->first();?>
                        @endif
                        <td>  @if(isset($country->countries_name)){{$country->countries_name ?? ''}} @else N/A @endif</td>
                    </tr>
@if($user->isConsultant())
                        <tr>
                        <th scope="row">Company Name</th>
                        <td>  @if(isset($user->consultant->company_name)){{$user->consultant->company_name ?? ''}} @else N/A @endif </td>
                    </tr>

                    <tr>
                        <th scope="row">Website</th>
                        <td>  @if(isset($user->consultant->website)){{$user->consultant->website ?? ''}}  @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Working Week Days</th>


                       <?php
                        $weekarray = Config::get('define.weekday');
                        if(isset($user->consultant->working_week_days))
                        {
                        $setWorkingDays = explode(",", $user->consultant->working_week_days);
                        }
                        else {
                            $setWorkingDays = [];
                        }
                    ?>

                        <td>
                            @if(count($weekarray)>0)
                            @foreach($weekarray as $key => $value)
                               @if(in_array($key, $setWorkingDays))
                               {{$value}},
                               @else
                               {{$value}},
                               @endif
                            @endforeach
                            @endif

                            {{-- @if(isset($user->consultant->working_week_days)){{$user->consultant->working_week_days ?? ''}}  @else N/A @endif --}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Time Slot</th>
                        <td>  @if(isset($user->consultant->start_time)){{$user->consultant->start_time ?? ''}}-{{$user->consultant->end_time ?? ''}} @else N/A @endif</td>
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
                        <td>  @if(isset($myvalue)) <?php echo ($myvalue . '...')?> @else N/A @endif</td>
                    </tr>

                    @endif
                    @if($user->isUniversity())
                        <tr>
                        <th scope="row">University Name</th>
                        <td>  @if(isset($user->university->university_name)){{$user->university->university_name ?? ''}}  @else N/A @endif</td>
                    </tr>

                    <tr>
                        <th scope="row">Website</th>
                        <td>  @if(isset($user->university->website)){{$user->university->website ?? ''}}  @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">Average Fees</th>
                        <td>  @if(isset($user->university->average_fees)){{$user->university->average_fees ?? ''}}  @else N/A @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">About Me</th>
                          <?php
                                            $myabout = $user->university->about_me ?? '';
                                            if (strlen($myabout) > 140)
                                                {
                                                    $myabout = substr($myabout, 0, 80);
                                                    $myabout = explode(' ', $myabout);
                                                    array_pop($myabout); // remove last word from array
                                                    $myabout = implode(' ',$myabout);
                                                    // $myvalue = $myvalue . ' ...';
                                                } ?>
                        <td>  @if(isset($myabout)) <?php echo ($myabout . '...')?> @else N/A @endif</td>
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
