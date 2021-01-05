<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class UniversityPremiumController extends Controller
{
    public function index()
    {

        $packages=Package::where('package_type', 1)->orderBy('updated_at', 'DESC')->get();
        return view('university.go_premium')->with('packages',$packages);
    }
}
