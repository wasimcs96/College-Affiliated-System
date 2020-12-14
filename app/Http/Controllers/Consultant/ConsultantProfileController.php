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
use Illuminate\Database\Eloquent\Collection;
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
             $ip = '31.220.50.163';
             $data = \Location::get($ip);
            //  dd($data->latitude);
             if($request->hasFile('profile_image'))
              {
                 $profile_image = $request->profile_image;
                 $profile_image_new_name = time().$profile_image->getClientOriginalName();
                 $profile_image->move('uploads/client',$profile_image_new_name);
                 $user->profile_image = 'uploads/client/'.$profile_image_new_name;
              }

             $user->fill($request->all());
             $user->latitude = $data->latitude;
             $user->longitude = $data->longitude;
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
                $ReturnArray  =  array ();// Defined the output
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
            $consultant_id = auth()->user()->consultant->id;
            $consultant_slot = ConsultantAvailableSlots::where('consultant_id',$consultant_id)->first();
            $startTime = $request->start_time;
            $endTime = $request->end_time;
            //Calling the function
            $data = SplitTime($startTime, $endTime, "30");


                // $cr=;
                if ($consultant_slot == null) {
                    $week_days=explode(",", auth()->user()->consultant->working_week_days);
                    foreach($week_days as $week_day){
                    foreach($data as $st){

                        $stw=strtotime($st);

                        $startTime=date ("G:i", $stw);
                        $et=strtotime($st);
                        $endTimeNew=date ("G:i", $et+1800);
                        $etc = strtotime($endTime);
                        $endTimeCheck=date ("G:i", $etc+1800);

                        if ($endTimeNew == $endTimeCheck){

                            break;
                         }


                ConsultantAvailableSlots::create([
                'consultant_id'=>auth()->user()->consultant->id,
                'week_day'=>$week_day,
                'start_slot_time'=>$st,
                'end_slot_time'=>$endTimeNew,
                'status'=>1
                ]);

            }

        }
    }

                else{
                    // $consultant_slot->delete();
                    $consultant_delete =auth()->user()->consultant->consultantSlots;
// dd($consultant_delete);
foreach ($consultant_delete as $key => $value) {
$value->delete();
}


                    //     $vr=strtotime($ti);
                    //     $endTime=date ("G:i", $vr+1800);
                    //     // dd($endTime);

                    // $consultant_slot->consultant_id = auth()->user()->consultant->id;
                    // $consultant_slot->week_day= 1;
                    // $consultant_slot->start_slot_time = $ti;

                    // $consultant_slot->end_slot_time = date ("G:i", $vr+1800);

                    // $consultant_slot->status = 1;
                    // $consultant_slot->save();
                    $week_days=explode(",", auth()->user()->consultant->working_week_days);
                    foreach($week_days as $week_day){
                    foreach($data as $st){

                        $stw=strtotime($st);

                        $startTime=date ("G:i", $stw);
                        $et=strtotime($st);
                        $endTimeNew=date ("G:i", $et+1800);
                        $etc = strtotime($endTime);
                        $endTimeCheck=date ("G:i", $etc+1800);

                        if ($endTimeNew == $endTimeCheck){

                            break;
                         }


                         ConsultantAvailableSlots::create([
                            'consultant_id'=>auth()->user()->consultant->id,
                            'week_day'=>$week_day,
                            'start_slot_time'=>$st,
                            'end_slot_time'=>$endTimeNew,
                            'status'=>1
                            ]);
                // ConsultantAvailableSlots::update([
                // 'consultant_id'=>auth()->user()->consultant->id,
                // 'week_day'=>$week_day,
                // 'start_slot_time'=>$st,
                // 'end_slot_time'=>$endTimeNew,
                // 'status'=>1
                // ]);

            }

        }

            }

             return redirect()->route('consultant.profile')->with('success','Profile Updated successfully');
    }
}
