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
             'mobile' => ['required','min:6','unique:users','numeric'],
        ]);
    }

    protected function create(array $data)
    {


        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ])->assignRole('client');

      // Important Code
// $replacement['COURSE_LINK'] =https://bilaltech.in/development.EducationPortal/public/university/all;
// $replacement['CONSULTANT_LINK'] = https://bilaltech.in/development.EducationPortal/public/consultant/all;
// $replacement['APP_STORE_APP'] = https://play.google.com/store/apps/developer?id=Digitalcolf;
// $replacement['PLAY_STORE_APP'] = https://play.google.com/store/apps/developer?id=Digitalcolf;
// $replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
// $replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
// $replacement['SUPPORT_EMAIL'] = config('get.SUPPORT_EMAIL');
// $replacement['WEBSITE_LINK'] = https://bilaltech.in/development.EducationPortal/public;
// $data = ['template'=>'welcome-email','hooksVars' => $replacement];
// mail::to($data['email'])->send(new \App\Mail\ManuMailer($data));



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
