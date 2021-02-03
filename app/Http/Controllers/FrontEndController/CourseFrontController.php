<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UniversityCourse;
use App\Models\Category;


class CourseFrontController extends Controller
{
    public function detail( $id)
    {

        $universitycourse=UniversityCourse::find($id);
         $category=$universitycourse->category_id;

        $universities=$this->categorywiseuniversity($category);
// dd($universities);
        //  $request = Request::create('fetch/course/university/coursewise', 'POST', [
        //     'category' =>$universitycourse->category_id,
        //     'id_token' => $id,
        //     're'=>1
        // ]);
        //  $request->headers->set('X-CSRF-TOKEN', csrf_token());

        // $response = app()->handle($request);

        // $response = json_decode($response->getContent(), true);

        return view('frontEnd.courses.course_detail',compact('universitycourse','universities'));
    }

   public function categorywiseuniversity($category){
    $universities=[];
    $check = Category::find($category);
    $childcheck = $check->child_category->pluck('id');
    $childerens=$check->child_category;

    if ($childcheck->count() > 0) {
        foreach($childerens as $keys=>$child){
            $childs[$keys]=$child;

        }
    }


    if ($childcheck->count() > 0) {

        $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->distinct()->get(['user_id']);
        foreach ($universitycourse as $key => $univercity) {
            $universities[$key] = $univercity->users;
        }
    } else {
        $universitycourse = UniversityCourse::where('category_id',  $category)->distinct()->get(['user_id']);

        foreach ($universitycourse as $key => $univercity) {
            $universities[$key] = $univercity->users;
        }
    }
    return $universities;
   }

}
