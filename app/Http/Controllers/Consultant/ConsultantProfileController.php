<?php

namespace App\Http\Controllers\Consultant;

use App\Models\User;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\ConsultantAvailableSlots;
use App\Http\Controllers\Controller;
use Sessions;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ConsultantProfileController extends Controller
{


    public function profile()
    {
$id = Auth()->user()->id;
        $user=User::where('id',$id)->first();
        return view('consultant.profile')->with('user',$user)->with('countries',Country::all());
    }

    public function profileStore(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email',
            'mobile'=>'required',
            'landline_1'=>'required',
            'landline_2' => 'required',
             ]);
            $id = Auth()->user()->id;
             $user = User::find($id);

             if($request->hasFile('profile_image'))
              {
                 $profile_image = $request->profile_image;
                 $profile_image_new_name = time().$profile_image->getClientOriginalName();
                 $profile_image->move('uploads/client',$profile_image_new_name);
                 $user->profile_image = 'uploads/client/'.$profile_image_new_name;
              }


            $user->fill($request->all());

             $user->save();
             $consultant = Consultant::where('user_id',$id)->first();

             if ($consultant == null) {
                 # code...
                 $consultantnew=Consultant::create($request->all());
                 $consultantnew->save();
                 $consultantnew->user_id=$id;
                 $consultant->working_week_days = collect($request->weekday)->implode(',');
                 $consultantnew->save();
                }
             else{
                $consultant->fill($request->all());
                $consultant->save();
                $consultant->user_id=$id;
                // $consultant->['working_week_days'] = $request->weekday;
                $consultant->working_week_days = collect($request->weekday)->implode(',');
                 $consultant->save();
             }

            //  $starttime = $request->start_time;  // your start time
            //  $endtime = $request->end_time;  // End time
            //  $duration = '60';  // split by 60 mins

            //  $array_of_time = array ();
            //  $start_time    = strtotime ($starttime); //change to strtotime
            //  $end_time      = strtotime ($endtime); //change to strtotime

            //  $add_mins  = $duration * 60;

            //  while ($start_time <= $end_time) // loop between time
            //  {
            //     $array_of_time[] = date ("h:i", $start_time);
            //     $start_time += $add_mins; // to check endtime
            //  }
            //  dd(collect($array_of_time));
            //  $consultant_slot = ConsultantAvailableSlots::where('consultant_id',$consultant->id)->first();
            // //  dd($consultant->id);
            //  if ($consultant_slot == null) {
            //     # code...
            //     $consultant_slotnew=ConsultantAvailableSlots::create($request->all());
            //     $consultant_slotnew->save();
            //     // $consultant_slotnew->user_id=$id;
            //     // $consultant_slot->working_week_days = collect($request->weekday)->implode(',');
            //     $consultantnew_slot->save();
            //    }
            // else{
            //    $consultant_slot->fill($request->all());
            //    $consultant_slot->save();
            //    $consultant_slot->user_id=$id;
            //    // $consultant->['working_week_days'] = $request->weekday;
            //    $consultant_slot->working_week_days = collect($request->weekday)->implode(',');
            //     $consultant_slot->save();
            // }
            // $consultant_slot = ConsultantAvailableSlots::where('consultant_id',$consultant->id)->first();
            $start = new DateTime($request->start_time);
            $end = new DateTime($request->end_time);
            $start_time = $start->format('H:i');
            $end_time = $end->format('H:i');
            $duration = 60;
            $i=0;
            // dd($start_time);
            while(strtotime($start_time) <= strtotime($end_time)){
                $start = $start_time;
                $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
                $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
                $i++;

                if(strtotime($start_time) <= strtotime($end_time)){
                    $time[$i]['start'] = $start;
                    $time[$i]['end'] = $end;
                }
            }


             return redirect()->route('consultant.profile')->with('success','Profile Updated successfully');
    }
}
