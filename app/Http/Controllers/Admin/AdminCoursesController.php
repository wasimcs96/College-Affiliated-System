<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;

class AdminCoursesController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
     public function index()
     {
        $courses = Course::orderBy('updated_at', 'DESC')->get();
         return view('admin.courses.index', compact('courses'));

     }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('admin.courses.add')->with('courses', Course::all())->with('category', Category::all());

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
            'name' => 'required',
            'type' => 'required'
        ]);

        $course =  Course::create($request->all());
        $course->save();
        return redirect()->route('admin.courses')->with('success', 'Course has been saved Successfully');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $courses = Course::where('id',$id)->first();
        return view('admin.courses.show')->with('course', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Course $id)
    {

         return view('admin.courses.edit')->with('course', $id)->with('categories', Category::all());

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Course $id)
    {

        $id->update($request->all());
        return redirect()->route('admin.courses')->with('success', 'Course updated Succefully.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {

        $id = Course::find($id);
        $id->delete();

        return redirect()->route('admin.courses')->with('success', 'Course Removed Succefully.');

    }
}
