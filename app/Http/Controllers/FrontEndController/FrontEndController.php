<?php

namespace App\Http\Controllers\FrontEndController;

use App\Models\User;
use App\Models\Consultant;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Sessions;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{


    public function index()
     {
         $consultants = User::all();
        // dd($consultants);
        $universities = User::all();

        // $consultants =$consultant->isConsultant();
        // $universities = $university->isUniversity();
        return view('frontEnd.index',compact('universities','consultants'));

     }

}
