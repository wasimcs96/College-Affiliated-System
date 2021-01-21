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
use App\Models\Course;
use App\Models\Country;
use App\Models\User;
use App\Models\University;
use App\Models\ConsultantDues;
use DB;
use Config;
use App\Models\ApplicationAppliedUniversity;
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
        $course[$i] = Course::where('id',$course_id[$i])->get()->first();
        // dd($university[0]);
        $i++;
    }


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
       $slug='visa-amount';
       $check = $this->consultantDue($type,$slug);
       $applicationCommission->is_commission_add = 1;
       $applicationCommission->save();
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
         $alreadyClient = ConsultantDues::where('consultant_id',auth()->user()->id)->where('due_amount_type',0)->get('temp_client_count')->first();

         $dueAmount = DB::table('settings')->where('slug',$slug)->get('config_value')->first();


         if($consultant==null)
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
             $consultant->paid_amount = 0;
             $consultant->total_client_count = $alreadyClient->temp_client_count+1;
             $consultant->temp_client_count = $alreadyClient->temp_client_count+1;
             $consultant->due_amount_type = 0;
             $consultant->save();
             return $consultant;
         }
        return response('success');
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
            'university_id' => $request->university,
            'course_id' => $request->course,
            'application_id' => $request->application_id,
            'country_id' => $request->country,
            // 'documents' =>$jsonApplicationStore,

            ]);
        return redirect()->back()->with('success','University Added Successfully');

     }

}
