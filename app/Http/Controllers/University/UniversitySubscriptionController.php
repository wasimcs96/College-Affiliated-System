<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class UniversitySubscriptionController extends Controller
{
    public function index()
    {
        $packages=Package::where('package_type', 0)->get();
        return view('university.subscription')->with('packages',$packages);
    }
}
