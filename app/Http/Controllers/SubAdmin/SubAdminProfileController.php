<?php

namespace App\Http\Controllers\SubAdmin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Sessions;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class SubAdminProfileController extends Controller
{


    public function profile()
    {

        return view('subadmin.profile')->with('countries',Country::all());
    }

    public function profileStore(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
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
            //   $admin = Admin::create([
            //     'name'=>$request->first_name,
            //     'email'=>$request->email,
            //     'password'=> Hash::make($request->password),
            //   ]);
             return redirect()->route('subadmin.profile')->with('success','Profile Updated successfully');
    }
}
