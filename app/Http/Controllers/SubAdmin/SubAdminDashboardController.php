<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class SubAdminDashboardController extends Controller
{
    public function index()
    {
      $booking=Booking::Count();
    //   dd($booking);
        return view('admin.dashboard');
    }
}
