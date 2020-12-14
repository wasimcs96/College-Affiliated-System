<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ClientProfileController extends Controller
{


    public function profile()
    {
$id = Auth()->user()->id;
        $user=User::where('id',$id)->first();
        return view('client.profile')->with('user',$user)->with('countries',Country::all());
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
           'latitude' => 'required',
            'longitude'=>'required',

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

             return redirect()->route('client.profile')->with('success','Profile Updated successfully');
    }
}
