<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseMedia;
use App\Models\University;
use App\Models\UniversityCourse;

class UniversityCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('university.course.courses')->with('universitycourses', UniversityCourse::all());

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('university.course.add_course')->with('courses', Course::all())->with('universities', University::all());

    }

     /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'course_id' => 'required',
            'university_id' => 'required',
            'description' => 'required',
            'fees' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'fax_number' => 'required',
            'term_conditions' => 'required',
            'privacy_policy' => 'required'
        ]);

        $images=collect($request->image);

        foreach($images as $image){
            $name= time().$image->getClientOriginalName();
               $type=0;
                   $st= $image->move('uploads/media',$name);
           $newname='uploads/media/'.$name;

            CourseMedia::create( [

                'course_id'=>$request->course_id,
                'media'=>  $newname,
                'status'=>0,
                'file_type' => $type,
                //you can put other insertion here
            ]);
         }
    if ($request->link != null) {
        CourseMedia::create( [

            'course_id'=>$request->course_id,
             'link'=>$request->link,
             'status'=>0,
            'file_type' => 2
            //you can put other insertion here
        ]);
    }



        $course = UniversityCourse::create($request->all());

        $course->save();

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

        return view('university.course.course_edit')->with('courses', Course::all())->with('universitycourse', $id);

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, UniversityCourse $id)
    {
        $id->update($request->all());

        return redirect()->route('university.courses')->with('success', 'Course updated succefully.');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {

        UniversityCourse::find($id)->delete($id);
        // CourseMedia::find($id)->delete($id);


        return redirect()->route('university.courses')->with('success', 'Course has been saved Successfully');
    }
}
