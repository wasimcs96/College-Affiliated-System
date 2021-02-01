<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseFrontController extends Controller
{
    public function detail( $id)
    {
        $course=Course::find($id);

        return view('frontEnd.courses.course_detail',compact('course'));
    }
}
