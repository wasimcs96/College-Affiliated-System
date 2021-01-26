<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\UniversityConsultantClient;
class ConsultantStudentController extends Controller
{
    public function index()
    {
        $students = auth()->user()->consultantUniversityClient;
        // dd($students);
        return view('consultant.student.students')->with('students', $students);
    }

    public function show($id)
    {

        $show = UniversityConsultantClient::where('id',$id)->first();
        // $user = User::where('id',$id)->first();
// dd($user->first_name);
        return view('consultant.student.student_show',compact('show'));
    }


}
