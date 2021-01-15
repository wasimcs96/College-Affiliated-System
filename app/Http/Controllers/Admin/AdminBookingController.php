<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\University;
use App\Models\Course;
class AdminBookingController extends Controller
{
 Public function index(){

    $bookings= Booking::orderBy('updated_at', 'DESC')->where('booking_for',0)->get();
    return view('admin.booking.booking',compact('bookings'));
 }


 public function show($id)
 {
    // dd($id);
     $show = Booking::where('id',$id)->first();
     $enq = $show->enquiry;
     $enquires = json_decode($book,true);
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
     return view('admin.booking.booking_show',compact('show','university','course'));
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
