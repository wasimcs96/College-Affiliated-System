<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use App\Models\Country;

class AdminPrmigationController extends Controller
{
   public function index(){

    $countries=Country::all();

       return view('admin.prmigration.prmigration',compact('countries'));
   }

//    public function store(Request $request){
//     // dd($request->all());
//         $prs=$request->country;
//         foreach($prs as $pr){
//     $prmigration=ConsultantPrMigrationCountry::create([
//             'user_id' => $request->user_id ,

//             'country_id'=> $pr,
//             ]);
//         }
//        return response('success');
//    }

}
