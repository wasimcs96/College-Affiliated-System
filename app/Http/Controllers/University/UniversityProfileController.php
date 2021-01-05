<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use App\Models\University;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Sessions;
use Config;
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
        $docs = auth()->user()->university->default_documents;
        $documents = json_decode($docs);
        return view('university.profile')->with('user',$user)->with('countries',Country::all())->with('documents',$documents);;
    }

    public function profileStore(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'university_name'=>'required',

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
             }


              $user->fill($request->all());
              $user->first_name = $request->university_name;
              $user->last_name=$request->university_name;
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
