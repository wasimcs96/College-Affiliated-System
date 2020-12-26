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
     return view('consultant.application.application');
   }

   public function applicationCreate($id)
   {
       $application = Application::where('id',$id)->get()->first();
    //    dd($application->applicationAppliedUniversity[application_id]);
    //    foreach($application->applicationAppliedUniversity as $app)
    //    {
    //        dd(json_decode($app->documents));
    //    }
       return view('consultant.application.application_create',compact('application'));
   }
}
