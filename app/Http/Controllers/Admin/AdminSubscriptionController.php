<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        $packages=Package::where('package_type', 0)->get();
        return view('admin.subscription.index')->with('packages',$packages);
    }
}
