<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class ConsultantSubscriptionController extends Controller
{
    public function index()
    {
        $packages=Package::where('package_type', 0)->get();
        return view('consultant.subscription')->with('packages',$packages);
    }
}
