<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UniversityCourse;

class CourseFrontController extends Controller
{
    public function detail( $id)
    {
        $universitycourse=UniversityCourse::find($id);


        return view('frontEnd.courses.course_detail',compact('universitycourse'));
    }
}
