<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use App\Models\User;
class PrMigrationFrontController extends Controller
{
    public function index()
    {
        return view('frontEnd.prmigration.prmigration')->with('consultants',User::all());;
    }

    Public function search(Request $request)
    {
        // dd($request->all());
        $consultants=ConsultantPrMigrationCountry::where('country_id',$request->country)->get();
        return view('frontEnd.prmigration.prmigration',compact('consultants'));
    }
}
