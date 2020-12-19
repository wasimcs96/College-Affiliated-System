<?php

namespace App\Http\Controllers\FrontEndController;

use App\Models\User;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityMedia;
use App\Models\UniversityConsultant;
use App\Models\Consultant;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UniversityFrontController extends Controller
{
    public function index()
    {
       return view('frontEnd.university.university_all')->with('universities',University::all());
     }

     public function detail($id)
     {

        $detail = University::find($id);

        if (auth()->user()) {
            # code...
        if (Auth()->User()->isConsultant()) {
            $universityconsultant = UniversityConsultant::where('university_id',$id)->where('consultant_id',auth()->user()->consultant->id)->first();
            // dd($universityconsultant);
            return view('frontEnd.university.university_detail',compact('universityconsultant'))->with('university',$detail);
        }
    }

        return view('frontEnd.university.university_detail')->with('university',$detail)->with('consultants',Consultant::all());


                                                            // ->with('medias',UniversityMedia::where($id));
      }

      public function consultant(Request $request)
      {
// dd($request->all());
        //  $consultant = University::find($id);

        //  return view('frontEnd.university.university_detail')->with('university',$consultant);

        //                                                     //  ->with('medias',UniversityMedia::where($id));
$uc = UniversityConsultant::create([
'university_id'=>$request->university_id,
'consultant_id'=>$request->consultant_id,
'status'=>0
]);
return response('success');

       }
}
