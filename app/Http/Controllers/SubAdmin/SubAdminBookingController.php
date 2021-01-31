<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\University;
use App\Models\Course;
use App\Models\User;
class SubAdminBookingController extends Controller
{
 Public function index(){

    $bookings= Booking::orderBy('updated_at', 'DESC')->where('booking_for',0)->get();
    return view('subadmin.booking.booking',compact('bookings'));
 }


 public function show($id)
 {
    // dd($id);
     $booking = Booking::where('id',$id)->first();
     $university = [];
     $course = [];
     $enq = $booking->enquiry;
     $enquires = json_decode($enq,true);
     // dd($bookings);
     $i = 0;
     if(isset($enquires))
     {
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
    }
     return view('subadmin.booking.booking_show',compact('booking','university','course'));
 }

        public function accept(Request $request)
            {
                $booking = Booking::find($request->booking_id);
                $booking->status = 1;
                $booking->save();
                return response('success');
            }

}
