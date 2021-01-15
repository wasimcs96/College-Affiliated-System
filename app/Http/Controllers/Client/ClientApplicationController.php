<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationAppliedUniversity;
use App\Models\ApplicationDocument;
use App\Models\Course;
use App\Models\User;
use Config;

class ClientApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('created_at','DESC')->get();
    //    dd($applications);

        return view('client.application.my_applications')->with('applications', $applications);

    }



    public function show($id)
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


       return view('client.application.my_application_show',compact('application','university','course'));
   }

   public function documentStore(Request $request)
   {
       $id = $request->app_id;
    //    dd( $request->documents);
       $application = Application::find($id);
    //    $application->documents =  $jsonApplicationStore;
    //    $application->save();
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

   public function documentDestroy(Request $request)
    {
        $id=$request->document_id;
        ApplicationDocument::find($id)->delete();
            return response()->json([
                'success' => 'image deleted successfully!'
            ]);
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

     public function offerDecline(Request $request)
    {
        $id = $request->appliedUniversityRowIdAccepted;

        $university = ApplicationAppliedUniversity::find($id);

        $university->is_accepeted = 2;
        $university->save();
        return response('success');

     }
}
