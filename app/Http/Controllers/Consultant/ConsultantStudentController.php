<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
class ConsultantStudentController extends Controller
{
    public function index()
    {
        $book = auth()->user()->consultantBooking;
        return view('consultant.student.students')->with('bookings', $book);
    }

    public function show($id)
    {
        $show = Booking::where('id',$id)->first();
        // $user = User::where('id',$id)->first();
// dd($user->first_name);
        return view('consultant.student.student_show',compact('show'));
    }


}
