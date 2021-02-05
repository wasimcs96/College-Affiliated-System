<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\ApplicationChat;
use Illuminate\Support\Carbon;
class AdminAdvertisementController extends Controller
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

    public function reject(Request $request)
    {
         dd($request->all());
        // dd($id);
            // $ad = Advertisement::find($request->advertisement_id);
            // // dd($ad);
            // $ad->status = 2;
            // $ad->save();
      $rt=  ApplicationChat::create([
           'sender'=>auth()->user()->id,
           'receiver'=>$request->user_id,
           'message'=> "Your Advertisement is Rejected due to following Reason:'.$request->reason.'Link to Your Advertisement:  <a href='consultant/advertisement/edit/$request->advertisement_id>Link</a>",
           'send_by'=>0
        ]);
             return response($rt);

        // return redirect()->route('admin.advertisement_manager');
    }

}

