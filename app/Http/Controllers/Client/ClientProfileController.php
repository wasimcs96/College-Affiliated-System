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

             if($request->hasFile('profile_image'))
              {
                 $profile_image = $request->profile_image;
                 $profile_image_new_name = time().$profile_image->getClientOriginalName();
                 $profile_image->move('uploads/client',$profile_image_new_name);
                 $user->profile_image = 'uploads/client/'.$profile_image_new_name;
              }

            //     $profile_image = $request->file('profile_image');
            //    $input['profile_image_new_name'] = time().'.'.getClientOriginalExtension();
            //    $destinationPath = public_path('uploads/client');
            //    $profile_image->move($destinationPath,$input['profile_image_new_name']);


            //  $user->first_name = $request->first_name;
            //  $user->last_name = $request->last_name;
            //  $user->email = $request->email;
            //  $user->mobile = $request->mobile;
            //  $user->landline_1 = $request->landline_1;
            //  $user->landline_2 = $request->landline_2;
            //  $user->latitude = $request->latitude;
            //  $user->longitude = $request->longitude;
            //  $user->city = $request->city;
            //  $user->country = $request->country;
            //  $user->birth_year = $request->birth_year;
            // //  $user->profile_image = $request->profile_image;
            //  $user->address_1 = $request->address;
            //  $user->address_2 = $request->address;
            //  $user->address = $request->address;
            $user->fill($request->all());

             $user->save();

             return redirect()->route('client.profile')->with('success','Profile Updated successfully');
    }
}