<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Date;
use App\Models\Application;
use App\Models\Course;
use App\Models\University;
use App\Models\BookingFollowsUp;
use App\Models\ApplicationAppliedUniversity;


class ConsultantBookingFollowUpController extends Controller
{
   public function index()
   {
       $bookings = BookingFollowsUp::orderBy('date', 'DESC')->get();
     return view('consultant.bookingFollowUp.index')->with('bookings',$bookings);
   }


//    public function create()
//    {
//        $applications = auth()->user()->consultant->application;
//     //    dd($application_id);
//        return view('consultant.applicationFollowUp.create')->with('applications',$applications);
//    }


   public function show($id)
   {


    $booking = BookingFollowsUp::where('id', $id)->first();
    // dd($application);
    return view('consultant.bookingFollowUp.show')->with('booking', $booking);

   }

   public function store(Request $request)
   {
    //    dd($request->all());
    $this->validate($request, [
        'booking_id' => 'required',
        'note' => 'required',
        'date' => 'required',
    ]);
    //  $dateFormat = strtotime($request->date);
    //  $dateFormat =  date('Y-m-d');
    //  dd($dateFormat);
    $booking = BookingFollowsUp::create([
        'booking_id' => $request->booking_id,
        'note' => $request->note,
        'date' => $request->date,
    ]);
    $booking->save();
    return response('success');
   }

}
