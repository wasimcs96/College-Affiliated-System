<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use App\Models\University;

class ConsultantUniversityController extends Controller
{
    public function index()
    {
        $universities = auth()->user()->consultantUniversity;
        // dd($universities);
        return view('consultant.university.university')->with('universities',$universities);
    }

    public function show($id)
    {
        $university = University::where('user_id',$id)->get()->first();
        // dd($university);
        return view('consultant.university.university_show')->with('university',$university);
    }

    public function indexRequest()
    {
        $universities = auth()->user()->consultantUniversity;
        // dd($universities);
        return view('consultant.university.university_request')->with('universities',$universities);
    }

    public function showRequest($id)
    {
        
        $university = University::find($id);
        return view('consultant.university.university_request_show')->with('university',$university);
    }
}
