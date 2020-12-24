<?php

namespace App\Http\Controllers\FrontEndController;

use App\Models\User;
use App\Models\Consultant;
use App\Models\UniversityConsultant;
use App\Models\University;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\ConsultantAvailableSlots;
use Sessions;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ConsultantFrontController extends Controller
{


    public function index_all()
    {
        return view('frontEnd.consultant.consultant_all')->with('consultants',Consultant::all());
    }

    public function index_single($id)
    {
        $consultant = Consultant::find($id);
        return view('frontEnd.consultant.consultant_detail')->with('consultant', $consultant);
    }

    public function book($id)

    {

        $consultant = Consultant::find($id);
// dd($consultant);
    //     $consultantuniversity= DB::table('university_consultants')->where('consultant_id',$id)->find(3);
    //   foreach($consultantuniversity as $conuni){
    //     dd($conuni->university_id);
    //   };
        // $consultantuniversity=UniversityConsultant::where('consultant_id',$id)->get();
        // dd( $consultantuniversity->university_id);
        // $universityconsultant=University::where('id',$consultantuniversity->university_id)->get();
        // dd($consultant->consultantUniversity->university);
        return view('frontEnd.consultant.book')->with('consultant', $consultant)->with('countries',Country::all());

    }
    function slots(Request $request)
    {


        $dat=date('m-d-Y');

        $select = $request->get('select');
        $value = $request->get('value');

        $consultantid = $request->get('consultantid');
        $dt=strtotime($value);

            $vr=date('w',$dt);

            $data = ConsultantAvailableSlots::where('consultant_id',$consultantid)->where('week_day',$vr)->get();


            $output='';
            foreach($data as $row)
            {

             $output .= '<option value="'.$row->start_slot_time.'-'.$row->end_slot_time.'">'.$row->start_slot_time.'-'.$row->end_slot_time.'</option>';
            }
            echo $output;


    }

}
