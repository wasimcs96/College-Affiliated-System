<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Package;
use App\Models\User;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\Application;
use App\Models\ApplicationAppliedUniversity;
use App\Models\UniversityConsultant;
use App\Models\University;
use App\Models\UniversityCourse;
use App\Models\UniversityMedia;
class AdminUsersController extends Controller
{
    public function index($id)
    {
        // dd($id);
        if($id==1)
        {
           return view('admin.users.user.index')->with('users', User::all())->with('id',1);
        }
        if($id==2)
        {
            // dd($id);
           return view('admin.users.user.index')->with('users', User::all())->with('id',2);
        }
        if($id==3)
        {
           return view('admin.users.user.index')->with('users', User::all())->with('id',3);
        }
        if($id==4)
        {
           return view('admin.users.user.index')->with('users', User::all())->with('id',4);
        }
    }

    public function add()
    {
        return view('admin.users.user.add');
    }

    public function show($id)
    {
        // dd($request->all());
        $user = User::where('id',$id)->first();
        return view('admin.users.user.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.user.edit')->with('user', $user)->with('countries',Country::all());
    }

    public function store(Request $request)
    {
        // dd($request->all());

            $request->validate([
            'first_name'=>['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required','unique:users'],
            'password'=>['required', 'string', 'min:6'],
            'role' => ['required'],
            'mobile' => ['required','min:6','unique:users','numeric'],
             ]);

        $role = $request->role;
       if($role==3){
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'countries_id'=>$request->country,
            'password' => Hash::make($request->password),
        ])->assignRole('client');

// Important Code
// $replacement['COURSE_LINK'] =http://kamercio.com/campusInterest/public/university/all;
// $replacement['CONSULTANT_LINK'] =http://kamercio.com/campusInterest/public/consultant/all;
// $replacement['APP_STORE_APP'] = https://play.google.com/store/apps/developer?id=Digitalcolf;
// $replacement['PLAY_STORE_APP'] = https://play.google.com/store/apps/developer?id=Digitalcolf;
// $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
// $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
// $replacement['SUPPORT_EMAIL'] = config('get.SUPPORT_EMAIL');
// $replacement['WEBSITE_LINK'] = http://kamercio.com/campusInterest/public/;
// $data = ['template'=>'welcome-email','hooksVars' => $replacement];
// mail::to($request->email)->send(new \App\Mail\ManuMailer($data));

        return view('admin.users.user.index')->with('users', User::all())->with('id',1);
       }
       if($role==2){
           $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'countries_id'=>$request->country,
        ])->assignRole('university');
        University::create([
            'user_id'=>$user->id,
            'countries_id'=>$request->country,
            'university_name'=>$request->university_name,

        ]);
                    // Important Code
    //  $replacement['token'] =$request->_token;

    //  $replacement['TYPE'] = University;
    //  $replacement['USER_NAME'] = $request->first_name;
    //  $replacement['PASSWORD'] = $request->password;
    //  $replacement['EMAIL'] = $request->email;
    //  $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
    //  mail::to($request->email)->send(new \App\Mail\ManuMailer($data));

        $users = User::all();
        foreach($users as $use)
        {
            if($use)
            {
                if($use->isConsultant())
                {
                    // $replacement['UNIVERSITY_NAME'] = $request->university_name;
                    // $data = ['template'=>'university-added','hooksVars' => $replacement];
                    // mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
                }
            }
        }

        return view('admin.users.user.index')->with('users', User::all())->with('id',3);

       }
       if($role==4){
        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'countries_id'=>$request->country,
            'password' => Hash::make($request->password),
        ])->assignRole('consultant');
        Consultant::create([
            'user_id'=>$user->id,
        ]);
                    // Important Code
    //                 $replacement['token'] =$request->_token;


    //                 $replacement['USER_NAME'] = $request->first_name;
    //  $replacement['PASSWORD'] = $request->password;
    //  $replacement['EMAIL'] = $request->email;
    //  $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
    //  mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        return view('admin.users.user.index')->with('users', User::all())->with('id',2);
       }
       if($role==5){
        return User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'countries_id'=>$request->country,
            'password' => Hash::make($request->password),
        ])->assignRole('subAdmin');
          // Important Code
    //  $replacement['token'] =$request->_token;


    //  $replacement['USER_NAME'] = $request->first_name;
    //  $replacement['PASSWORD'] = $request->password;
    //  $replacement['EMAIL'] = $request->email;
    //  $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
    //  mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
    return view('admin.users.user.index')->with('users', User::all())->with('id',4);
       }

    }

    public function update(Request $request, User $id)
    {

        $id->update($request->all());
        $id->countries_id = $request->country;
        $id->rating = $request->rating;
        // $id->status = $request->status;
        $id->save();
        return redirect()->route('admin.users',['id' => $request->parameter_id])->with('success', 'User updated Succefully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user != null)
        {
            $user->delete();
        }

        $university = University::where('user_id',$id)->first();
        if($university != null)
        {
            $university->delete();
        }

        $consultant = Consultant::where('user_id',$id)->first();
        if($consultant != null)
        {
            $consultant->delete();
        }

        $applicationClients = Application::where('client_id',$id)->get();
        if($applicationClients->count() > 0)
        {
            foreach($applicationClients as $applicationClient)
            {
               $applicationClient->delete();
            }
        }

        $applicationConsultants = Application::where('consultant_id',$id)->get();
        if($applicationConsultants->count() > 0)
        {
            foreach($applicationConsultants as $applicationConsultant)
            {
               $applicationConsultant->delete();
            }
        }

        $applicationUniversitys = ApplicationAppliedUniversity::where('university_id',$id)->get();
        if($applicationUniversitys->count() > 0)
        {
            foreach($applicationUniversitys as $applicationUniversity)
            {
               $applicationUniversity->delete();
            }
        }

        $universityConsultants = UniversityConsultant::where('consultant_id',$id)->get();
        if($universityConsultants->count() > 0)
        {
            foreach($universityConsultants as $universityConsultant)
            {
               $universityConsultant->delete();
            }
        }

        $consultantUniversitys = UniversityConsultant::where('university_id',$id)->get();
        if($consultantUniversitys->count() > 0)
        {
            foreach($consultantUniversitys as $consultantUniversity)
            {
               $consultantUniversity->delete();
            }
        }

        $courses = UniversityCourse::where('user_id',$id)->get();
        if($courses->count() > 0)
        {
            foreach($courses as $course)
            {
               $course->delete();
            }
        }

        $medias = UniversityMedia::where('user_id',$id)->get();
        if($medias->count() > 0)
        {
            foreach($medias as $media)
            {
               $media->delete();
            }
        }

        return redirect()->back()->with('danger', 'User Deleted Successfully.');
    }


}



