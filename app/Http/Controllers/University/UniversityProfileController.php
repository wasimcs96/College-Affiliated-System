<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use App\Models\University;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UniversityProfileController extends Controller
{


    public function profile()
    {
        $id = Auth()->user()->id;
        $user=User::where('id',$id)->first();
        return view('university.profile')->with('user',$user)->with('countries',Country::all());
    }



        // return view('university.profile');


    public function profileStore(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'university_name'=>'required',

            'email' => 'required|email',
            // 'mobile'=>'required|unique:users',
            'landline_1'=>'required',
            'landline_2' => 'required',
             ]);
            $id = Auth()->user()->id;
             $user = User::find($id);
             $ip = '31.220.50.163';
             $data = \Location::get($ip);
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
              $university=auth()->user()->university;

              $university->fill([
                 'user_id'=>$user->id,
                 'university_name'=>$request->university_name,
                 'website'=>$request->website,
                 'type'=>$request->type
             ]);

             $university->save();

             return redirect()->route('university.profile')->with('success','Profile Updated successfully');
    }

}
