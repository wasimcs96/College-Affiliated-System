<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantDues;
use App\Models\Order;
use App\Http\Controllers\PaymentController;


class ConsultantDuesController extends Controller
{
    public function index($id)
    {
        if($id==1)
        {
            $dues = ConsultantDues::where('due_amount_type',0)->get()->first();
            $orders = Order::where('payment_type',3)->where('user_id',auth()->user()->id)->get();
            // dd($orders);
            return view('consultant.dues.index')->with('dues',$dues)->with('id',1)->with('orders',$orders);
        }
        if($id==2)
        {
            $prDues = ConsultantDues::where('due_amount_type',1)->get()->first();
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
            // Important Code
            // $replacement['ROLE'] = Consultant;
            // $replacement['SERVICE_NAME'] = Dues;
            // $replacement['SERVICE_DETAIL'] = Paid Amount: $request->amount;
            // $data = ['template'=>'consultant-services','hooksVars' => $replacement];
            // mail::to(auth()->user()->email)->send(new \App\Mail\ManuMailer($data));
         }



        return  response("success");
    }
}
