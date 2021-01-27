<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
      $booking=Booking::Count();
      dd($booking);
        return view('admin.dashboard');
    }
}
