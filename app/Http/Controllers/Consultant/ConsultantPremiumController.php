<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Order;
class ConsultantPremiumController extends Controller
{
    public function index()
    {
        $cp=auth()->user()->id;


        $premiums = Order::where('user_id',$cp)->where('payment_type', 1 )->orderBy('updated_at', 'DESC')->get();

// dd($premiums);

        return view('consultant.premium.premium',compact('premiums'));
    }


    public function add()
    {
        $packages=Package::where('package_type', 1)->get();
        return view('consultant.premium.gopremium')->with('packages',$packages);
    }
}
