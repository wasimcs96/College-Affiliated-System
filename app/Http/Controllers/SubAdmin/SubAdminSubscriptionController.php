<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class SubAdminSubscriptionController extends Controller
{
    public function index()
    {
        $packages=Package::where('package_type', 0)->orderBy('updated_at', 'DESC')->get();
        return view('admin.subscription.index')->with('packages',$packages);
    }
}
