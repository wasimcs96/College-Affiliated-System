<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use DB;
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
        // $request->country=19;
        $total=[];
        $consultants=DB::table("consultant_pr_migration_countries")
        ->whereRaw("find_in_set('$request->country',country_id)")

        ->get();

foreach ($consultants as $key => $value) {

   $us= User::find($value->user_id);
    $consultants[$key]= $us;
}
// dd($total);
        // dd($consultants);
        // $ex=explode(",",$consultants);
        // dd($ex);
        // $consultants=ConsultantPrMigrationCountry::where('country_id',$request->country)->get();
        return view('frontEnd.prmigration.prmigration',compact('consultants'));
    }
}
