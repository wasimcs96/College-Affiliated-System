<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class ConsultantStudentController extends Controller
{
    public function index()
    {
        return view('consultant.student.students')->with('users', User::all());
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
// dd($user->first_name);
        return view('consultant.student.student_show',compact('user'));
    }


}
