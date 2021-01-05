<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\University;

class ConsultantUniversityController extends Controller
{
    public function index()
    {
        $universities = auth()->user()->consultant->consultantUniversity;
        return view('consultant.university.university')->with('universities',$universities);
    }

    public function show($id)
    {
        $university = University::where('id',$id)->get()->first();
        return view('consultant.university.university_show')->with('university',$university);
    }

    public function indexRequest()
    {
        $universities = auth()->user()->consultant->consultantUniversity;
        return view('consultant.university.university_request')->with('universities',$universities);
    }

    public function showRequest($id)
    {
        $university = University::where('id',$id)->get()->first();
        return view('consultant.university.university_request_show')->with('university',$university);
    }
}
