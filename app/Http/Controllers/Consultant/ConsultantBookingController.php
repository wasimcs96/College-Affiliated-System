<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
use Json;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;
use App\Models\ApplicationAppliedUniversity;
use App\Models\University;
use App\Models\Course;
use App\Models\ApplicationDocument;


class ConsultantBookingController extends Controller
{
   public function index()
   {
    // $book = auth()->user()->consultant->booking;
     return view('consultant.booking.bookings');
   }

   public function show($id)
   {
       $show = Booking::where('id',$id)->first();
       $enq = $show->enquiry;
       $queries = json_decode($enq,true);
       $i = 0;
       foreach($queries as $query)
       {
           $university_id[$i] = $query['university'];
           $course_id[$i] = $query['course'];
           $i++;
       }
       $university0 =  University::where('id',$university_id[0])->get()->first();
       $university1 =  University::where('id',$university_id[1])->get()->first();
       $university2 =  University::where('id',$university_id[2])->get()->first();

       $course0 = Course::where('id',$course_id[0])->get()->first();
       $course1 = Course::where('id',$course_id[1])->get()->first();
       $course2 = Course::where('id',$course_id[2])->get()->first();
       return view('consultant.booking.booking_show',compact('show','university0','university1','university2','course0','course1','course2'));
   }

   public function accept(Request $request)

   {
// dd($request->all());
        $booking = Booking::find($request->booking_id);
    //    dd($booking);

        $booking->status = 1;
        $booking->save();
        return response('success');

//      return view('consultant.booking.booking_show');
   }

public function application($id)
{
    $book = Booking::where('id',$id)->get()->first();
    $courses = Course::all();
    return view('consultant.booking.booking_application',compact('book','courses'));
}


public function applicationStore(Request $request){
// dd(json_encode(collect($request->document)));
// dd(collect($request->document->toJson()));
//  dd(json_encode($request->course));
// dd($request->course);
//  dd($request->university);
//  dd(json_encode($request->images));
//  $json = json_encode($request->document);
// dd(json_encode(collect($request->documents)));
    // $json = json_encode(collect($request->documents));


    $jsonApplication = $request->document;
    $jsonApplicationStore = json_encode($jsonApplication);
    $store=Application::create([
        'booking_id' => $request->booking_id,
        'client_id' => $request->client_id,
        'consultant_id' => $request->consultant_id,
        'note' => $request->note,
        'status' => 0,
        'documents' => $jsonApplicationStore,
        // 'documents'=> $json,
    ]);
    $store->save();
    // $i = 0;
    $jsonUniversity = $request->documents;
    $jsonUniversityStore=json_encode($jsonUniversity);
    foreach($request->university as $key => $univers)
    {
        $storeUniversity = ApplicationAppliedUniversity::create([
        'university_id' => $univers,
        'course_id' => $request->course[$key],
        'application_id' => $store->id,
        'documents' =>$jsonApplicationStore,

        ]);

    }
    $documentes = collect($request->documents);
// dd(collect($request->documents));
        foreach($documentes as $doc)
        {
            $applicationDocument = ApplicationDocument::create([
                'application_id' => $store->id,
            ]);
            // dd($document);
            //    $documentSave = $value;
           $doc_new_name = time().$doc->getClientOriginalName();
           $doc->move('uploads/document',$doc_new_name);

           $applicationDocument->file = 'uploads/document/'.$doc_new_name;
           $applicationDocument->save();
        }

        return redirect()->route('consultant.application')->with('success','Application Created Successfully');
}

}
