<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Order;

class ConsultantSubscriptionController extends Controller
{
    public function index()
    {

        $ua=auth()->user()->id;

        // dd($subscriptions);
        $subscriptions= Order::where('user_id',$ua)->where('payment_type', 0 )->orderBy('updated_at', 'DESC')->get();
        // dd($subscriptions);

        return view('consultant.subscription.subscription',compact('subscriptions'));
    }

    public function add()
    {



        // dd($subscriptions);
        // Order::where('user_id',$ua)->where('payment_type', 0 )->get();
        // dd($subscription);
        $packages=Package::where('package_type', 0)->get();
        return view('consultant.subscription.subscription_add')->with('packages',$packages);
    }
}
