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

    $books= Booking::get();
    return view('admin.booking.booking',compact('books'));
 }


 public function show($id)
 {
    // dd($id);
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
     return view('admin.booking.booking_show',compact('show','university0','university1','university2','course0','course1','course2'));
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
