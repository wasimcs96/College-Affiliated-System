<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantDues;
use App\Models\Order;
class ConsultantDuesController extends Controller
{
    public function index()
    {
        $dues = ConsultantDues::all()->first();
        return view('consultant.dues.index')->with('dues',$dues);
    }

    public function add()
    {
        $packages=Package::where('package_type', 1)->get();
        return view('consultant.premium.gopremium')->with('packages',$packages);
    }
}
