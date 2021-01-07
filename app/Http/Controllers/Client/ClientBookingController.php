<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class ClientBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('created_at','DESC')->get();
    //    dd($applications);

        return view('client.booking.bookings')->with('bookings', $bookings);

    }

    public function show($id)
    {
        $booking = Booking::where('id', $id)->get()->first();

        return view('client.booking.booking_show', compact('booking'));
    }
}
