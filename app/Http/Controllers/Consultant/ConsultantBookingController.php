<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;


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
 dd(json_encode($request->document));
//  $json = json_encode($request->document);
    $store=Application::create([

        'booking_id' => $request->booking_id,
        'client_id' => $request->client_id,
        'consultant_id' => $request->consultant_id,
        'note' => $request->note,
        'status' => 0,
        'documents'=> $json,


     ]);
     $store->save();
     return redirect()->back();
}

}
