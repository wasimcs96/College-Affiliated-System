@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Application')

@section('content')


<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Booking Details<small>
                {{-- <h6>Booking Details of Sufiyan Qureshi</h6></b> --}}
                </small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                <a href="javascript:void(0);" @if($application->status == 0 ?? '')  data-toggle="modal" data-target="#followUpModal" @else data-toggle="modal" data-target="#disabledModal" @endif custom1="{{$application->id}}" class="btn btn-primary" id="follow_up_trigger"><i class="fa fa-plus" style="margin-right: 8px;"></i>Add Follow Up</a>
                <div class="modal fade" id="followUpModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel3" style="color:white; text-align: center;">Add Follow Up</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <form id="basic-form6" class="basic-form" method="post" novalidate action="{{route('admin.application.followup.store')}}">
                                    @csrf
                                    {{-- <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div> --}}
                                  <input type="text" name="application_id" value={{$application->id ?? ''}} hidden>
                                    <div class="form-group" id="noteError">
                                        <label style="color:white">Note</label>
                                        <textarea class="form-control" id="note" name="note" rows="5" cols="30" required></textarea>
                                    </div>
                                    <div class="form-group" id="dateError">
                                        <label style="color:white">Date</label>
                                        <input  class="form-control" name="date" id="date" required>
                                    </div>
                                    <br>

                        </div>
                        <div class="modal-footer">
                          {{-- <button type="submit" class="btn btn-primary">Add Follow Up</button> --}}
                          <a href="javascript:void(0)"  class="btn btn-primary" id="add_follow_up"> Add </a>
                        </form>
                                    </div>
                </div>
                </div>
                </div>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped">

                    <tbody>
                        <tr>
                            <th scope="row">Consultant Name</th>
                            <td>{{$application->userConsultant->first_name ?? ''}} {{$application->userConsultant->last_name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Country</th>
                            @if(isset($application->userConsultant->countries_id))
                                <?php $country = DB::table('countries')->where('countries_id',$application->userConsultant->countries_id)->get()->first();?>
                            @endif
                            <td> {{$country->countries_name ?? ''}} </td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Mobile </th>
                            <td>{{$application->userConsultant->mobile ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Email </th>
                            <td>{{$application->userConsultant->email ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Company </th>
                            <td>{{$application->userConsultant->consultant->company_name ?? ''}}</td>
                        </tr>
                    <tr>
                        <th scope="row">Student Name</th>
                        <td>{{$application->booking->user->first_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Student Address</th>
                        <td>{{$application->booking->user->address ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>{{$application->booking->user->mobile ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>{{$application->booking->user->email ?? ''}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Student Country</th>
                        @if(isset($application->booking->user->countries_id))
                           <?php $country = DB::table('countries')->where('countries_id',$application->booking->user->countries_id)->get()->first();?>
                        @endif
                        <td> {{$country->countries_name ?? ''}} </td>
                    </tr>

                    <tr>
                        <th scope="row">Booking Note</th>
                        <td>{{$application->booking->comments ?? ''}}</td>
                    </tr>

                @foreach($university as $key=> $uni)
                    <tr>
                        <th scope="row">Student University/Course Preference-{{$key + 1}}</th>
                        <td>{{$uni->university->university_name ?? '' }}/{{$course[$key]->name ?? ''}}</td>
                    </tr>
                @endforeach

                    <tr>
                        <th scope="row">Booking Date</th>
                        <td>{{$application->booking->booking_date ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row"> Booking Time-Slot</th>
                        <td>{{$application->booking->booking_start_time ?? ''}}-{{$application->booking->booking_end_time ?? ''}}</td>
                    </tr>

           </div>

        {{-- </tr> --}}
               </tbody>

                </table>
                {{-- <div id="res">

                </div>
                <br>
                <div id="dec">

                </div> --}}
                {{-- <a  href="#" class="btn btn-success btn-flat" id="accept">Accept</a>
                <a href="{{route('admin.bookings')}}" id="bac" class="btn btn-danger btn-flat">Decline</a> --}}
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Application Details<small>
                {{-- <h6>Booking Details of Sufiyan Qureshi</h6></b> --}}
                </small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive" >
                <table class="table table-hover table-striped" >

                    <tbody>
                        <tr>
                            <th scope="row">Consultant Name</th>
                            <td>{{$application->userConsultant->first_name ?? ''}} {{$application->userConsultant->last_name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Country</th>
                            @if(isset($application->userConsultant->countries_id))
                                <?php $country = DB::table('countries')->where('countries_id',$application->userConsultant->countries_id)->get()->first();?>
                            @endif
                            <td> {{$country->countries_name ?? ''}} </td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Mobile </th>
                            <td>{{$application->userConsultant->mobile ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Email </th>
                            <td>{{$application->userConsultant->email ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Consultant Company </th>
                            <td>{{$application->userConsultant->consultant->company_name ?? ''}}</td>
                        </tr>

                    <tr>
                        <th scope="row">Student Name</th>
                        <td>{{$application->user->first_name ?? ''}} {{$application->user->last_name ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student Mobile No.</th>
                        <td>{{$application->user->mobile ?? ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Student E-mail</th>
                        <td>{{$application->user->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Student Country</th>
                        @if(isset($application->user->countries_id))
                            <?php $country = DB::table('countries')->where('countries_id',$application->user->countries_id)->get()->first();?>
                        @endif
                        <td> {{$country->countries_name ?? ''}} </td>
                    </tr>

                </div>


                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Documents</h2>
                </div>

            <div class="body">
                <form action="{{ route('consultant.application.document')}}" method="POST" enctype="multipart/form-data" >
                    @csrf

                <div class="form-group">
                    <?php $documentarray = Config::get('define.document');
                    $inc=0;
                    $documentSelect = json_decode($application->documents);
                    ?>
                    <label for="documents">Documents</label>
                    <br/>
                    <div class="dynamic_document" id="dynamic_document">
                        @foreach($documentSelect ?? '' as $key => $value)

                            <label class="control-inline fancy-checkbox" style="margin-right: 4px">

                             <input type="hidden" name="document[{{$key}}]" value="0" hidden>
                             <input type="checkbox" name="document[{{$key}}]" value="1" @if($value == 1) checked @endif >

                            <span>{{$key}}</span>

                            @php $inc++ @endphp
                           </label>
                        @endforeach

                    </div>
                    <input type="text" value="{{$application->id}}" name="app_id" hidden>
                    {{-- <input type="text" value="{{$application->applicationAppliedUniversity->id}}" name="app_university_id" hidden> --}}
                    <button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#documentModal" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif><i class="fa fa-plus"></i> </button>
                    <p id="error-checkbox3"></p>

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            @if(!empty($application->applicationDocument) && $application->applicationDocument != null)
                            <div class="form-group">
                                <?php $rts=$application->applicationDocument;?>
                                @if($rts->count()>0)
                                <label for="uploaded_documents">Uploaded Documents</label>
                                      <div id="lightgallery" class="row clearfix lightGallery">


                                    @foreach($rts as $rt)

                                      <div style="margin-left:24px;" id="documentid{{$rt->id}}">
                                      <input type="text" class="" value="{{$rt->id}}" name="document_id" hidden>
                                        <div class="img-responsive iws">
                                            <a class="light-link" href="{{asset($rt->file)}}"><img  class="img-fluid rounded" src="@if(isset($rt->file) && file_exists($rt->file)){{asset($rt->file)}}@endif"  alt="" style="position: relative;   display: inline-block;  width:200px; height:142.82px;"></a>
                                            <div class="card-body">
                                                <a href="{{asset($rt->file)}}" class="btn btn-primary" target="_blank" download style="margin-left: 19px;">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                                <span class="closes" custom2="{{$rt->id}}"  title="Delete" ><a href="javascript:void(0);" id="deleteRecord" custom1="{{$rt->id}}" data-id="{{auth()->user()->id}}" >&times;</a></span>
                                            </div>

                                        </div>
                                      </div>

                                      @endforeach
                                      {{-- @else
                                      <h2 class="mt-5" style="text-align: center;font-family: emoji;"> No Media Available</h2> --}}
                                      @endif

                                  </div>

                                    </div>
                                </div>
    @endif
                  <label for="" style="margin-left: 17px;">Upload Document ( Note: Image must be of jpeg and png format )</label>
                    <input type="file" name="documents[]" class="dropify" multiple>
                    @csrf
                    <br>
                    <button @if($application->status == 0 ?? '') type="submit" @endif class="btn btn-primary" @if($application->status == 1 ?? '') type="button" data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') type="button" data-toggle="modal" data-target="#disabledModal" @endif>Update</button>
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>
</div>
@if(isset($application->applicationAppliedUniversity))


<div class="col-lg-12">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card" >
                <div class="header" >
                    <h2>Applied Universities</h2>
                </div>

            <div class="body">
                <div id="alert_add2"></div>
@foreach($application->applicationAppliedUniversity as $key=>$applied)


@if($applied->Is_applied==1)
<style>
    #wizard_with_validation{{$key}}-t-0{
        background-color: green;
    }
</style>
@endif
@if($applied->approved_status==1 && $applied->Is_applied==1)
<style>
    #wizard_with_validation{{$key}}-t-1{
        background-color: green;
    }
</style>
@endif
@if($applied->is_accepeted==1 && $applied->approved_status==1 && $applied->Is_applied==1)
<style>
    #wizard_with_validation{{$key}}-t-2{
        background-color: green;
    }
</style>
@endif
@if($applied->is_complete==1 && $applied->is_accepeted==1 && $applied->approved_status==1 && $applied->Is_applied==1)
<style>
    #wizard_with_validation{{$key}}-t-3{
        background-color: green;
    }
</style>
@endif



<div class="accordion" id="accordionExample">

    <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
              University Form-{{$applied->userUniversity->university->university_name ?? ''}}
            </button>
          </h2>
        </div>
        <div id="collapse-{{$key}}" class="collapse" aria-labelledby="heading-{{$key}}" data-parent="#accordionExample">
          <div class="card-body">
              <div class="col-lg-12">
                  <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="card">
                              <div class="header">
                                  {{-- <h2>University Form-{{$key+ 1}} </h2> --}}
                                  <ul class="header-dropdown dropdown">

                                      <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                                  </ul>
                              </div>
                              <div class="body wizard_validation">

                                <form id="wizard_with_validation{{$key}}" action="{{ route('consultant.application.update.university') }}" method="POST" class="addInput">
                                    @csrf
                                    <div id="addInput">

                                    </div>
                                     <h3>Apply in University</h3>
                                     <fieldset>
                                         <h6> <b>
                                           Applied University Information</b> </h6>
                                         <div class="table-responsive" >
                                             <table class="table table-hover table-striped" >

                                                 <tbody>

                                                 <tr>
                                                     <th scope="row">University Name</th>
                                                     <td>{{$applied->userUniversity->university->university_name ?? ''}}</td>
                                                 </tr>
                                                 <tr>
                                                     <th scope="row">Course Name</th>
                                                     <td>{{$applied->course->name ?? ''}}</td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>

                                     <div class="row clearfix" >

                                         <div class="col-lg-6 col-md-12">

                                         </div>
                                         <input type="text" name="application_id" value={{$application->id ?? ''}} hidden>
                                     <input type="text" name="university_id" value="{{$applied->userUniversity->id ?? ''}}" hidden>
                                     <input type="text" name="client_id" value="{{$application->user->id ?? ''}}" hidden>
                                     <input type="text" name="apply_id" value="{{$applied->id ?? ''}}" hidden>

                                     <div class="col-lg-6 col-md-12">
                                     <div class="form-group">
                                     @if($applied->Is_applied==0) <a href="javascript:void(0);" class="btn btn-warning applied" custom1="{{$applied->id}}" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#applyModal" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif style="float: right;margin-top: 19px;">Ready to Apply</a>@endif
                                     @if($applied->Is_applied==1)<div class="btn btn-success" style="float: right;margin-top: 19px;">Applied</div>@endif
                                     </div>
                                     </div>
                                     </div>
                                     </fieldset>

                                       <h3>Application Status </h3>

                                       <fieldset>
                                     @if($applied->Is_applied==1)
                                         <h6> <b>
                                             University Approval Status</b> </h6>
                                        <div class="table-responsive" >
                                            <table class="table table-hover table-striped" >

                                                <tbody>

                                                <tr>
                                                    <th scope="row">University Name</th>
                                                    <td>{{$applied->userUniversity->university->university_name ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Course Name</th>
                                                    <td>{{$applied->course->name ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                 <th scope="row">Application Status</th>
                                                 <td id="application1">@if ($applied->approved_status == 0 ?? '') <span style="color:yellow">Pending</span>@endif
                                                     @if ($applied->approved_status == 1 ?? '') <span style="color:green">Approved</span>@endif
                                                     @if ($applied->approved_status == 2 ?? '') <span style="color:red">Cancelled</span>@endif</td>
                                             </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group" style="float: right;  margin-top: 2px; margin-right: -30px;">

                                     <button type="button"  id="rtf2" custom1="{{$applied->id}}"  class="btn btn-success approvel" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#dateModal" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif style="margin-right: 10px;" @if ($applied->approved_status == 1 ?? '') disabled @endif>Accept</button>


                                 <button type="button" id="rtf2" custom1="{{$applied->id}}" class="btn btn-danger cancel" custom1="{{$applied->id}}" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#applyCanceled" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif @if ($applied->approved_status == 2 ?? '') disabled @endif>Decline</button>
                               </div>

                             @else
                              <div class="content-center" style="text-align: center; margin-top: 100px;"> <h5> No Actions Available </h5></div>
                             @endif
                                    <div class="col-lg-6 col-md-12">

                                    </div>
                                       </fieldset>
                                       <h3>Offer Acceptance</h3>
                                       <fieldset>

                                     @if($applied->Is_applied==1)

                                         @if ($applied->approved_status == 1)
                                         <h6> <b>
                                             Offer Acceptance </b> </h6>
                                             <div class="table-responsive" >
                                                 <table class="table table-hover table-striped" >

                                                     <tbody>

                                                     <tr>
                                                         <th scope="row">University Name</th>
                                                         <td>{{$applied->userUniversity->university->university_name ?? ''}}</td>
                                                     </tr>
                                                     <tr>
                                                         <th scope="row">Course Name</th>
                                                         <td>{{$applied->course->name ?? ''}}</td>
                                                     </tr>
                                                     @if ($applied->is_accepeted == 1)
                                                     <tr>
                                                         <th scope="row">Offer Acceptance</th>
                                                         <td><span style="color:green">Accepted</span></td>
                                                     </tr>
                                                     @endif
                                                     @if ($applied->is_accepeted == 2)
                                                     <tr>
                                                         <th scope="row">Offer Acceptance</th>
                                                         <td><span style="color:red">Declined</span></td>
                                                     </tr>
                                                     @endif
                                                 </tbody>
                                             </table>
                                         </div>
                                           <div class="form-group">
                                               <div class="fancy-checkbox">
                                                   <label><span> <p> @if ($applied->is_accepeted == 0) University has accepted your application. Please accept before <b> {{$applied->deadline}} </b>@else @endif </p></span></label>

                                                 </div>
                                           </div>
                                           <div class="row clearfix">
                                             @if ($applied->is_accepeted == 0)
                                             <div class="form-group" style="margin-left: 217px;">
                                                 <h6 style="margin-left: 16px; color:orange">Accept Your Application by clicking the below button</h6>
                                                   <a style="margin-left: 182px;" href="javascript:void(0);"  class="btn btn-warning accepted" custom1="{{$applied->id}}" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#acceptedModal" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif>Accept</a>
                                               </div>

                                             @endif

                                         </div>
                                         @else

                                         <div class="form-group">
                                             <div class="content-center" style="text-align: center; margin-top: 100px;"> <h5> No Actions Available </h5></div>                                        </div>
                                           @endif

                                     @else
                                           <div class="content-center" style="text-align: center; margin-top: 100px;"> <h5> No Actions Available </h5></div>
                                     @endif
                                         </fieldset>
                                       <h3>Applied For Visa - Finish</h3>
                                       <fieldset>

                                       @if ($applied->is_accepeted == 1)
                                       <h6> <b>
                                        Applied For Visa </b> </h6>
                                           <div class="table-responsive" >
                                               <table class="table table-hover table-striped" >

                                                   <tbody>

                                                   <tr>
                                                       <th scope="row">University Name</th>
                                                       <td>{{$applied->userUniversity->university->university_name ?? ''}}</td>
                                                   </tr>
                                                   <tr>
                                                       <th scope="row">Course Name</th>
                                                       <td>{{$applied->course->name ?? ''}}</td>
                                                   </tr>

                                               </tbody>
                                           </table>
                                       </div>
                                       <h6> <b>
                                        Visa Documents</b> </h6>
                                           <div class="row clearfix">
                                             <input type="text"  name="appliedUniversityRowIdReadyToFly" value="{{ $applied->id }}" hidden>

                                               <div class="col-lg-2 col-md-12">
                                           <div class="form-group">
                                               <label for="">Course Fees</label>
                                               <?php $coursedetails=\App\Models\UniversityCourse::where('user_id',$applied->university_id)->where('course_id',$applied->course_id)->first(); ?>

                                               <input type="text" name="fees" class="form-control" id="coursefees" @if($applied->fees=="NULL" || $applied->fees=="null" || $applied->fees=='') value="" @else value="{{$coursedetails->fees}}" @endif />
                                             </div>
                                           </div>
                                            <div class="col-lg-2 col-md-12">
                                                <div class="form-group">
                                                   <label for="">Scholarship</label>
                                                        <input type="text" name="scholarship" class="form-control" id="scholarship" @if($applied->scholarship=="NULL" || $applied->scholarship=="null" || $applied->scholarship=='') value="" @else value="{{$applied->scholarship}}" @endif />
                                                </div>
                                            </div>

                                        <div class="col-lg-8 col-md-12">
                                            @if($applied->documents == 'null' || $applied->documents == 'NULL' || $applied->documents == '')
                                            <div class="form-group">
                                                <?php
                                                $docDefault = $applied->userUniversity->university->default_documents;
                                                $documentDefault = json_decode($docDefault);
                                                $documentVisa = Config::get('define.visa');
                                                $increase=0; ?>
                                                <label for="documents">Documents</label>
                                                <br/>
                                                <div class="dynamic_document" id="dynamic_document-{{$key}}">
                                                    @if (isset($documentDefault))

                                                    @foreach($documentDefault as $dockey => $value)

                                                    <label class="control-inline fancy-checkbox" style="margin-right: 4px" >

                                                        <input type="hidden" name="doc[{{$dockey}}]" value="0" hidden>
                                                        <input type="checkbox" name="doc[{{$dockey}}]" id="document[{{$increase}}]" value="{{$value}}" checked style="margin-right: 4px">

                                                        <span>{{$dockey}}</span>

                                                        @php $increase++ @endphp

                                                    </label>
                                                    @endforeach
                                                    @endif
                                                    @if (isset($documentVisa))

                                                    @foreach($documentVisa as $htkey => $htvalue)

                                                    <label class="control-inline fancy-checkbox" style="margin-right: 4px">
                                                        <input type="hidden" name="doc[{{$htkey}}]" value="0" hidden>

                                                        <input type="checkbox" name="doc[{{$htkey}}]" id="document[{{$increase}}]" value="{{$htvalue}}" checked style="margin-right: 4px">

                                                        <span>{{$htkey}}</span>

                                                        @php $increase++ @endphp

                                                    </label>
                                                    @endforeach
                                                    @endif
                                                </div>

                                                <button type="button" customDoc="{{$key}}"  name="adddocument " id="add_document_university" class="btn btn-primary btn-m add_document_university" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#documentModal2" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif ><i class="fa fa-plus"></i> </button>

                                              </div>
                                            @else
                                            <div class="form-group">
                                                <?php
                                                $appliedUniversity=$applied->documents;
                                                $documentSelect = json_decode($appliedUniversity);
                                                $increase=0; ?>
                                                <label for="documents">Documents</label>
                                                <br/>
                                                <div class="dynamic_document" id="dynamic_document-{{$key}}">
                                                    @if (isset($documentSelect))


                                                    @foreach($documentSelect as $rtkey => $rtvalue)

                                                    <label class="control-inline fancy-checkbox" style="margin-right: 4px">

                                                        <input type="hidden" name="doc[{{$rtkey}}]" value="0" hidden>
                                                        <input type="checkbox" name="doc[{{$rtkey}}]" id="document[{{$increase}}]" value="1" @if($rtvalue == 1) checked @endif style="margin-right: 4px">

                                                        <span>{{$rtkey}}</span>

                                                        @php $increase++ @endphp

                                                    </label>
                                                    @endforeach
                                                    @endif
                                                </div>

                                                <button type="button" customDoc="{{$key}}" name="adddocument" id="add_document_university" class="btn btn-primary btn-m add_document_university" @if($application->status == 0 ?? '') data-toggle="modal" data-target="#documentModal2" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif ><i class="fa fa-plus"></i> </button>

                                              </div>
                                              @endif
                                             </div>
                                             <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    @if($applied->is_complete==0)
                                                    <button  @if($application->status == 0 ?? '') type="submit" @endif class="btn btn-primary" @if($application->status == 1 ?? '') type="button" data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') type="button" data-toggle="modal" data-target="#disabledModal" @endif class="btn btn-primary" id="rtf4" >Update</button>

                                                    {{-- <button type="submit" name="adddocument" id="rtf" custom1="{{$applied->id}}"  class="btn btn-warning readytof" data-toggle="modal" data-target="#readyToFly" > Ready to fly</button> --}}
                                                    <button  @if($application->status == 0 ?? '') type="submit" @endif  @if($application->status == 1 ?? '') type="button" data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') type="button" data-toggle="modal" data-target="#disabledModal" @endif name="adddocument" id="rtf" custom1="{{$applied->id}}"  class="btn btn-warning readytof"  > Ready to fly</button>
                                                    @else
                                                   <button class="btn btn-primary" @if($application->status == 1 ?? '') type="button" data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') type="button" data-toggle="modal" data-target="#disabledModal" @endif type="button" name="adddocument" id="rtf3" class="btn btn-success">Completed</button>
                                                @endif
                                                </div>
                                            </div>


                                       @else
                                       <div class="form-group">
                                           <div class="content-center" style="text-align: center; margin-top: 100px;"> <h5> No Actions Available </h5></div>
                                       </div>





                                       @endif
                               </fieldset>
                                         </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
        </div>
      </div>

  </div>




  @endforeach
</div>
</div>
</div>
</div>
</div>
@endif

<div class="col-lg-12">
    <div class="card">
        <div class="header">

            <h2>Add University<small>
                {{-- <h6>Booking Details of Sufiyan Qureshi</h6></b> --}}
                </small></h2>
            {{-- <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
            </ul> --}}
        </div>
        <div class="body">
            <form action="{{ route('consultant.application.add.university')}}"  id="basic-form" method="POST" novalidate enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                <input type="text" class="form-control" name="client_id" value="{{$application->user->id}}"id="name" hidden>
                <input type="text" class="form-control" name="consultant_id" value="{{$application->userConsultant_id}}"id="name" hidden>
                <input type="text" class="form-control" name="application_id" value="{{$application->id}}"id="name" hidden>
                <div class="table-responsive" style="width: 100%; margin-top: 36px;">
                    <label for="name">Select University</label>
                    <table class="table table-bordered" id="dynamic_field">
                        <tr class="dynamic-added">
                            <td class="country">
                                <select id="country"  custom2="" class="form-control " name="country" placeholder="Select Country" required>
                                <option value="">Select Country Name</option>
                                @foreach($countries as $country)
                                <option value="{{$country->countries_id}}">{{$country->countries_name}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td class="university">
                                <select id="university" custom2="" class="form-control " name="university" placeholder="Select University" required>
                                 <option value="">Select University Name</option>
                              {{--  @foreach($univers as $univer)
                                <option value="{{$univer->userUniversity->id}}">{{$univer->userUniversity->university->university_name}}</option>

                                @endforeach--}}
                              </select>
                            </td>
                              <td id="">
                                  <select id="course" name="course" class="form-control" required>
                                    <option value="">Select Course Name</option>
                                {{-- @foreach($courses as $course)
                               <option value="{{$course->id}}">{{$course->name}}</option>
                               @endforeach --}}
                             </select></td>
                            {{-- <td><button type="button" name="add" id="add" class="btn btn-primary btn-m"><i class="fa fa-plus"></i></button></td> --}}

                        </tr>
                    </table>
                </div>
            </div>
            <button class="btn btn-primary" @if($application->status == 0 ?? '') type="submit" @endif  @if($application->status == 1 ?? '') type="button" data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') type="button" data-toggle="modal" data-target="#disabledModal" @endif>Add University</button>
        </form>

        </div>
    </div>
    <button type="button" id="closeApplicationButton" custom1="{{$application->id}}" class="btn btn-danger"  @if($application->status == 0 ?? '') data-toggle="modal" data-target="#closeApplicationModal" @endif  @if($application->status == 1 ?? '') data-toggle="modal" data-target="#completedModal" @endif @if($application->status == 2 ?? '') data-toggle="modal" data-target="#disabledModal" @endif style="margin-bottom: 10px; float: right; margin-top: -15px;">Close Application</button>
    {{-- <a href="javascript:void(0);" class="btn btn-danger">Close Application</a> --}}
</div>

</div>

</div>

<div class="modal fade" id="closeApplicationModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Close Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4>Are you sure you want to close the application?</h4>
        </div>
        <form action="{{ route('consultant.application.close') }}" method="POST">
            @csrf
        <div class="modal-footer">
                <input type="text" value="{{ $application->id }}" name="applicationCloseId" hidden>
            <button type="submit" class="btn btn-danger" >
                Yes
              </button>
              {{-- <a href="javascript:void(0)" id="closeApplication" class="btn btn-danger" >Yes</a> --}}
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                  No
                </button>
            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Apply for University</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                  <h4> Are you sure you want to apply for this University?</h4>

        </div>
        <div class="modal-footer">
           <a href="javascript:void(0);"  class="btn btn-primary" id="apply"> Apply </a>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Apply for Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

              <form id="basic-form5" class="basic-form" method="post" novalidate action="#">
                <div class="form-group">
                    <label for="date">Deadline Date</label>
                    <div id="modalDateError" >
                    <input type="text"  class="form-control" id="modalDate" name="date" required>
                    {{-- <span class="invalid-feedback" role="alert" id="modalDateError">

                    </span> --}}
                </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="applyApprovel" class="btn btn-primary" > Approve </a>
        </div>
    </div>
</div>
</div>

{{-- <div class="modal fade" id="acceptedModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Apply for University</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                  <h4> Are you sure you want to apply for this University?</h4>

        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)"  class="btn btn-primary" id="apply"> Apply </a>
        </div>
    </div>
</div>
</div> --}}

<div class="modal fade" id="acceptedModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Offer Acceptance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>


        </div>
        <div class="modal-body">

            <h4>Are you sure you want to accept this offer?</h4>

        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="applyAccepted" class="btn btn-primary" >Confirm</a>
           <a href="javascript:void(0)" id="declineAccepted" class="btn btn-danger" >Decline</a>
           {{-- <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
            No
          </button> --}}
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="readyToFly" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Ready to Fly</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <h4>Are you Ready To Fly</h4>

        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="readyTo" class="btn btn-primary" >Confirm</a>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="readyToFly2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Update details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <h4>Are you sure you want to Update the details?</h4>

        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="readyTo2" class="btn btn-primary" >Update</a>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="applyCanceled" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Cancel Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4>Are you sure you want to cancel the application?</h4>
        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="applyDecline" class="btn btn-danger" >Yes</a>
           <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
            No
          </button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Document Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="basic-form2" class="basic-form" method="post" novalidate action="#">
                <div class="form-group" id="documentError">
                    <label>Document Name</label>
                    <input type="text" class="form-control" name="document_name" id="document_name" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type= class="btn btn-primary">Submit</button> --}}
          <a href="javascript:void(0)" class="btn btn-primary" id="add_document2"> Add </a>
        </div>
        </div>
       </div>
</div>

<div class="modal fade" id="documentModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Document Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="basic-form3" class="basic-form" method="post" novalidate action="#">
                <div class="form-group" id="document2Error">
                    <label>Document Name</label>
                    <input type="text" class="form-control" name="document_name2" id="document_name2" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type= class="btn btn-primary">Submit</button> --}}
          <a href="javascript:void(0)" class="btn btn-primary" id="add_document3"> Add </a>
        </div>
        </div>
       </div>
</div>

<div class="modal fade" id="disabledModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Application Closed</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4>This Application is closed </h4>
        </div>
        <div class="modal-footer">

              {{-- <a href="javascript:void(0)" id="closeApplication" class="btn btn-danger" >Yes</a> --}}
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                Close
                </button>
            </div>

    </div>
</div>
</div>

<div class="modal fade" id="completedModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Application Completed</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4>This Application is completed</h4>
        </div>
        <div class="modal-footer">

              {{-- <a href="javascript:void(0)" id="closeApplication" class="btn btn-danger" >Yes</a> --}}
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                Close
                </button>
            </div>

    </div>
</div>
</div>



@stop

@section('page-styles')

<style>


    .iws {
        position: relative;
        display: inline-block;

        font-size: 0;
    }
    .iws .closes {
        position: absolute;
        top: 5px;
        right: 8px;
        z-index: 6;
        background-color:#22252a;
        padding: 4px 3px;

        color: #000;
        font-weight: bold;
        cursor: pointer;

        text-align: center;
        font-size: 22px;
        line-height: 10px;
        border-radius: 50%;
        border:1px solid #22252a;
    }
    .iws:hover .closes {
        opacity: 1;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-steps/jquery.steps.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<style>
.ui-datepicker-header .ui-icon {
    border:2px solid black;
}
.ui-datepicker-header .ui-icon:after {
    content: ">";
}
</style>
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-steps/jquery.steps.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/form-wizard.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function(){
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;
      var document_row = {{$inc}} ;
    //   var newval='';
      clc=0;
      $('#add_document2').click(function(){
      rt=$('#document_name').val()
      //   console.log(rt);
      if(rt=='')
      {
        $('#documentError').html(' <label>Document Name</label><input type="text" class="form-control" name="document_name" id="document_name" required><strong><span style="color:red">*This field is required</span></strong>')
      }
      else
      {
      $('#dynamic_document').append('<label class="control-inline fancy-checkbox" style="margin-left: 1px;"><input type="hidden" name="document['+rt+']" value="0"  hidden><input type="checkbox" customValue="'+rt+'" name= "document['+rt+']" value="1" class="checkbox"><span>'+rt+'</span></label>')
      // $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name="12marksheet"><span>'+rt+'</span></label>')
      $('#documentModal').modal('hide');
      document.getElementById("basic-form2").reset();
       document_row++
      }
    });

    $('.add_document_university').click(function(){

    // var id = '';
    newval = $(this).attr('customDoc');
    console.log(newval);

    $('#add_document3').click(function(){
      docName=$('#document_name2').val();
      if(docName=='')
      {
        $('#document2Error').html(' <label>Document Name</label><input type="text" class="form-control" name="document_name2" id="document_name2" required><strong><span style="color:red">*This field is required</span></strong>')
      }
      else
      {
      $('#dynamic_document-'+newval+'').append('<label class="control-inline fancy-checkbox" style="margin-left: 1px;"><input type="hidden" name="doc['+docName+']" value="0"  hidden><input type="checkbox" customValue="'+docName+'" name= "doc['+docName+']" value="1" class="checkbox"><span>'+docName+'</span></label>')
      $('#documentModal2').modal('hide');
      document.getElementById("basic-form3").reset();
      newval = '';
      }
    });
});


    $('#upload_document_button').click(function(){
    //   rt=$('#document_name').val()
    //   console.log(rt);
    clc=clc+1;
    $('#nb').append('<input type="file" class="dropify" id="dr'+clc+'">')
    $('#dr'+clc+'').dropify();

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
    alert('File deleted');
    });

$('.dropify-fr').dropify({
    messages: {
        default: 'Glissez-déposez un fichier ici ou cliquez',
        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
        remove: 'Supprimer',
        error: 'Désolé, le fichier trop volumineux'
    }
});
// $( "#nb" ). load(window. location. href + " #nb" );
$('#documentModal').modal('hide');
document.getElementsByClassName("basic-form").reset();
    });


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){
           $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
           });
      });


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });
</script>

<script>
   var appliedUniversityRowId='';
    $(document).on('click', '.applied', function ()
{
   appliedUniversityRowId=$(this).attr('custom1');
console.log(appliedUniversityRowId);
});
$(document).on('click', '#apply', function ()
{


      if(appliedUniversityRowId > 0){
        $.ajaxSetup({headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                    type: "post",
                    url: "{{route('admin.application.apply')}}",
                    data: {appliedUniversityRowId:appliedUniversityRowId},
                    success: function (result) {
                        $('.applied').html('Applied');

                        $('.applied').addClass('btn btn-success');
                        $('.applied').removeClass('btn-warning applied');
                        // $('.applied').css("background-color", "green");
                        $('#alert_add2').append('<div class="container"><div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>You have applied for the University Successfully.</strong></div></div>')
                        console.log('success');
                        location.reload();
                    }
                });
      }


            // $(this).text("Pending");
            $('#applyModal').modal('hide');
            // row++;
    });

    $(document).ready(function () {
    $('#date').datepicker({
        dateFormat: 'mm-dd-yy',
         minDate: 0,
        //  maxDate:"4w"
    });
});

$(document).ready(function () {
    $('#modalDate').datepicker({
        dateFormat: 'yy-mm-dd',
         minDate: 0,
        //  maxDate:"4w"
    });
});
</script>
<script>

    var appliedUniversityRowIdApproval='';
     $(document).on('click', '.approvel', function ()
 {
    appliedUniversityRowIdApproval=$(this).attr('custom1');
 console.log(appliedUniversityRowIdApproval);
 });
 $(document).on('click', '#applyApprovel', function ()
 {
    var x = 0;
    var modalDate=$('#modalDate').val();
    if( modalDate == '')
    {
        $('#modalDateError').html('<input type="text"  class="form-control" id="modalDate" name="date" required><strong><span style="color:red">*Date field is required</span></strong>')
    }
    else
    {
    // console.log(modalDate);
       if(appliedUniversityRowIdApproval > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });
            //  $(".invalid-feedback").children("strong").text("");
            //  $("#basic-form5 input").removeClass("is-invalid");
             $.ajax({
                     type: "post",
                     url: "{{route('admin.application.approval')}}",
                     data: {appliedUniversityRowIdApproval:appliedUniversityRowIdApproval,modalDate:modalDate},
                     success: function (result) {
                        $('#alert_add2').append('<div class="container"><div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong> Application Approved Successfully.</strong></div></div>')

                        $('#application1').html('<span style="color:green">Approved</span>');
                        // $('#application1').css("margin-left"," 16px");
                        // $('#application1').css("color","green");

                        x++;
                        console.log('success');
                        location.reload();
                     }

            //          error: (response) => {
            //     if(response.status == 422) {
            //         let errors = response.responseJSON.errors;
            //         Object.keys(errors).forEach(function (key) {
            //             $("#" + key + "Input").addClass("is-invalid");
            //             $("#" + key + "Error").children("strong").text(errors[key][0]);
            //         });
            //     } else {
            //         window.location.reload();
            //     }
            // }
                 });
       }


             // $(this).text("Pending");
             $('#dateModal').modal('hide');
             document.getElementById("basic-form5").reset();
             // row++;
        }
     });


 </script>
 <script>
    var appliedUniversityRowIdApproval='';
     $(document).on('click', '.cancel', function ()
 {
    appliedUniversityRowIdApproval=$(this).attr('custom1');
 console.log(appliedUniversityRowIdApproval);
 });
 $(document).on('click', '#applyDecline', function ()
 {
var j = 0;

       if(appliedUniversityRowIdApproval > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.application.approval')}}",
                     data: {appliedUniversityRowIdApproval:appliedUniversityRowIdApproval},
                     success: function (result) {
                        $('#alert_add2').append('<div class="container"><div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong> Application is Declined.</strong></div></div>')
                        $('#application1').html('<span style="color:red">Declined</span>');
                        // $('#application1').css("margin-left"," 16px");
                        // $('#application1').css("color","red");

                        j++;
                         console.log('success');
                         location.reload();
                     }
                 });
       }


             // $(this).text("Pending");

             $('#applyCanceled').modal('hide');
             // row++;
     });


 </script>
 <script>
    var appliedUniversityRowIdAccepted='';
     $(document).on('click', '.accepted', function ()
 {
    appliedUniversityRowIdAccepted=$(this).attr('custom1');
 console.log(appliedUniversityRowIdAccepted);
 });
 $(document).on('click', '#applyAccepted', function ()
 {


       if(appliedUniversityRowIdAccepted > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.application.accepted')}}",
                     data: {appliedUniversityRowIdAccepted:appliedUniversityRowIdAccepted},
                     success: function (result) {

                         console.log('success');
                         location.reload();
                     }
                 });
       }


             // $(this).text("Pending");
             $('#acceptedModal').modal('hide');
             // row++;
     });

     $(document).on('click', '#declineAccepted', function ()
 {


       if(appliedUniversityRowIdAccepted > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.application.offer.decline')}}",
                     data: {appliedUniversityRowIdAccepted:appliedUniversityRowIdAccepted},
                     success: function (result) {

                         console.log('success');
                         location.reload();
                     }
                 });
       }


             // $(this).text("Pending");
             $('#acceptedModal').modal('hide');
             // row++;
     });


 </script>
 <script>
     var fees='';
    var appliedUniversityRowIdReadyToFly='';
    var documents = [];
    var docs=[];
    var uni_id = $('#uni_id').val();

     $(document).on('click', '.readytof', function ()
 {
    appliedUniversityRowIdReadyToFly=$(this).attr('custom1');
    fees=$('#coursefees').val();
    documents = document.getElementsByName('doc[]');
    // console.log(.val());

   Array.from(documents).forEach((element)=>{
     console.log(element.value);
     docs.push(element.value)
   });

console.log(docs)

 });
 $(document).on('click', '#readyTo', function ()
 {


       if(appliedUniversityRowIdReadyToFly > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.application.readytofly')}}",
                     data: {appliedUniversityRowIdReadyToFly:appliedUniversityRowIdReadyToFly,fees:fees,docs:docs,uni_id:uni_id},
                     success: function (result) {

                         console.log('success');
                         location.reload();
                     }
                 });
       }

             $('#readyToFly').modal('hide');

     });


 </script>
<script>
    $('.closes').click( function()
    {
        var document_id = $(this).attr('custom2');
        // console.log(document_id);
        document.getElementById('documentid'+document_id).style.display="none";
        // console.log(document_id);
        $.ajaxSetup({
                        headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                    });
                $.ajax({
                            type: "post",
                            url: "{{route('admin.application.document.destroy')}}",
                            data: {document_id: document_id},
                            success: function (result)
                            {
                                console.log('success');
                            }
                        });

    });
</script>
<script>
    var fees='';
   var appliedUniversityRowIdReadyToFly='';
   var documents = [];
   var docs=[];
   var uni_id = $('#uni_id').val();

    $(document).on('click', '.readytof2', function ()
{
   appliedUniversityRowIdReadyToFly=$(this).attr('custom1');
   fees=$('#coursefees').val();
   documents = document.getElementsByName('doc[]');
   // console.log(.val());

  Array.from(documents).forEach((element)=>{
    // console.log(element.value);
    docs.push(element.value)
    console.log(docs);
  });

console.log(docs)
});
$(document).on('click', '#readyTo2', function ()
{
      if(appliedUniversityRowIdReadyToFly > 0){
        $.ajaxSetup({headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                    type: "post",
                    url: "{{route('admin.application.update.university')}}",
                    data: {appliedUniversityRowIdReadyToFly:appliedUniversityRowIdReadyToFly,fees:fees,docs:docs,uni_id:uni_id},
                    success: function (result) {

                        console.log('success');
                        location.reload();
                    }
                });
      }
      Array.from(docs).forEach((element)=>{
    // console.log(element.value);
    docs.pop(element.value)
    console.log(docs);
  });
            //  docs.clear();
            $('#readyToFly2').modal('hide');
    });


</script>
<script>
    var application_id='';
    var note ='';
    var date='';
     $(document).on('click', '#follow_up_trigger', function ()
 {
    application_id=$(this).attr('custom1');
 console.log(application_id);
 });
 $(document).on('click', '#add_follow_up', function ()
 {

       var note=$('#note').val();
       var date=$('#date').val();
    if( note == '')
    {
        $('#noteError').html('<label style="color:white">Note</label><textarea class="form-control" id="note" name="note" rows="5" cols="30" required></textarea><strong><span style="color:red">*Note field is required</span></strong>')
    }
    else if( date == '')
    {
        $('#dateError').html('<label style="color:white">Date</label><input  class="form-control" name="date" id="date" required><strong><span style="color:red">*Date field is required</span></strong>')
    }
    else
    {
       if(application_id > 0){
         $.ajaxSetup({headers:
             {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });

             $.ajax({
                     type: "post",
                     url: "{{route('admin.application.followup.store')}}",
                     data: {application_id:application_id,note:note,date:date},
                     success: function (result) {
                         console.log('success');
                        //  alert('Follow Up created Successfully');
                         $('#alert_add').append('<div class="container" style="width: 880px;"><div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Follow Up Created Successfully.</strong></div></div>')
                     }
                 });
       }

             $('#followUpModal').modal('hide');
             document.getElementById("basic-form6").reset();
    }
     });


 </script>
 <script>
      $(document).on('click', '#rtf', function ()
 {
    $('.addInput').append('<input type="text" name="hiddenValue" value="3"  hidden>');
    // console.log('1');
 });

 $(document).on('click', '#rtf4', function ()
 {
    $('.addInput').append('<input type="text" name="hiddenValue" value="4"  hidden>');
    // console.log('1dfhjs');
 });
 </script>
@stop
