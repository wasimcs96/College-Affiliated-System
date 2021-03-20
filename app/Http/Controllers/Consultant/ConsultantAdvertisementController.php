<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use DateTime;
use Config;
use Illuminate\Support\Carbon;
use DateInterval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        'type'=>$request->type,
        'time_period'=> $expire,
        'order_id'=>$request->orderId,
        'link'=>$request->link
    ]);
     $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
         if(isset($email))
        {
            // Important Code
            $replacement['ROLE'] = 'Consultant';
            $replacement['SERVICE_NAME'] = 'Advertisement';
            $replacement['SERVICE_DETAIL'] = 'Your advertisement is under verification';
            $replacement['WEBSITE_LINK'] = 'https://campusinterest.com';
            $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
           $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
           $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
           $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
           $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
           $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
           $replacement['SUPPORT_EMAIL'] = $support_email;
            $data = ['template'=>'consultant-services','hooksVars' => $replacement];
            mail::to(auth()->user()->email)->send(new \App\Mail\ManuMailer($data));
    // $new=new PaymentController();
    //$new->payment($request);
//dd($new);
}
       return redirect()->route('consultant.advertisement')->with('success','Advertisement updated successfully');
   }

   public function edit($id)
   {
        $ad=Advertisement::where('id',$id)->first();
        // dd($ad);
        return view('consultant.advertisement.advertisement_edit',compact('ad'));
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
    };



    $advertise->link = $request->link;
    $advertise->save();

    return redirect()->route('consultant.advertisement')->with('success','Advertisement updated successfully');

   }
}
