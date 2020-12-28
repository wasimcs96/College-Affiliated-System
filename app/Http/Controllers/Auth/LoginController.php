<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Redirect;
use URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = url()->previous();

    // public function redirectPath()
    // {
    //     return Redirect::to(URL::previous());
    // }

    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');

    }
}
