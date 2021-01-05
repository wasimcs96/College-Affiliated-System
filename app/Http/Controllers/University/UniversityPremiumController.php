<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Order;
class UniversityPremiumController extends Controller
{
    public function index()
    {
        $cp=auth()->user()->id;


        $premiums = Order::where('user_id',$cp)->where('payment_type', 1 )->orderBy('updated_at', 'DESC')->get();

// dd($premiums);

        return view('university.premium.premium',compact('premiums'));
    }


    public function add()
    {

        $packages=Package::where('package_type', 1)->orderBy('updated_at', 'DESC')->get();
        return view('university.premium.gopremium')->with('packages',$packages);
    }
}
