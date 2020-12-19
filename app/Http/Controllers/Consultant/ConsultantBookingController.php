<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

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
}
