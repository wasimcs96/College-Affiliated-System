<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Date;
use App\Models\Application;
use App\Models\Course;
use App\Models\University;
use App\Models\ApplicationFollowsUp;
use App\Models\ApplicationAppliedUniversity;


class AdminApplicationFollowUpController extends Controller
{
   public function index()
   {
       $applications = ApplicationFollowsUp::orderBy('date', 'DESC')->get();
     return view('admin.applicationFollowUp.index')->with('applications',$applications);
   }


   public function create()
   {
       $applications = Application::all();
    //    dd($application_id);
       return view('admin.applicationFollowUp.create')->with('applications',$applications);
   }


   public function show($id)
   {


    $application = ApplicationFollowsUp::where('id', $id)->first();
    // dd($application);
    return view('admin.applicationFollowUp.show')->with('applications', $application);

   }

   public function store(Request $request)
   {
    //    dd($request->all());
    $this->validate($request, [
        'application_id' => 'required',
        'note' => 'required',
        'date' => 'required',
    ]);
     $dateFormat = strtotime($request->date);
     $dateFormat =  date('Y-m-d');
    //  dd($dateFormat);
    $application = ApplicationFollowsUp::create([
        'application_id' => $request->application_id,
        'note' => $request->note,
        'date' => $dateFormat,
    ]);
    $application->save();
    return response('success');
   }

}
