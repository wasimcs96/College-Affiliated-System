<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantDues;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Http\Controllers\PaymentController;


class ConsultantDuesController extends Controller
{
    public function index($id)
    {
        if($id==1)
        {
            $dues = ConsultantDues::where('due_amount_type',0)->where('consultant_id',auth()->user()->id)->get()->first();
            $orders = Order::where('payment_type',3)->where('user_id',auth()->user()->id)->get();
            // dd($orders);
            return view('consultant.dues.index')->with('dues',$dues)->with('id',1)->with('orders',$orders);
        }
        if($id==2)
        {
            $prDues = ConsultantDues::where('due_amount_type',1)->where('consultant_id',auth()->user()->id)->get()->first();
            $orders = Order::where('payment_type',4)->where('user_id',auth()->user()->id)->get();
            return view('consultant.dues.index')->with('prDues',$prDues)->with('id',2)->with('orders',$orders);
        }

    }

    public function pay(Request $request)
    {
        $userId = $request->userId;
        $due_type = $request->due_type;
        $amount=$request->amount;

        $dues = ConsultantDues::where('due_amount_type',$due_type)->where('consultant_id', $userId)->first();


         if ($dues != null) {
            $dues->paid_amount= $dues->paid_amount+$amount;
            $dues->due_amount= $dues->due_amount-$amount;
            $dues->temp_client_count=0;
            $dues->save();
            $site = config('get.WEBSITE_LINK');
            $support_email = config('get.ADMIN_EMAIL');
            if(isset(auth()->user()->email))
            {
            // Important Code
            $replacement['ROLE'] = 'Consultant';
            $replacement['SERVICE_NAME'] = 'Dues';
            $replacement['SERVICE_DETAIL'] = 'Paid Amount: '.$request->amount;
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
         }



        return  response("success");
    }
}
