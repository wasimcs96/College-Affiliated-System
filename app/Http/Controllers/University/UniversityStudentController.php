<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UniversityConsultantClient;

class UniversityStudentController extends Controller
{
    public function index()
    {
    //    ('users', User::all());
        $users=auth()->user()->universityConsultantClient;
    // dd($users);
        return view('university.student.students',compact('users'));
    }

    public function show($id)
    {
        $show = UniversityConsultantClient::where('id',$id)->first();
        return view('university.student.student_show',compact('show'));
    }


}
