<?php

namespace App\Http\Controllers\FrontEndController;

use App\Models\User;
use App\Models\Consultant;
use App\Models\UniversityConsultant;
use App\Models\University;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ConsultantAvailableSlots;
use App\Models\UniversityCourse;
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

    public function book(Request $request)
    {
        // dd($request->all());
        $universityid = $request->get('universityid');
        $consultantid = $request->get('consultantid');
        $consultant = Consultant::find($consultantid);
        return view('frontEnd.consultant.book',compact('universityid'))->with('consultant', $consultant)->with('countries',Country::all());

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

    function fetch_Course(Request $request)
    {
        $fetch=University::where('id',$request->universityid)->first();
        $courses =  $fetch->UniversityCourse;


        $output='';
        foreach($courses as $row)
        {
         $output .= '<option value="'.$row->Course->id.'">'.$row->Course->name.'</option>';
        }
        echo $output;
        // dd();
    }


    public function book_store(Request $request)
    {
        $time = explode("-" ,$request->start_time);
        $start_time = $time[0];
        $end_time = $time[1];
        // dd($time[1]);
        // dd($request->all());
        // dd($request->uid);
        $bookind_date=strtotime($request->booking_date);
        $bookind_date= date('Y-m-d');
// dd($bookind_date);
        $json = json_encode($request->banner_images);
        // dd($json);
        $consultantBooking = Booking::create([
            'booking_start_time'=>$start_time,
            'booking_end_time'=>$end_time,
            'client_id'=>$request->client_id,
            'consultant_id'=>$request->cid,
            'enquiry'=>$json,
            'booking_date'=>$bookind_date,
            // 'comments'=>$request->comment,
            'status'=>0,
            'booking_for'=>0,
            ]);
            return redirect()->route('client.dashboard')->with('success','Your Application have been Submitted Successfully');

    }


}
