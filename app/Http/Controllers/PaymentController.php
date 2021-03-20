<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use  App\Models\Order;
use  App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;

use App\Models\UserPurchasedPlans;
use Carbon\Carbon;

class PaymentController extends Controller
{
    //409ACfFYI6hON1ZmCThrD7nN
    //rzp_test_6PaQ95AP7ZPT1S

    function payment(Request $request)
    {
        $api = new Api('rzp_test_6PaQ95AP7ZPT1S', '409ACfFYI6hON1ZmCThrD7nN');
        $amount = $request->amount;

        $userId = $request->user_id ?? auth()->user()->id;
        $type = $request->payment_type;
        $title = $request->title ?? '';
        $time = $request->package_time ?? '';
        $user = auth()->user();
        // dd(Carbon::now()->addMonth($time));



        $name = auth()->user()->first_name . (auth()->user()->id);
        $order  = $api->order->create([
            'receipt'         => $title,
            'amount'          => $amount * 100, // amount in the smallest currency unit
            'currency'        => 'USD', // <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
        ]);
        // dd($order);
        $orderId = $order['id'];
        Session::put('orderId', $orderId);
        Session::put('amount', $amount);
        Session::put('userId', $userId);
        Session::put('type', $type);
        Session::put('title', $title);


        $saif = $order->toArray();
        return response($saif);
    }

    function transaction(Request $request)
    {

        $order = Order::create([
            'user_id' => $request->userId,
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
            'transaction_id' => $request->transactionId,
            'status' => 1,
        ]);
        $order->save();


        $user = auth()->user();
        if ($request->payment_type == 0) {
            $time = $request->package_time;
            $user->Subscription_expire_date = Carbon::now()->addMonths($time);
            $user->save();

            $role = '';
            if(auth()->user()->isUniversity())
            {
                $role = 'University';
            }

            if(auth()->user()->isConsultant())
            {
                $role = 'Consultant';
            }
$consultantSubscription = Carbon::now()->addMonths($time);
$site = config('get.WEBSITE_LINK');
$support_email = config('get.ADMIN_EMAIL');
        if(isset(auth()->user()->email))
        {
            // Important Code
            $replacement['ROLE'] = $role;
            $replacement['SERVICE_NAME'] = 'Subscription';
            $replacement['SERVICE_DETAIL'] = 'Subscription Expire Date: '.$consultantSubscription;
            $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
            $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
            $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
            $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
            $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
            $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
            $replacement['SUPPORT_EMAIL'] = $support_email;
            $replacement['WEBSITE_LINK'] = 'https://campusinterest.com';
            $data = ['template'=>'consultant-services','hooksVars' => $replacement];
            mail::to(auth()->user()->email)->send(new \App\Mail\ManuMailer($data));
        }
        }

        if ($request->payment_type == 1) {
            $time = $request->package_time;
            $user->Premium_expire_date = Carbon::now()->addMonths($time);
            $user->save();
            $consultantPremium = Carbon::now()->addMonths($time);
            $site = config('get.WEBSITE_LINK');
            $support_email = config('get.ADMIN_EMAIL');
           if(auth()->user()->email)
           {
            // Important Code
                $replacement['ROLE'] = $role;
                $replacement['SERVICE_NAME'] ='Go Premium';
                $replacement['SERVICE_DETAIL'] = 'Premium Expire Date: '.$consultantPremium;
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
        }
        }


        $orderID = $order->id;
        OrderItem::create([
            'order_id' => $orderID,
            'item_title' => $request->title,
        ]);


        if ($request->payment_type == 0 || $request->payment_type == 1) {
            # code...
            //Important Code
            // $replacement['token'] =$request->_token;
            // $replacement['RESET_PASSWORD_URL'] = url("/admin/password/reset/{$request->token}");
            // $data = ['template'=>'welcome-email','hooksVars' => $replacement];
            // Mail::to("qsaif253@gmail.com")->send(new \App\Mail\ManuMailer($data));
            $start = Carbon::now();
            $end = $request->package_time ?? '';
            UserPurchasedPlans::create([
                'order_id' => $orderID,
                'item_title' => $request->title,
                'start_date' => $start,
                'end_date' => Carbon::now()->addMonths($end)
            ]);

        }
        return response($orderID);
    }
}
