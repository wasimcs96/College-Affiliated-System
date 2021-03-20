<?php

namespace App\Http\Controllers\Auth;
use App\Models\University;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

      $random = rand(2,50000);
// dd($data['email']{$random});
$email = $data['email'];
       $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => 'sufiyan'.$random.'@gmail.com',
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ])->assignRole('client');

      // Important Code
      $replacement['USER_NAME'] = $user->first_name;
$replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
$replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
$replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
$replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
$replacement['SUPPORT_EMAIL'] = config('get.SUPPORT_EMAIL');
$replacement['WEBSITE_LINK'] = 'https://campusinterest.com/public/';
$data = ['template'=>'welcome-email','hooksVars' => $replacement];
mail::to($email)->send(new \App\Mail\ManuMailer($data));

return $user;

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
