<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;
use App\Models\Course;
use App\Models\University;
use App\Models\ApplicationAppliedUniversity;


class ConsultantApplicationController extends Controller
{
   public function index()
   {
     return view('consultant.application.application');
   }

   public function applicationCreate($id)
   {
       $application = Application::where('id',$id)->get()->first();
    //    dd($application->applicationAppliedUniversity);
    //    dd($application->applicationAppliedUniversity[application_id]);
    //    foreach($application->applicationAppliedUniversity as $app)
    //    {
    //        dd(json_decode($app->documents));
    //    }
    // $book = $application->booking->enquiry;
    // $bookings = json_decode($book);
    // dd($bookings);
    $book = $application->booking->enquiry;
    $bookings = json_decode($book,true);
    $i = 0;
    foreach($bookings as $booking)
    {
        $university_id[$i] = $booking['university'];
        $course_id[$i] = $booking['course'];
        $i++;
    }
    $university0 =  University::where('id',$university_id[0])->get()->first();
    $university1 =  University::where('id',$university_id[1])->get()->first();
    $university2 =  University::where('id',$university_id[2])->get()->first();

    $course0 = Course::where('id',$course_id[0])->get()->first();
    $course1 = Course::where('id',$course_id[1])->get()->first();
    $course2 = Course::where('id',$course_id[2])->get()->first();

       return view('consultant.application.application_create',compact('application','university0','university1','university2','course0','course1','course2'));
   }

   public function applicationApply(Request $request)
   {
       $id = $request->application_id;
    //    $university = ApplicationAppliedUniversity::where('id',$request->application_id)->get()->first();
       $university = ApplicationAppliedUniversity::find($id);
       $university->Is_applied = 1;
       $university->save();

       return response('success');

    }
}
