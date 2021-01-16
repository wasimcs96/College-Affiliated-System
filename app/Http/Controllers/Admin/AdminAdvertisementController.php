<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Carbon;
class AdminAdvertisementController extends Controller
{
    public function index()
    {
        return view('admin.advertisement_manager.advertisement');
    }

    public function Update($id)
    {
        //  $expire=$request->package_time;
          $new=Carbon::now()->addMonths(6);
        $dt= $new->format('Y-m-d');
        $booking = Advertisement::find($id);
        //    dd($booking);

            $booking->status = 1;
            $booking->expire_date = $dt;
            $booking->save();
            // return response('success');

        return redirect()->route('admin.advertisement_manager');
    }
}
