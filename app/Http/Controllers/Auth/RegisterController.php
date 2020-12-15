<?php

namespace App\Http\Controllers\Auth;
use App\Models\University;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/index';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
             'role' => ['required'],
             'mobile' => ['required','min:6','unique:users'],
        ]);
    }

    protected function create(array $data)
    {

        $role = $data['role'];
        // dd($role);
       if($role==3){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ])->assignRole('client');
       }
       if($role==2){
           $user=User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ])->assignRole('university');
        University::create([
            'user_id'=>$user->id,

        ]);
        return $user;

       }
       if($role==4){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ])->assignRole('consultant');
       }
       if($role==5){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ])->assignRole('subadmin');
       }


       University::create([
        'user_id'=>$data->id,

    ]);

    }

    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    public function profile()
    {
        return view('client.profile');
    }
}
