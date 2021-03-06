<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;
use App\Models\ApplicationDocument;
use App\Models\UniversityCourse;
use App\Models\Country;
use App\Models\User;
use App\Models\University;
use App\Models\UniversityConsultantClient;
use App\Models\ConsultantDues;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Config;
use App\Models\ApplicationAppliedUniversity;
use App\Models\UniversityConsultant;
use date;

class ConsultantApplicationController extends Controller
{
   public function index()
   {
     $applications = Application::orderBy('created_at', 'DESC')->get();
     return view('consultant.application.application')->with('applications', $applications);
   }

   public function applicationCreate($id)
   {
    //    dd($id);
       $application = Application::where('id',$id)->get()->first();

    $book = $application->booking->enquiry;
    $bookings = json_decode($book,true);
    // dd($bookings);
    $i = 0;
    // dd(json_decode($book,true));
    foreach($bookings as $booking)
    {
        // dd($booking);
        $university_id[$i] = $booking['university'] ?? '';
         $course_id[$i] = $booking['course'] ?? '';

        $university[$i] =  User::where('id',$university_id[$i])->get()->first();
        $course[$i] = UniversityCourse::where('id',$course_id[$i])->get()->first();
        // dd($university[0]);
        $i++;
    }
    //    $countrys = auth()->user()->consultantPrMigrationCountry->with('countrys',$countrys);

       return view('consultant.application.application_create',compact('application','university','course'))->with('countries',Country::all());
   }

   public function documentStore(Request $request)
   {
// dd($request->document);

       $jsonApplication = $request->document;

       $jsonApplicationStore = json_encode($jsonApplication);
       $id = $request->app_id;
    //    dd( $request->documents);
       $application = Application::find($id);
        // dd($jsonApplicationStore );
        // dd($application->documents);
       $application->documents =  $jsonApplicationStore;
    //    dd($application->documents);
       $application->save();

    //    foreach($application->applicationAppliedUniversity as $key=>$applied)
    //    {
    //       $storeUniversityDocument = ApplicationAppliedUniversity::find($applied->id);
    //       $storeUniversityDocument->documents = $jsonApplicationStore;
    //       $storeUniversityDocument->save();
    //    }
       $documentes = collect($request->documents);
               foreach($documentes as $doc)
               {
                   $applicationDocument = ApplicationDocument::create([
                       'application_id' => $application->id,
                   ]);
                  $doc_new_name = time().$doc->getClientOriginalName();
                  $doc->move(Config::get('define.image.document'),$doc_new_name);

                  $applicationDocument->file = Config::get('define.image.document').'/'.$doc_new_name;
                  $applicationDocument->save();
               }
        return redirect()->back()->with('success','Document Uploaded Successfully');
   }

   public function applicationApply(Request $request)
   {
       $id = $request->appliedUniversityRowId;

       $university = ApplicationAppliedUniversity::find($id);
       $university->Is_applied = 1;
       $university->save();

       return response('success');

    }

    public function applicationAccepted(Request $request)
   {
       $id = $request->appliedUniversityRowIdAccepted;
       $application_id = $request->applicationId;
       $university = ApplicationAppliedUniversity::find($id);
       $applicationCommission = Application::find($application_id);
       $university->is_accepeted = 1;
       $university->save();
       $application = Application::where('id',$application_id)->where('is_commission_add',1)->get()->first();
       if($application==NULL)
       {
       $type=0;
       $slug='VISA_COMMISSION';
       $check = $this->consultantDue($type,$slug);
       $applicationCommission->is_commission_add = 1;
       $applicationCommission->save();
       }
       $university_name = University::where('user_id',$university->university_id)->value('university_name');
       $application = $university->application_id;
        $user_id = Application::where('id',$application)->first();
        $email = $user_id->user->email;
         $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
         if(isset($email))
        {
       // Important Code
            $replacement['WEBSITE_LINK'] = 'https://campusinterest.com/';
            $replacement['UNIVERSITY_NAME'] = $university_name;

            $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
$replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
$replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
$replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
$replacement['SUPPORT_EMAIL'] = $support_email;
// $replacement['WEBSITE_LINK'] = $site ;
 $data = ['template'=>'fees-visa','hooksVars' => $replacement];
            mail::to($email)->send(new \App\Mail\ManuMailer($data));
   }
       return response('success');

    }

    public function applicationReady(Request $request)
    {
        // dd($request->all());
        $id = $request->appliedUniversityRowIdReadyToFly;
        $fees = $request->fees;
        $doc = $request->docs;
        $document = json_encode($doc);
        $university = ApplicationAppliedUniversity::find($id);
        $university->is_complete =1;
        $university->documents = $document;
        $university->fees =$fees;
        $university->save();

        // $university_id = $request->uni_id;
        // $default_document = University::find($university_id);
        // $default_document->default_documents = $document;
        // $default_document->save();


        return response('success');

     }

    public function applicationApprovel(Request $request)
    {
        if ($request->modalDate) {
        $id = $request->appliedUniversityRowIdApproval;
        $date=date("Y-m-d",strtotime($request->modalDate));
        $university = ApplicationAppliedUniversity::find($id);
        $university->approved_status = 1;
        $university->deadline=$date;
        $university->save();
        $university_name = University::where('user_id',$university->university_id)->value('university_name');
        $application = $university->application_id;
        $user_id = Application::where('id',$application)->first();
        $email = $user_id->user->email;
           $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
         if(isset($email))
        {
        // Important Code
            $replacement['WEBSITE_LINK'] = 'https://campusinterest.com';
            $replacement['UNIVERSITY_NAME'] = $university_name;
            $replacement['DEADLINE'] = $date;
                $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
$replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
$replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
$replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
$replacement['SUPPORT_EMAIL'] = $support_email;
// $replacement['WEBSITE_LINK'] = $site ;
 $data = ['template'=>'fees-visa','hooksVars' => $replacement];
            $data = ['template'=>'offer-received','hooksVars' => $replacement];
            mail::to($email)->send(new \App\Mail\ManuMailer($data));
        }
    }
    else {

        $id = $request->appliedUniversityRowIdApproval;

        $university = ApplicationAppliedUniversity::find($id);
        $university->approved_status = 2;
        $university->save();
    }
        return response('success');

    }

    public function destroy(Request $request)
    {
        $id=$request->document_id;
        ApplicationDocument::find($id)->delete();
            return response()->json([
                'success' => 'image deleted successfully!'
            ]);
    }

    public function universityUpdate(Request $request)
    {
        //   dd($request->all());
        if($request->hiddenValue == 4)
        {
             $id = $request->apply_id;
             $fees = $request->fees;
             $docs = $request->doc;
             $scholarship = $request->scholarship;
             $document = json_encode($docs);
             $university = ApplicationAppliedUniversity::find($id);
             $university->documents = $document;
             $university->fees =$fees;
             $university->scholarship = $scholarship;
             $university->save();
             return redirect()->back()->with('success','Application Updated Successfully');
        }
        if($request->hiddenValue == 3)
        {
            $id = $request->apply_id;
            $fees = $request->fees;
            $docs = $request->doc;
            $document = json_encode($docs);
            $university = ApplicationAppliedUniversity::find($id);
            $university->is_complete =1;
            $university->documents = $document;
            $university->fees =$fees;
            $university->save();
            $ucClient = UniversityConsultantClient::where('client_id',$request->client_id)->get()->first();
            if($ucClient==null)
            {
            UniversityConsultantClient::create([
                'client_id' => $request->client_id,
                'consultant_id' => auth()->user()->id,
                'university_id' => $request->university_id,
            ]);
            }

            $application = Application::find($request->application_id);
            $application->status = 1;
            $application->save();

         $country_name = Country::where('countries_id',$university->country_id)->value('countries_name');

         $bookingId = $application->booking_id;
         $booking = Booking::find($bookingId);
         $booking->status = 4;
         $booking->save();
         $email = $application->user->email;
            $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($email))
        {
                // Important Code

            $replacement['COUNTRY_NAME'] = $country_name;
                $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
$replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
$replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
$replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
$replacement['SUPPORT_EMAIL'] = $support_email;
$replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
 $data = ['template'=>'fees-visa','hooksVars' => $replacement];
            $data = ['template'=>'fees-visa-received','hooksVars' => $replacement];
            mail::to($email)->send(new \App\Mail\ManuMailer($data));
        }
            return redirect()->back()->with('success','Application Process is Completed Successfully');


        }
        // $university_id = $request->uni_id;
        // $default_document = University::find($university_id);
        // $default_document->default_documents = $document;
        // $default_document->save();

        return response('success');
    }

    public function offerDecline(Request $request)
    {
        $id = $request->appliedUniversityRowIdAccepted;

        $university = ApplicationAppliedUniversity::find($id);

        $university->is_accepeted = 2;
        $university->save();
        return response('success');

     }

        public function consultantDue($amountType,$slug)
     {
         $consultant = ConsultantDues::where('consultant_id',auth()->user()->id)->where('due_amount_type',0)->get()->first();

         $alreadyDue = ConsultantDues::where('consultant_id',auth()->user()->id)->where('due_amount_type',0)->get('due_amount')->first();
         $alreadyClient = ConsultantDues::where('consultant_id',auth()->user()->id)->where('due_amount_type',0)->first();

         $dueAmount = DB::table('settings')->where('slug',$slug)->get('config_value')->first();

    if(isset($dueAmount->config_value))
    {
         if($consultant==null )
         {
            // dd(auth()->user()->id);
           $newConsultant = ConsultantDues::create([

                'due_amount' => $dueAmount->config_value,
                'paid_amount' => 0,
                'consultant_id' => auth()->user()->id,
                'total_client_count' => 1,
                'temp_client_count' => 1,
                'due_amount_type' => $amountType
            ]);

            return response('success');
         }
         else
         {
             $consultant->consultant_id = auth()->user()->id;
             $consultant->due_amount = $dueAmount->config_value+$alreadyDue->due_amount;
             $consultant->paid_amount = $alreadyClient->paid_amount;
             $consultant->total_client_count = $alreadyClient->total_client_count+1;
             $consultant->temp_client_count = $alreadyClient->temp_client_count+1;
             $consultant->due_amount_type = 0;
             $consultant->save();
             return $consultant;
         }
        return response('success');
        }
        else
        {
            return response('success');
        }
     }

     public function universityAdd(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'university_id'=>'required',
            'course_id'=>'required',
            'application_id' => 'required',
            'country_id'=>'required',
             ]);
            $storeUniversity = ApplicationAppliedUniversity::create([
            'university_id' => $request->university_id,
            'course_id' => $request->course_id,
            'application_id' => $request->application_id,
            'country_id' => $request->country_id,
            // 'documents' =>$jsonApplicationStore,

            ]);
        return redirect()->back()->with('success','University Added Successfully');

     }

     public function closeApplication(Request $request)
     {
        //   dd($request->all());
        $application = Application::find($request->applicationCloseId);
        $application->status = 2;
        $application->save();

        $booking = Booking::find($application->booking_id);
        $booking->status = 5;
        $booking->save();
        $universities = ApplicationAppliedUniversity::where('application_id',$application->id)->get();
        foreach($universities as $university)
        {
            $university->is_closed = 1;
            $university->save();
        }
        return redirect()->back()->with('danger','This Application is Closed');

      }

      function fetchCourse(Request $request)
      {
          // dd($request->all());
          $fetch=User::where('id',$request->universityid)->first();
          if(isset($fetch->universityCourse) && $fetch != NULL)
          {
          $courses =  $fetch->universityCourse;
          $output='<option value="" selected>Course Name</option>';
          foreach($courses as $row)
          {
           $output .= '<option value="'.$row->id.'">'.$row->title.'</option>';
          }
          echo $output;
        }
        else
        {
           $output='<option value="" selected>No Data Available</option>';
           echo $output;
        }
      }

      function fetchUniversity(Request $request)
      {
        //   dd($request->all());
          $fetch=Country::where('countries_id',$request->countryid)->first();
          // dd($fetch);
          $universities = User::where('countries_id',$request->countryid)->get();
          //   dd( $universities->get()->toArray());
          $output='<option value="" selected>Select University Name</option>';
          if($universities->count() > 0){
          foreach($universities as $university)
          {
              $check=UniversityConsultant::where('university_id',$university->id)->where('consultant_id',auth()->user()->id)->first();
              if ($check) {
                  # code...

              if($university->isUniversity())
              {

                $output .= '<option value="'.$university->id.'">'.$university->first_name.'</option>';

              }
            }

          }
        }else{
            $output = '<option value="" selected>University Unavailable</option>';
        }
          // dd($output);
          echo $output;
      }

}
