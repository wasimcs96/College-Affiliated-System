<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;

class SocialController extends Controller
{

    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }


    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where([$provider => $userSocial->getId()])->first();

       if($users){
            $users->email=$userSocial->getEmail() ?? '';
            $users->save();
            Auth::login($users);
            return redirect('/');
        }else{
            $checkMail=User::where(['email' => $userSocial->getEmail()])->first();
            if($checkMail){
                $checkMail->$provider=$userSocial->getId();
                $checkMail->save();
            }
           else {
            $checkMail=$this->newUser($userSocial,$provider);
        }
        Auth::login($checkMail);
         return redirect()->route('front');
        }
}



public function newUser($userSocial,$provider){
    $time=Carbon::now();
    $user = User::create([
        'first_name'          => $userSocial->getName() ?? '',
        'email'         => $userSocial->getEmail() ?? '',
        'profile_image'         => $userSocial->getAvatar() ?? '',
         $provider   => $userSocial->getId(),
         'status'=>1,
        'email_verified_at'=>$time
        //'provider'      => $provider,
    ]);

    $user->assignRole('client');
    $site = config('get.WEBSITE_LINK');
    $support_email = config('get.ADMIN_EMAIL');
$emailuser=$userSocial->getEmail();
if (isset($emailuser))
{
    $replacement=[];
  $replacement['USER_NAME'] = $userSocial->getName();
  $replacement['COURSE_LINK'] = 'https://campusinterest.com/university/all';
$replacement['CONSULTANT_LINK'] ='https://campusinterest.com/consultant/all';
$replacement['APP_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['PLAY_STORE_APP'] = 'https://play.google.com/store/apps/developer?id=Digitalcolf';
$replacement['DISCLAIMER_LINK'] = config('get.DISCLAIMER_LINK');
$replacement['COPYRIGHT_LINK'] = config('get.COPYRIGHT_LINK');
$replacement['SUPPORT_EMAIL'] = $support_email;
$replacement['WEBSITE_LINK'] = 'https://campusinterest.com' ;
  $data = ['template'=>'welcome-email','hooksVars' => $replacement];
   mail::to($userSocial->getEmail())->send(new \App\Mail\ManuMailer($data));
}
    // Important Code
// $replacement['token'] =$request->_token;
// $replacement['RESET_PASSWORD_URL'] = url("/admin/password/reset/{$request->token}");


    return $user;
}
}
