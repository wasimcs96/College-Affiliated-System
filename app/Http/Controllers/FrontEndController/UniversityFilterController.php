<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
class UniversityFilterController extends Controller
{
    public function filter(Request $request){
     
    $courses=Course::where('category_id',$request->categoryselect)->where('type',$request->typeselect)->get();

    $output='<option value="" selected>Course Name</option>';
foreach($courses as $row)
{
$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
}
echo $output;
     
    }
}
