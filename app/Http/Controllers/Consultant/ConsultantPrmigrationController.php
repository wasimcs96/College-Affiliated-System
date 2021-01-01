<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use App\Models\Country;

class ConsultantPrmigrationController extends Controller

{
    public function index(){

        $countries=Country::all();

           return view('consultant.prmigration.prmigration',compact('countries'));
       }

       public function store(Request $request){
        $au=auth()->user()->id;
        $prs=$request->country;
            foreach($prs as $pr){
        $prmigration=ConsultantPrMigrationCountry::create([
                'user_id' => $au ,

                'country_id'=> $pr,
                ]);
            }
            $countries=Country::all();
            return   view('consultant.prmigration.prmigration',compact('countries'))->with('Success');

       }

}
