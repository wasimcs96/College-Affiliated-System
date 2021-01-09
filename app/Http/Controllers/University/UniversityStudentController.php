<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UniversityStudentController extends Controller
{
    public function index()
    {
    //    ('users', User::all());
    $users=auth()->user()->applicationAppliedUniversity;
    // dd($users);
        return view('university.student.students',compact('users'));
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
// dd($user->first_name);
        return view('university.student.student_show',compact('user'));
    }


}
