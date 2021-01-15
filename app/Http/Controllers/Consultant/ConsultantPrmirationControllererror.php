<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
class ConsultantPrmirationController extends Controller
{
    public function prindex()
    {
      $book = auth()->user()->consultantBooking;
     //  $bookings = Booking::orderBy('booking_date', 'DESC')->get();
     //  dd($bookings);
      return view('consultant.prmigration.prmigration')->with('bookings', $book);
    }

    public function prshow($id)
    {
        $show = Booking::where('id',$id)->first();
    //     $university = [];
    //     $course = [];
    //     $enq = $show->enquiry;
    //     $queries = json_decode($enq,true);

    //     $i = 0;
    //  //    dd($queries);
    //     if(isset($queries))
    //     {
    //          foreach($queries as $query)
    //          {

    //              $university_id[$i] = $query['university'] ?? '';
    //              $course_id[$i] = $query['course'] ?? '';
    //              $university[$i] =  User::where('id',$university_id[$i])->get()->first();
    //              // dd($university);
    //              $course[$i] = Course::where('id',$course_id[$i])->get()->first();
    //              $i++;

    //          }
    //      }


        return view('consultant.prmigration.prmigration_show',compact('show'));
    }

}
