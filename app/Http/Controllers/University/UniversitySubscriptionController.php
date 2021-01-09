<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Order;
class UniversitySubscriptionController extends Controller
{
    public function index()
    {

        // $ua=auth()->user()->id;
// dd($ua);
        // dd($subscriptions);
        // $subscriptions= Order::where('user_id',$ua)->where('payment_type', 0 )->orderBy('updated_at', 'DESC')->get();
        // dd($subscriptions);

        return view('university.subscription.subscription');
    }

    public function add()
    {



        // dd($subscriptions);
        // Order::where('user_id',$ua)->where('payment_type', 0 )->get();
        // dd($subscription);
        $packages=Package::where('package_type', 0)->get();
        return view('university.subscription.subscription_add')->with('packages',$packages);
    }
}
