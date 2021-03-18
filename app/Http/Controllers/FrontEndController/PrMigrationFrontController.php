<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use App\Models\Country;
use App\Models\ConsultantDues;
use App\Models\ConsultantAvailableSlots;

class PrMigrationFrontController extends Controller
{
    public function index()
    {
        return view('frontEnd.prmigration.prmigration')->with('consultants',User::all());;
    }

    public function search(Request $request)
    {
        // dd($request->country);
        // $request->country=19;
        $countrycoming=$request->country ?? '';
        $countries= $request->country ?? '';
        $total=[];
        $consultants=DB::table("consultant_pr_migration_countries")
        ->whereRaw("find_in_set('$countrycoming',country_id)")

        ->get();

        foreach ($consultants as $key => $value) {

            $us= User::find($value->user_id);
                $consultants[$key]= $us;
        }

            return view('frontEnd.prmigration.prmigration',compact('consultants','countrycoming'))->with('country',$countries);
        }

        public function book($consultantId,$countryId)
        {
            //  dd($request->all());
            $consultant = $consultantId ?? '';
            $countrycoming = $countryId ?? '';
            $consultant = User::find($consultant)  ;
            return view('frontEnd.prmigration.prmigration_book',compact('countrycoming'))->with('consultant',$consultant);
        }

        function slots(Request $request)
        {
            // dd($request->all());
            $datanew=[];

            $dat=date('m-d-Y');

            $select = $request->get('select');
            $value = $request->get('value');
            $consultantid = $request->get('consultantid');
            
            /////////////////////////////
          
            $dt=strtotime($value);
            $vr=date('w',$dt);
          
            $check = date('Y-m-d', $dt);
            //  dd($check);
            $bookings = Booking::where('booking_date', $check)->where('status','!=',3)->get();
            if ($bookings->count() > 0) {
    
    
            foreach ($bookings as $key => $booking) {
                
    
                $datanew[] = "'.$booking->booking_start_time.'-'.$booking->booking_end_time.'";
            }
              }
    
            
            
            ////////////////////////////////

           

               

                $data = ConsultantAvailableSlots::where('user_id',$consultantid)->where('week_day',$vr)->get();


                $output='';

                if($data->count()>0){
                foreach($data as $row)
                {
                    $time = "'.$row->start_slot_time.'-'.$row->end_slot_time.'";
                    if (in_array($time, $datanew)) {
                        $message = "disabled='disabled'";
                    } else {
                        $message = "";
                    }
                 $output .= '<option ' . $message . ' value="'.$row->start_slot_time.'-'.$row->end_slot_time.'">'.$row->start_slot_time.'-'.$row->end_slot_time.'</option>';
                }
            }else{
                $output .= '<option > Slots Not Available</option>';
            }
                echo $output;


        }


    public function book_store(Request $request)
    {
//  dd($request->all());
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
        $bookind_date=$request->booking_date;
        // dd($request->booking_date);
        $newDate = date("Y-m-d", strtotime($bookind_date));
    //    $date = $bookind_date->format('Y-m-d');
        // dd($bookind_date);
                // $json = json_encode($request->country);
        // dd($json);
        $consultantBooking = Booking::create([
            'booking_start_time'=>$start_time,
            'booking_end_time'=>$end_time,
            'client_id'=>$request->client_id,
            'consultant_id'=>$request->cid,
            'countries_id'=>$request->country,
            'booking_date'=>$newDate,
            // 'comments'=>$request->comment,
            'status'=>1,
            'booking_for'=>1,
            ]);
            $type=1;
            $slug='PR_COMMISSION';
        //     $consultant_id=$request->cid;
        //     $check = $this->consultantDue($type,$slug,$consultant_id);
        //     // dd($request->cid);
        //     $consultant = User::where('id',$request->cid)->first();
        //     $id=$consultantBooking->id;
        //    // Important Code
        //       $replacement['CONSULTANT_NAME'] = $consultant->first_name.' '.$consultant->last_name;
        //       $replacement['STUDENT_NAME'] = auth()->user()->first_name.' '.auth()->user()->last_name;
        //       $replacement['ADDRESS'] = $consultant->address_1;
        //       $replacement['SERVICE_NAME'] = 'PR Booking';
        //       $replacement['BOOKING_LINK'] = 'https://campusinterest.com/client/bookings/show/'.$id;
        //       $data = ['template'=>'booking','hooksVars' => $replacement];
        //       mail::to(auth()->user()->email)->send(new \App\Mail\ManuMailer($data));
        //       mail::to($consultant->email)->send(new \App\Mail\ManuMailer($data));
            return redirect()->route('client.dashboard')->with('success','Your Application have been Submitted Successfully');

    }

//     public function consultantDue($amountType,$slug,$consultant_id)
//     {
//         $consultant = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get()->first();

//         $alreadyDue = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get('due_amount')->first();
//         $alreadyClient = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get()->first();

//         $dueAmount = DB::table('settings')->where('slug',$slug)->get('config_value')->first();

// if(isset($dueAmount))
// {
//         if($consultant==null)
//         {
//            // dd(auth()->user()->id);
//           $newConsultant = ConsultantDues::create([

//                'due_amount' => $dueAmount->config_value,
//                'paid_amount' => 0,
//                'consultant_id' => auth()->user()->id,
//                'total_client_count' => 1,
//                'temp_client_count' => 1,
//                'due_amount_type' => $amountType
//            ]);

//            return response('success');
//         }
//         else
//         {
//             $consultant->consultant_id = $consultant_id;
//             $consultant->due_amount = $dueAmount->config_value+$alreadyDue->due_amount;
//             $consultant->paid_amount = $alreadyClient->paid_amount;
//             $consultant->total_client_count = $alreadyClient->total_client_count+1;
//             $consultant->temp_client_count = $alreadyClient->temp_client_count+1;
//             $consultant->due_amount_type = 1;
//             $consultant->save();
//             return $consultant;
//         }
//     }
//        return response('success');
//     }


    public function consultantDue($amountType,$slug,$consultant_id)
    {
        $consultant = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get()->first();

        $alreadyDue = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->get('due_amount')->first();
        $alreadyClient = ConsultantDues::where('consultant_id',$consultant_id)->where('due_amount_type',1)->first();

        $dueAmount = DB::table('settings')->where('slug',$slug)->get('config_value')->first();

   if(isset($dueAmount->config_value))
   {
        if($consultant==null )
        {
           // dd(auth()->user()->id);
          $newConsultant = ConsultantDues::create([

               'due_amount' => $dueAmount->config_value,
               'paid_amount' => 0,
               'consultant_id' => $consultant_id,
               'total_client_count' => 1,
               'temp_client_count' => 1,
               'due_amount_type' => 1
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
       return response('success');
       }
       else
       {
           return response('success');
       }
    }
}
