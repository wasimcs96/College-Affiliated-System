<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;


class ConsultantApplicationController extends Controller
{
   public function index()
   {
    //    dd(auth()->user()->consultant->application);
    // $book = auth()->user()->consultant->booking;
     return view('consultant.application.application');
   }

   public function applicationCreate($id)
   {
       $application = Application::where('id',$id)->get()->first();
       return view('consultant.application.application_create',compact('application'));
   }
}
