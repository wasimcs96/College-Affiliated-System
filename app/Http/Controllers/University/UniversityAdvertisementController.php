<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Carbon;
use Config;
use App\Http\Controllers\PaymentController;

class UniversityAdvertisementController extends Controller
{
    public function index()
    {
        return view('university.advertisement.advertisement');
    }

    public function add()
    {

        return view('university.advertisement.advertisement_add');
    }

    public function store(Request $request)
    {

//    dd($request->all());
   // dd($request->file('image'));

   $expire=$request->expire_date;
   $new=Carbon::now()->addMonths($expire);
 $dt= $new->format('Y-m-d');
  if($request->hasFile('image'))
 {
     $ad_image = $request->image;
     $ad_image_new_name = time().$ad_image->getClientOriginalName();
     $ad_image->move(Config::get('define.image.advertisement'),$ad_image_new_name);
     $newname=Config::get('define.image.advertisement').'/'.$ad_image_new_name;
 }
 // dd($newname);
$as= Advertisement::create([

     'user_id'=>auth()->user()->id,
     'banner_image'=>$newname ?? '',
     'user_type'=>1,
     'status'=>0,
     'time_period'=> $expire,
     'order_id'=>$request->orderId
 ]);

   // $new=new PaymentController();
    //$new->payment($request);
//dd($new);
     return redirect()->route('university.advertisement')->with('success','Advertisement updated successfully');
    }

}
