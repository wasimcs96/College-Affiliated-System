<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use App\Models\Consultant;
use App\Models\UniversityConsultant;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\University;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UniversityConsultantController extends Controller
{

    public function index()
    {
        $universityConsultants = auth()->user()->universityConsultant;
        // dd($universityConsultants);
        // dd($universityConsultants);
        return view('university.consultant.consultants', compact('universityConsultants'));
    }

    public function show($id)
    {

        $status = UniversityConsultant::where('id',$id)->first();

        return view('university.consultant.consultant_show',compact('status'));
    }

    public function accept(Request $request,$id)
    {
        $accept = UniversityConsultant::find($id);
        $accept->status =1;
        $accept->save();
        return redirect()->route('university.consultants')->with('success','Consultant is accepted');
    }

    public function decline()
    {
        //
    }

    public function myconsultantindex()
    {
        $universityConsultants =UniversityConsultant::where('university_id',auth()->user()->id)->get() ;
        // dd($universityConsultant);
        // foreach($universityConsultants as $universityConsultant)
        // {
        //     $status = $universityConsultant->status;
        //     $id = $universityConsultant->consultant_id;
        //     $consultants = $universityConsultant->consultant;
        //     $user = $universityConsultant->consultant->user;
        // }
        // // dd($id);
        // // $id = DB::table('university_consultants')->pluck('consultant_id');

        // // $status = DB::table('university_consultants')->pluck('status');
        // $consultant = DB::table('consultants')->where('id',$id)->first();
        // // dd($consultant->user);
        return view('university.my_consultant.my_consultants', compact('universityConsultants'));
    }

    public function myconsultantshow($id)
    {
        $consultant=User::where('id',$id)->first();
        $status = UniversityConsultant::where('consultant_id',$id)->pluck('status')->first();
        $consultant_id = UniversityConsultant::where('consultant_id',$id)->pluck('consultant_id')->first();
        return view('university.my_consultant.my_consultant_show',compact('consultant','status','consultant_id'));
    }
}


