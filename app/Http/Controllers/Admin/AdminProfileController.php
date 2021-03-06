<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Sessions;
use Config;
use Str;
use App\Models\Country;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{


    public function profile()
    {

        return view('admin.profile')->with('countries',Country::all());
    }

    public function profileStore(Request $request)
    {

        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email',
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
              }
            //   if($request->has('password'))
            //   {
            //     // dd(bcrypt($request->password));
            //     //   $user->password = bcrypt($request->password);
            //     //   $user->save();
            //       $user->forceFill([
            //         'password' => Hash::make($request->password),
            //         'remember_token' => Str::random(60),
            //     ])->save();
            //   }
              $user->fill($request->all());
              $user->latitude = $data->latitude;
              $user->longitude = $data->longitude;
              $user->countries_id = $request->countries_id;
              $user->save();

             return redirect()->route('admin.profile')->with('success','Profile Updated successfully');
    }
}
