<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantDues;
use App\Models\Order;
use App\Http\Controllers\PaymentController;


class ConsultantDuesController extends Controller
{
    public function index()
    {
        $dues = ConsultantDues::all()->first();
        return view('consultant.dues.index')->with('dues', $dues);
    }

    public function add()
    {
        $packages = Package::where('package_type', 1)->get();
        return view('consultant.premium.gopremium')->with('packages', $packages);
    }
    public function pay(Request $request)
    {
        $amount = $request->amount;

        $pay = new PaymentController();
        $res = $pay->payment($request);
        return view('consultant.dues.pay')->with('order_detail', $res);
    }
}