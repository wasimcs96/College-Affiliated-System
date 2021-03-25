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
        $page=1;
       return view('frontEnd.university.university_all',compact('page'))->with('universities',User::where('status',1)->get());
     }

     public function detail($id)
     {
        // dd($id);
        $universities = [];
        $ata = [];
        $str = file_get_contents('https://api.ipify.org?format=json');
        $json = json_decode($str, true);

        $data = \Location::get($json["ip"]);
        // dd($data->latitude);
        // $ip = request()->ip;
        // $data = \Location::get($ip);

        // dd($data->latitude);
        $ata['latitude']  =  $data->latitude ?? '';
        $ata['longitude'] =$data->longitude ?? '';
        $radius=50;
        $query = User::where('status',1)->where('id', $id)->pluck('id');
        $universityConsultant=UniversityConsultant::whereIn('university_id',$query)->pluck('consultant_id');

        $consultants=User::where('status',1)->whereIn('id',$universityConsultant)->get();

        foreach ($consultants as $key => $que) {
            $R = 3958.8; // Radius of the Earth in miles

            $rlat1 = floatval($ata['latitude']) * (pi()/180); // Convert degrees to radians
            $rlat2 = floatval($que->latitude) * (pi()/180);
            $difflat = $rlat2-$rlat1; // Radian difference (latitudes)
            $difflon = (floatval($que->longitude)-floatval($ata['longitude'])) * (pi()/180); // Radian difference (longitudes)

            $d = 2 * $R * asin(sqrt(sin($difflat/2)*sin($difflat/2)+cos($rlat1)*cos($rlat2)*sin($difflon/2)*sin($difflon/2)));
            // dd($d);
            if(floatval($radius) >= $d){
                $universities[$key] = $que;
            }
        }
        $detail = User::find($id);
// dd(auth()->user()->id);
        if (auth()->user()) {
            # code...
        if (Auth()->User()->isConsultant()) {
            $universityconsultant = UniversityConsultant::where('university_id',$id)->where('consultant_id',auth()->user()->id)->first();
            // dd($universityconsultant);
            return view('frontEnd.university.university_detail',compact('universityconsultant'))->with('university',$detail)->with('nearByConsultants',$universities);
        }
    }

        return view('frontEnd.university.university_detail')->with('university',$detail)->with('consultants',Consultant::all())->with('nearByConsultants',$universities);


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
