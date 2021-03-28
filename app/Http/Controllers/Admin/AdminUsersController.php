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
use Carbon\Carbon;
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
           return view('admin.users.user.index')->with('users', User::orderBy('updated_at', 'DESC')->get())->with('id',1);
        }
        if($id==2)
        {
            // dd($id);
           return view('admin.users.user.index')->with('users', User::orderBy('updated_at', 'DESC')->get())->with('id',2);
        }
        if($id==3)
        {
           return view('admin.users.user.index')->with('users', User::orderBy('updated_at', 'DESC')->get())->with('id',3);
        }
        if($id==4)
        {
           return view('admin.users.user.index')->with('users', User::orderBy('updated_at', 'DESC')->get())->with('id',4);
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
        $time=Carbon::now();
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
        $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($request->email))
        {
// Important Code
$replacement['USER_NAME'] = $request->first_name;
$replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
$replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
$replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
$replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
$replacement['SUPPORT_EMAIL'] = $support_email;
$replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
$data = ['template'=>'welcome-email','hooksVars' => $replacement];
mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        }
return redirect()->route('admin.users',['id' => 1])->with('users', User::all())->with('id',1)->with('success','Client Created Successfully');
       }
       if($role==2){
        //    dd($request->is_verified);
           $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'countries_id'=>$request->country,
            'is_verified'=>$request->is_verified
        ])->assignRole('university');
        University::create([
            'user_id'=>$user->id,
            'countries_id'=>$request->country,
            'university_name'=>$request->university_name,

        ]);
        $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($request->email))
        {
                    // Important Code
     $replacement['token'] =$request->_token;
     $replacement['TYPE'] = 'University';
     $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
        $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
        $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
        $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
        $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
        $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
        $replacement['SUPPORT_EMAIL'] = $support_email;
        $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
     $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        }
        $users = User::all();
        foreach($users as $use)
        {
            if($use)
            {
                if($use->isConsultant())
                {
                    if(isset($use->email))
                    {
                    $replacement['UNIVERSITY_NAME'] = $request->university_name;
                    $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
                    $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
                    $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
                    $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
                    $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
                    $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
                    $replacement['SUPPORT_EMAIL'] = $support_email;
                    $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
                    $data = ['template'=>'university-added','hooksVars' => $replacement];
                    mail::to($use->email)->send(new \App\Mail\ManuMailer($data));
                    }
                }
            }
        }

    return redirect()->route('admin.users',['id' => 3])->with('users', User::all())->with('id',3)->with('success','University Created Successfully');

       }
       if($role==4){

        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'countries_id'=>$request->country,
            'password' => Hash::make($request->password),
            'email_verified_at' => $time,
        ])->assignRole('consultant');
        Consultant::create([
            'user_id'=>$user->id,
        ]);
        $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($request->email))
        {
                    // Important Code
                    $replacement['token'] =$request->_token;


                    $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
     $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
     $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
     $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
     $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
     $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
     $replacement['SUPPORT_EMAIL'] = $support_email;
     $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        }
     return redirect()->route('admin.users',['id' => 2])->with('users', User::all())->with('id',2)->with('success','Consultant Created Successfully');
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
        $site = config('get.WEBSITE_LINK');
        $support_email = config('get.ADMIN_EMAIL');
        if(isset($request->email))
        {
          // Important Code
     $replacement['token'] =$request->_token;

     $replacement['TYPE'] = 'SubAdmin';
     $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
     $replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
     $replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
     $replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
     $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
     $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
     $replacement['SUPPORT_EMAIL'] = $support_email;
     $replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        }
     return redirect()->route('admin.users',['id' => 4])->with('users', User::all())->with('id',4)->with('success','SubAdmin Created Successfully');
       }

    }

    public function update(Request $request, User $id)
    {
                // dd($request->all());
                if($request->email != $id->email)
                {
                $request->validate([
                    'first_name'=>['required', 'string', 'max:255'],
                    'last_name'=>['required', 'string', 'max:255'],
                    'email' => ['required','unique:users'],
                     ]);
                }
                if($request->mobile != $id->mobile)
                {
                     $request->validate([
                    'first_name'=>['required', 'string', 'max:255'],
                    'last_name'=>['required', 'string', 'max:255'],
                    'mobile' => ['required','min:6','unique:users','numeric'],
                     ]);
                }
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



