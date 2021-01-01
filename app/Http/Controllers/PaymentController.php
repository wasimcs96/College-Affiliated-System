<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use  App\Models\Order;
use  App\Models\OrderItem;

class PaymentController extends Controller
{
    //409ACfFYI6hON1ZmCThrD7nN
    //rzp_test_6PaQ95AP7ZPT1S

    function payment(Request $request)
    {
        $api = new Api('rzp_test_6PaQ95AP7ZPT1S', '409ACfFYI6hON1ZmCThrD7nN');
        $amount = $request->amount;
        $userId = $request->user_id;
        $type = $request->payment_type;
        $title = $request->title ?? '';
        $name = auth()->user()->first_name . (auth()->user()->id);
        $order  = $api->order->create([
            'receipt'         => $title,
            'amount'          => $amount * 100, // amount in the smallest currency unit
            'currency'        => 'INR', // <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
        ]);
        $orderId = $order['id'];
        Session::put('orderId', $orderId);
        Session::put('amount', $amount);
        Session::put('userId', $userId);
        Session::put('type', $type);
        Session::put('title', $title);
        
        return redirect(route('admin.subscription'));
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
      

        $orderID = $order->id;
        OrderItem::create([
            'order_id' => $orderID,
            'item_title' => $request->title,
        ]);


        
        return "success";
    }
}
