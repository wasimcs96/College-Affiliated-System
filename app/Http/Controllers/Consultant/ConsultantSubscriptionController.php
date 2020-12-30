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
        $subscription=Order::where('user_id',$ua)->where('payment_type', 0 )->get();
        dd($subscription);
        $packages=Package::where('package_type', 0)->get();
        return view('consultant.subscription.subscription')->with('packages',$packages);
    }
}
