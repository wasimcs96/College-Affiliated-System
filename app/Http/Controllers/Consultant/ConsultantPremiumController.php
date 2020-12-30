<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class ConsultantPremiumController extends Controller
{
    public function index()
    {
        $packages=Package::where('package_type', 1)->get();
        return view('consultant.gopremium')->with('packages',$packages);
    }
}
