<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use DateTime;
use Illuminate\Support\Carbon;
use DateInterval;
use Dotenv\Regex\Success;

class ConsultantAdvertisementController extends Controller
{
   public function index()
   {
       return view('consultant.advertisement.advertisement');
   }

   public function add()
   {

       return view('consultant.advertisement.advertisement_add');
   }

   public function store(Request $request)
   {
    $expire=$request->expire_date;
    $new=Carbon::now()->addMonths($expire);
    $dt= $new->format('Y-m-d');


    if($request->hasFile('image'))
    {
        $ad_image = $request->image;
        $ad_image_new_name = time().$ad_image->getClientOriginalName();
        $ad_image->move('uploads/banner',$ad_image_new_name);
        $newname='uploads/banner/'.$ad_image_new_name;
    }
    Advertisement::create([

        'user_id'=>auth()->user()->id,
        'banner_image'=>  $newname,
        'user_type'=>0,
        'status'=>0,
        'expire_date'=> $dt,
    ]);

       return redirect()->route('consultant.advertisement')->with('success','Advertisement updated successfully');
   }
}