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
use App\Models\User;
use App\Models\University;
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


       return view('consultant.application.application_create',compact('application','university','course'));
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
        // dd($request->apply_id);
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
             return redirect()->back()->with('success','Document Updated Successfully');
        }
        else
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

}
