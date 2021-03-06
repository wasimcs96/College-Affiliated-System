<?php

namespace App\Http\Controllers\SubAdmin;

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
use Config;
use App\Models\ApplicationAppliedUniversity;
use date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubAdminApplicationController extends Controller
{
   public function index()
   {
     $applications = Application::orderBy('created_at', 'DESC')->get();
    //  dd($applications);
     return view('admin.application.application')->with('applications', $applications);
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


       return view('admin.application.application_create',compact('application','university','course'))->with('countries',Country::all());
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

       $university = ApplicationAppliedUniversity::find($id);

    //    $docDefault = $university->userUniversity->university->default_documents;
    //    $documentDefault = json_decode($docDefault);

    //    $documentDefault = json_encode($documentDefault);
    //    $documentVisa = Config::get('define.visa');
    //    dd($documentVisa,$documentVisa);
    //    $documentVisa2 = json_encode($documentVisa);
    //    $university->documents = array_merge($documentVisa,$documentDefault2);
       $university->is_accepeted = 1;
       $university->save();
       $site = config('get.WEBSITE_LINK');
       $support_email = config('get.ADMIN_EMAIL');
       if(isset($email))
       {
          // Important Code
          $replacement['UNIVERSITY_NAME'] = $university_name;
          $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
          $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
          $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
          $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
          $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
          $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
          $replacement['SUPPORT_EMAIL'] = $support_email;
          $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
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
        $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($user->email))
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
            $data = ['template'=>'fees-visa-received','hooksVars' => $replacement];
            mail::to($email)->send(new \App\Mail\ManuMailer($data));
        }
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
        $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($user->email))
        {
          // Important Code

          $replacement['UNIVERSITY_NAME'] = $university_name;
          $replacement['DEADLINE'] = $date;
          $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
          $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
          $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
          $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
          $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
          $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
          $replacement['SUPPORT_EMAIL'] = $support_email;
          $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
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
        //  dd($request->all());
        if($request->hiddenValue == 4)
        {
             $id = $request->apply_id;
             $fees = $request->fees;
             $docs = $request->doc;
             $document = json_encode($docs);
             $university = ApplicationAppliedUniversity::find($id);
             $university->documents = $document;
             $university->fees =$fees;
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
}
