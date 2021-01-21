<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use DateTime;
use Config;
use Illuminate\Support\Carbon;
use DateInterval;
use Dotenv\Regex\Success;
use App\Http\Controllers\PaymentController;

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

//    dd($request->all());
   // dd($request->file('image'));

    $expire=$request->expire_date;
    //   $new=Carbon::now()->addMonths($expire);
    // $dt= Carbon::now()->format('Y-m-d');
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
        'user_type'=>0,
        'status'=>0,
        'time_period'=> $expire,
        'order_id'=>$request->orderId
    ]);

      // $new=new PaymentController();
       //$new->payment($request);
//dd($new);
       return redirect()->route('consultant.advertisement')->with('success','Advertisement updated successfully');
   }

   public function edit($id)
   {
        $ad=Advertisement::where('id',$id)->first();
        // dd($ad);
        return view('consultant.advertisement.advertisement_edit',compact('ad'));
   }

   public function update(Request $request)
   {
       $advertise=Advertisement::find($request->adid);
       $profile_image = $request->image;
       $profile_image_new_name = time().$profile_image->getClientOriginalName();
       $profile_image->move(Config::get('define.image.advertisement'),$profile_image_new_name);
       $advertise->image = Config::get('define.image.advertisement').'/'.$profile_image_new_name;
    $advertise->save();

    return redirect()->route('consultant.advertisement')->with('success','Advertisement updated successfully');

   }
}
