<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\UniversityCourse;
use App\Models\User;

class ClientBookingController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->id);
        $bookings = Booking::where('client_id',auth()->user()->id)->where('booking_for',0)->orderByDesc('created_at')->get();
    //    dd($applications);
        return view('client.booking.bookings')->with('bookings', $bookings);

    }

    public function show($id)
    {
        $booking = Booking::where('id', $id)->get()->first();
        $book = $booking->enquiry;
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
            $course[$i] = UniversityCourse::where('id',$course_id[$i])->get()->first();
            // dd($university[0]);
            $i++;
        }
        return view('client.booking.booking_show', compact('booking','university','course'));
    }
}
