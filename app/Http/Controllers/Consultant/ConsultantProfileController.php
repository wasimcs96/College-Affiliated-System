<?php

namespace App\Http\Controllers\Consultant;

use App\Models\User;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\ConsultantAvailableSlots;
use App\Http\Controllers\Controller;
use Sessions;
use DateTime;
use Config;
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
        $cc =auth()->user()->consultantPrMigrationCountry->country_id;

        $consultantCountries=json_decode($cc);
        return view('consultant.profile',compact('consultantCountries'))->with('user',$user)->with('countries',Country::all());
    }

    public function profileStore(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email',
            'mobile'=>'numeric|required',
            'landline_1'=>'required',
            'landline_2' => 'required',
            'website' => 'required|url',
             ]);
             $id = Auth()->user()->id;
             $user = User::find($id);
             $ip = '31.220.50.163';
             $data = \Location::get($ip);

            if($request->hasFile('profile_image'))
                {
                    $profile_image = $request->profile_image;
                    $profile_image_new_name = time().$profile_image->getClientOriginalName();
                    $profile_image->move(Config::get('define.image.profile'),$profile_image_new_name);
                    $user->profile_image = Config::get('define.image.profile').'/'.$profile_image_new_name;
                    $user->save();
                }

                    $user->fill($request->all());
                    $user->latitude = $data->latitude;
                    $user->longitude = $data->longitude;
                    $user->save();
                $consultant = Consultant::where('user_id',$id)->first();
            if ($consultant == null)
                {
                    $consultantnew=Consultant::create([
                    'user_id' => $id,
                    'working_week_days' => collect($request->weekday)->implode(','),
                    'company_name' => $request->company_name,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'website' => $request->website,
                     ]);

                }
            else
            {
                $consultant->fill($request->all());
                $consultant->save();
                $consultant->user_id=$id;
                $consultant->working_week_days = collect($request->weekday)->implode(',');
                 $consultant->save();
            }

        function SplitTime($StartTime, $EndTime, $Duration="30")
            {
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
            $consultant_id = auth()->user()->id;
            $consultant_slot = ConsultantAvailableSlots::where('user_id',$consultant_id)->first();
            $startTime = $request->start_time;
            $endTime = $request->end_time;
            //Calling the function
            $data = SplitTime($startTime, $endTime, "30");
               // $cr=;
                if ($consultant_slot == null)
                {
                    $week_days=explode(",", auth()->user()->consultant->working_week_days);
                    foreach($week_days as $week_day)
                    {
                       foreach($data as $st)
                       {

                                $stw=strtotime($st);
                                $startTime=date ("G:i", $stw);
                                $et=strtotime($st);
                                $endTimeNew=date ("G:i", $et+1800);
                                $etc = strtotime($endTime);
                                $endTimeCheck=date ("G:i", $etc+1800);

                            if ($endTimeNew == $endTimeCheck)
                            {
                                break;
                            }
                                ConsultantAvailableSlots::create([
                                'user_id'=>auth()->user()->id,
                                'week_day'=>$week_day,
                                'start_slot_time'=>$st,
                                'end_slot_time'=>$endTimeNew,
                                'status'=>1
                                ]);

                        }
                    }
                }

                else
                {
                    $consultant_delete =auth()->user()->consultantSlots;
                    foreach ($consultant_delete as $key => $value)
                    {
                           $value->delete();
                    }

                    $week_days=explode(",", auth()->user()->consultant->working_week_days);
                    foreach($week_days as $week_day)
                    {
                        foreach($data as $st)
                        {
                            $stw=strtotime($st);
                            $startTime=date ("G:i", $stw);
                            $et=strtotime($st);
                            $endTimeNew=date ("G:i", $et+1800);
                            $etc = strtotime($endTime);
                            $endTimeCheck=date ("G:i", $etc+1800);

                            if ($endTimeNew == $endTimeCheck)
                            {
                                break;
                            }
                            ConsultantAvailableSlots::create([
                            'user_id'=>auth()->user()->id,
                            'week_day'=>$week_day,
                            'start_slot_time'=>$st,
                            'end_slot_time'=>$endTimeNew,
                            'status'=>1
                            ]);
                        }
                    }
                }

             return redirect()->route('consultant.profile')->with('success','Profile Updated successfully');
    }
}
