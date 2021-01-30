<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Order;

class SubAdminEarningController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('updated_at', 'DESC')->get();
        return view('admin.earning.earning')->with('orders',$orders);
    }

    public function show($id)
    {
        $order=Order::where('id',$id)->orderBy('updated_at', 'DESC')->get()->first();
        return view('admin.earning.earning_show')->with('order',$order);
    }
}
