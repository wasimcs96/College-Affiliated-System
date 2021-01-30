<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Carbon;
class SubAdminAdvertisementController extends Controller
{
    public function index()
    {
        return view('admin.advertisement_manager.advertisement');
    }

    public function update(Request $request)
    {
        // dd($request->time_period);
        //  $expire=$request->package_time;
        $sd=Carbon::now()->format('Y-m-d');
          $new=Carbon::now()->addMonths($request->time_period);
          $dt= $new->format('Y-m-d');
        $id=$request->rtid;
        // dd($id);
        $booking = Advertisement::find($id);
        //    dd($booking);
            $booking->status = 1;
            $booking->expire_date = $dt;
            $booking->start_date = $sd;
            $booking->save();
            // return response('success');

        return redirect()->route('admin.advertisement_manager');
    }
}
