<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }


    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
if($users){
            Auth::login($users);
            return redirect('/');
        }else{
$user = User::create([
                'first_name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'profile_image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
         return redirect()->route('/');
        }
}
}
