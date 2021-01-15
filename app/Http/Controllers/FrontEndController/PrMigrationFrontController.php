<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use DB;
use App\Models\User;
use App\models\Booking;
use App\Models\ConsultantAvailableSlots;

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

        public function book($id)
        {
            $consultant = User::find($id);
            return view('frontEnd.prmigration.prmigration_book')->with('consultant',$consultant);
        }

        function slots(Request $request)
        {
            // dd($request->all());


            $dat=date('m-d-Y');

            $select = $request->get('select');
            $value = $request->get('value');

            $consultantid = $request->get('consultantid');
            $dt=strtotime($value);

                $vr=date('w',$dt);

                $data = ConsultantAvailableSlots::where('user_id',$consultantid)->where('week_day',$vr)->get();


                $output='';
                foreach($data as $row)
                {

                 $output .= '<option value="'.$row->start_slot_time.'-'.$row->end_slot_time.'">'.$row->start_slot_time.'-'.$row->end_slot_time.'</option>';
                }
                echo $output;


        }


    public function book_store(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
        'start_time'=>'required',
        'booking_date'=>'required',
        'country' => 'required',

         ]);


        $time = explode("-" ,$request->start_time);
        $start_time = $time[0];
        $end_time = $time[1];
        // dd($time[1]);
        // dd($request->all());
        // dd($request->uid);
        $bookind_date=strtotime($request->booking_date);
        $bookind_date= date('Y-m-d');
// dd($bookind_date);
        // $json = json_encode($request->country);
        // dd($json);
        $consultantBooking = Booking::create([
            'booking_start_time'=>$start_time,
            'booking_end_time'=>$end_time,
            'client_id'=>$request->client_id,
            'consultant_id'=>$request->cid,
            'country_id'=>$request->country,

            'booking_date'=>$bookind_date,
            // 'comments'=>$request->comment,
            'status'=>0,
            'booking_for'=>1,
            ]);
            return redirect()->route('client.dashboard')->with('success','Your Application have been Submitted Successfully');

    }

}
