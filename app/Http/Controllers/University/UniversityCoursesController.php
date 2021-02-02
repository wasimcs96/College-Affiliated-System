<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseMedia;
use App\Models\University;
use Config;
use App\Models\UniversityCourse;
use App\Models\UniversityMedia;

class UniversityCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $universitycourse=auth()->user()->universityCourse;
        // dd($universitycourse);
        return view('university.course.courses')->with('universitycourses', $universitycourse);

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('university.course.add_course')->with('categories', Category::all())->with('universities', University::all());

    }

     /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'type' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'fees' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);
        $course = UniversityCourse::create($request->all());
        $images=collect($request->image);

        foreach($images as $image){
            $name= time().$image->getClientOriginalName();
               $type=0;
                   $st= $image->move(Config::get('define.image.course_media'),$name);
           $newname=Config::get('define.image.course_media').'/'.$name;

            CourseMedia::create( [


                'university_course_id'=> $course->id,
                'media'=>  $newname,
                'status'=>0,
                'file_type' => $type,
                'category_id'=>$request->category_id
                //you can put other insertion here
            ]);
         }
    // if ($request->link != null) {
    //     CourseMedia::create( [

    //         'course_id'=>$request->course_id,
    //          'link'=>$request->link,
    //          'status'=>0,
    //         'file_type' => 2
    //         //you can put other insertion here
    //     ]);
    // }

        return redirect()->route('university.courses')->with('success', 'Course has been saved Successfully');

    }



    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $course = UniversityCourse::where('id',$id)->first();
        return view('university.course.course_show')->with('courses', $course);

    }

     /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(UniversityCourse $id)
    {


        return view('university.course.course_edit')->with('categories', Category::all())->with('universitycourse', $id);

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, UniversityCourse $id)
    {
        // dd($request->all());
        $id->update($request->all());


        $images=collect($request->image);


        foreach($images as $image){
            $name= time().$image->getClientOriginalName();
               $type=0;
                   $st= $image->move(Config::get('define.image.course_media'),$name);
           $newname=Config::get('define.image.course_media').'/'.$name;

            CourseMedia::create( [


                'university_course_id'=> $request->university_course_id,
                'media'=>  $newname,
                'status'=>0,
                'file_type' => $type,
                'category_id'=>$request->category_id
                //you can put other insertion here
            ]);
         }

        return redirect()->route('university.courses')->with('success', 'Course updated succefully.');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(UniversityCourse $id)
    {
        $medias=$id->courseMedia;
        if ($medias->count() > 0) {
            foreach ($medias as $key => $value) {
                $value->delete();
            }
        }

       $id->delete();

        return redirect()->route('university.courses')->with('success', 'Course has been deleted Successfully');
    }

    public function delete(Request $request)
    {
        $id=$request->media_id;

        if(CourseMedia::find($id)->delete()){
            return response()->json([
                'success' => 'image deleted successfully!'
            ]);
        }else{
            return response()->json([
                'error' => 'failed'
            ]);
        }



    }

    public function importBlade(Request $request)
    {
        return view('university.course.course_import')->with('categories',Category::all());
    }


    function fetchCategory(Request $request)
    {
        // dd($request->all());
        $categories=Category::where('parent_id',$request->parentid)->get();
        if(isset($categories))
        {
        $output='<option value="" selected>Select Discipline</option>';
        foreach($categories as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->title.'</option>';
        }
        echo $output;
      }
      else
      {
         $output='<option value="" selected>No Data Available</option>';
         echo $output;
      }
    }
}
