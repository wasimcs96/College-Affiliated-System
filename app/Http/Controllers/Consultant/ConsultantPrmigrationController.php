<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use App\Models\Country;
use App\Models\Consultant;

class ConsultantPrmigrationController extends Controller

{
    public function index(){

            $countries=Country::all();
            $cc =auth()->user()->consultantPrMigrationCountry->country_id;

            $consultantCountries=explode(",",$cc);

            //  dd($consultantCountries);
            return view('consultant.prmigration.prmigration',compact('countries', 'consultantCountries'));
       }

       public function store(Request $request){
        $au=auth()->user()->id;
        $consultant = ConsultantPrMigrationCountry::where('user_id',$au)->get()->first();
        if($consultant == null)
        {
        // $json=json_encode($request->country);
        $json= collect($request->country)->implode(',');
        // dd($json);
        $prmigration=ConsultantPrMigrationCountry::create([
        'user_id' => $au ,
        'country_id'=> $json,
        ]);
            $countries=Country::all();
            return redirect(compact('countries'))->back()->with('success', 'Profile Updated Succefully.');
        }
        else
        {
            $json=collect($request->country)->implode(',');
            $consultant->country_id = $json;
            $consultant->save();

            return redirect()->back()->with('success', 'Profile Updated Succefully.');
        }
       }

}
