<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\ApplicationChat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

    public function reject(Request $request)
    {
        //  dd($request->all());
        // dd($id);
        $user = User::where('id',$request->user_id)->first();
        $fname = $user->first_name;
        $lname = $user->last_name;
        $email = $user->email;
        $reason = $request->reason;
        $link = "http://kamercio.com/campusInterest/public/consultant/advertisement/edit/".$request->advertisement_id;
        $image = "http://kamercio.com/campusInterest/public/consultant/frontEnd/assets/image/logo.png";
      $rt=  ApplicationChat::create([
           'sender'=>auth()->user()->id,
           'receiver'=>$request->user_id,
           'message'=> "Your Advertisement is Rejected due to following Reason:'.$request->reason.'Link to Your Advertisement:  <a href='consultant/advertisement/edit/$request->advertisement_id>Link</a>",
           'send_by'=>0
        ]);
             return response($rt);
             $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($user->email))
        {
        $replacement['IMAGE'] = $image;
        $replacement['USER_NAME'] = $user->first_name;
        $replacement['REASON'] =$request->reason;
        $replacement['ADVERTISEMENT_LINK'] = $link;
        $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
        $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
        $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
        $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
        $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
        $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
        $replacement['SUPPORT_EMAIL'] = $support_email;
        $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
        $data = ['template'=>'advertisement-reject','hooksVars' => $replacement];
        mail::to($user->email)->send(new \App\Mail\ManuMailer($data));
        }
    }

}

