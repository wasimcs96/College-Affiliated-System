<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
use Json;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;
use App\Models\ApplicationAppliedUniversity;
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

     return view('consultant.booking.booking_show',compact('show'));
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
    return view('consultant.booking.booking_application',compact('book'));
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
    $documents = collect($request->documents);
// dd(collect($request->documents));
        foreach($documents as $key=>$value)
        {
            $applicationDocument = ApplicationDocument::create([
                'application_id' => $store->id,
            ]);
            // dd($document);
           $documentSave = $value;
           $documentSave_new_name = time().$documentSave->getClientOriginalName();
           $documentSave->move('uploads/document',$documentSave_new_name);

           $applicationDocument->file = 'uploads/document/'.$documentSave_new_name;
           $applicationDocument->save();
        }

    return redirect()->back();
}

}
