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
use App\Models\University;
use Config;
use App\Models\ApplicationAppliedUniversity;
use date;

class ConsultantApplicationController extends Controller
{
   public function index()
   {
     return view('consultant.application.application');
   }

   public function applicationCreate($id)
   {
       $application = Application::where('id',$id)->get()->first();

    $book = $application->booking->enquiry;
    $bookings = json_decode($book,true);
    $i = 0;
    foreach($bookings as $booking)
    {
        $university_id[$i] = $booking['university'];
        $course_id[$i] = $booking['course'];
        $i++;
    }
    $university0 =  University::where('id',$university_id[0])->get()->first();
    $university1 =  University::where('id',$university_id[1])->get()->first();
    $university2 =  University::where('id',$university_id[2])->get()->first();

    $course0 = Course::where('id',$course_id[0])->get()->first();
    $course1 = Course::where('id',$course_id[1])->get()->first();
    $course2 = Course::where('id',$course_id[2])->get()->first();

       return view('consultant.application.application_create',compact('application','university0','university1','university2','course0','course1','course2'));
   }

   public function documentStore(Request $request)
   {

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

       foreach($application->applicationAppliedUniversity as $key=>$applied)
       {
          $storeUniversityDocument = ApplicationAppliedUniversity::find($applied->id);
          $storeUniversityDocument->documents = $jsonApplicationStore;
          $storeUniversityDocument->save();
       }

    //    $jsonUniversity = $request->documents;
    //    $jsonUniversityStore=json_encode($jsonUniversity);

       $documentes = collect($request->documents);
       // dd(collect($request->documents));
               foreach($documentes as $doc)
               {
                   $applicationDocument = ApplicationDocument::create([
                       'application_id' => $application->id,
                   ]);
                   // dd($document);
                   //    $documentSave = $value;
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
       $university->is_accepeted = 1;
       $university->save();

       return response('success');

    }

    public function applicationReady(Request $request)
    {
        $id = $request->appliedUniversityRowIdReadyToFly;
        $fees = $request->fees;
        $university = ApplicationAppliedUniversity::find($id);
        $university->is_complete =1;
        $university->fees =$fees;
        $university->save();

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

}
