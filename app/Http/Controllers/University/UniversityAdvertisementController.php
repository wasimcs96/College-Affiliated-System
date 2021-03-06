<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Carbon;
use Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
     'link'=>$request->link,
     'order_id'=>$request->orderId
 ]);

 $site = config('get.WEBSITE_LINK');
 $support_email = config('get.ADMIN_EMAIL');
 if(isset(auth()->user()->email))
 {
            // Important Code
            $replacement['ROLE'] = 'University';
            $replacement['SERVICE_NAME'] = 'Advertisement';
            $replacement['SERVICE_DETAIL'] = 'Your advertisement is under verification' ;
            $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
            $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
            $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
            $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
            $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
            $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
            $replacement['SUPPORT_EMAIL'] = $support_email;
            $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
            $data = ['template'=>'consultant-services','hooksVars' => $replacement];
            mail::to(auth()->user()->email)->send(new \App\Mail\ManuMailer($data));
 }
     return redirect()->route('university.advertisement')->with('success','Advertisement updated successfully');
    }


    public function edit($id)
    {
         $ad=Advertisement::where('id',$id)->first();
         // dd($ad);
         return view('university.advertisement.advertisement_edit',compact('ad'));
    }

    public function update(Request $request , $id)
    {
        $advertise=Advertisement::find($id);

        if($request->hasFile('image'))
        {
        $profile_image = $request->image;
        $profile_image_new_name = time().$profile_image->getClientOriginalName();
        $profile_image->move(Config::get('define.image.advertisement'),$profile_image_new_name);
        $advertise->banner_image = Config::get('define.image.advertisement').'/'.$profile_image_new_name;
        }
        $advertise->link = $request->link;
         $advertise->save();

     return redirect()->route('university.advertisement')->with('success','Advertisement updated successfully');

    }


}
