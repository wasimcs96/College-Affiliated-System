<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use DB;
use App\Models\User;
use App\models\Booking;
use App\models\ConsultantDues;
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
        $countrycoming=$request->country;
        $total=[];
        $consultants=DB::table("consultant_pr_migration_countries")
        ->whereRaw("find_in_set('$countrycoming',country_id)")

        ->get();

        foreach ($consultants as $key => $value) {

            $us= User::find($value->user_id);
                $consultants[$key]= $us;
        }

            return view('frontEnd.prmigration.prmigration',compact('consultants','countrycoming'));
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
            'countries_id'=>$request->country,

            'booking_date'=>$bookind_date,
            // 'comments'=>$request->comment,
            'status'=>0,
            'booking_for'=>1,
            ]);
            $type=1;
            $slug='pr_amount';
            $consultant_id=$request->cid;
            $check = $this->consultantDue($type,$slug,$consultant_id);
            return redirect()->route('client.dashboard')->with('success','Your Application have been Submitted Successfully');

    }

    public function consultantDue($amountType,$slug,$consultant_id)
    {
        $consultant = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get()->first();

        $alreadyDue = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get('due_amount')->first();
        $alreadyClient = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get()->first();

        $dueAmount = DB::table('settings')->where('slug',$slug)->get('config_value')->first();

if(isset($dueAmount))
{
        if($consultant==null)
        {
           // dd(auth()->user()->id);
          $newConsultant = ConsultantDues::create([

               'due_amount' => $dueAmount->config_value,
               'paid_amount' => 0,
               'consultant_id' => auth()->user()->id,
               'total_client_count' => 1,
               'temp_client_count' => 1,
               'due_amount_type' => $amountType
           ]);

           return response('success');
        }
        else
        {
            $consultant->consultant_id = $consultant_id;
            $consultant->due_amount = $dueAmount->config_value+$alreadyDue->due_amount;
            $consultant->paid_amount = $alreadyClient->paid_amount;
            $consultant->total_client_count = $alreadyClient->total_client_count+1;
            $consultant->temp_client_count = $alreadyClient->temp_client_count+1;
            $consultant->due_amount_type = 1;
            $consultant->save();
            return $consultant;
        }
    }
       return response('success');
    }

}
