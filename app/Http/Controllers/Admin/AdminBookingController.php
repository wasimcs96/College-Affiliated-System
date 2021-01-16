<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\University;
use App\Models\Course;
use App\Models\User;
class AdminBookingController extends Controller
{
 Public function index(){

    $bookings= Booking::orderBy('updated_at', 'DESC')->where('booking_for',0)->get();
    return view('admin.booking.booking',compact('bookings'));
 }


 public function show($id)
 {
    // dd($id);
     $booking = Booking::where('id',$id)->first();
     $enq = $booking->enquiry;
     $enquires = json_decode($enq,true);
     // dd($bookings);
     $i = 0;
     // dd(json_decode($book,true));
     foreach($enquires as $enquiry)
     {
         // dd($booking);
         $university_id[$i] = $enquiry['university'] ?? '';
          $course_id[$i] = $enquiry['course'] ?? '';

         $university[$i] =  User::where('id',$university_id[$i])->get()->first();
         $course[$i] = Course::where('id',$course_id[$i])->get()->first();
         // dd($university[0]);
         $i++;
     }
     return view('admin.booking.booking_show',compact('booking','university','course'));
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
