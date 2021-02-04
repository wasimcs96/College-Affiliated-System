<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Package;
use App\Models\User;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\University;
use Illuminate\Support\Facades\Mail;
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
        // dd($role);
        $role = $request->role;
       if($role==3){
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ])->assignRole('client');

            // Important Code
     $replacement['token'] =$request->_token;
    

     $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));

        return view('admin.users.user.index')->with('users', User::all())->with('id',1);
       }
       if($role==2){
           $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ])->assignRole('university');
        University::create([
            'user_id'=>$user->id,

        ]);
                    // Important Code
     $replacement['token'] =$request->_token;
    

     $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        return view('admin.users.user.index')->with('users', User::all())->with('id',3);

       }
       if($role==4){
        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ])->assignRole('consultant');
        Consultant::create([
            'user_id'=>$user->id,
        ]);
                    // Important Code
                    $replacement['token'] =$request->_token;
    

                    $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
        return view('admin.users.user.index')->with('users', User::all())->with('id',2);
       }
       if($role==5){
        return User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ])->assignRole('subAdmin');
       }
            // Important Code
            $replacement['token'] =$request->_token;
    

            $replacement['USER_NAME'] = $request->first_name;
     $replacement['PASSWORD'] = $request->password;
     $replacement['EMAIL'] = $request->email;
     $data = ['template'=>'consultant-sign-up','hooksVars' => $replacement];
     mail::to($request->email)->send(new \App\Mail\ManuMailer($data));
    }

    public function update(Request $request, User $id)
    {
        // dd($request->uni_id);
//       if($request->parameter_id == 2){
//         $consultant=Consultant::find($id)->first();
//         // dd($consultant);
// $consultant->update([
//     'company_name' => $request->company_name,
//     'about_me'=>$request->about_me,
//     'website'=>$request->website
//     ]);

//         }
//         if($request->parameter_id == 3){
//             $university=University::where('user_id',$request->uni_id)->first();
//             // dd($university);
//             if($university == null){
//             $university->create([
//         'university_name' =>$request->university_name,
//         'about_me'=>$request->about_me,
//         'website'=>$request->website,
//         'average_fees'=>$request->average_fees
//         ]);
//     }
//     else{
//         $university->update([
//             'university_name' =>$request->university_name,
//             'about_me'=>$request->about_me,
//             'website'=>$request->website,
//             'average_fees'=>$request->average_fees]);
//     }

//             }
        // dd($consultant);
        $id->update($request->all());
        $id->countries_id = $request->country;
        $id->rating = $request->rating;
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
        $user->delete();

        return redirect()->back()->with('danger', 'User Deleted Successfully.');
    }


}



