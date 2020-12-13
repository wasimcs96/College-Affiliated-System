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


            function SplitTime($StartTime, $EndTime, $Duration="30"){
                $ReturnArray = array ();// Define output
                $StartTime    = strtotime ($StartTime); //Get Timestamp
                $EndTime      = strtotime ($EndTime); //Get Timestamp

                $AddMins  = $Duration * 60;

                while ($StartTime <= $EndTime) //Run loop
                {
                    // dd($StartTime);
                    $ReturnArray[] = date ("G:i", $StartTime);
                    $StartTime += $AddMins; //Endtime check
                }
                return $ReturnArray;
            }
            $startTime = $request->start_time;
            $endTime = $request->end_time;
            //Calling the function
            $data = SplitTime($startTime, $endTime, "30");

            foreach($data as $ti){

                $vr=strtotime($ti);
                // $cr=;
                ConsultantAvailableSlots::create([
                'consultant_id'=>auth()->user()->consultant->id,
                'week_day'=>1,
                'start_slot_time'=>$ti,
                'end_slot_time'=>date ("G:i", $vr+1800),
                'status'=>1
                ]);
            }

             return redirect()->route('consultant.profile')->with('success','Profile Updated successfully');
    }
}
