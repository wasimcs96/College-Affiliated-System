<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\University;
use App\Models\UniversityConsultant;
use App\Models\UniversityCourse;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UniversityFilterController extends Controller
{
    public function filter(Request $request)
    {

        $courses = Category::where('parent_id', $request->categoryselect)->get();

        $output = '<option value="" selected>Sub Category</option>';
        foreach ($courses as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->title . '</option>';
        }

        echo $output;
    }
    public function courseWiseUniversity(Request $request)
    {


        $category = $request->category ?? '';
        $sub_category = $request->sub_category ?? '';



        $universities = [];
        if ($sub_category != null && $sub_category != '') {
            $universitycourse = UniversityCourse::where('category_id', $sub_category)->distinct()->get(['user_id']);
            // dd($universitycourse);
            foreach ($universitycourse as $key => $univercity) {
                $universities[$key] = $univercity->users;
            }
        } else {


            $check = Category::find($category);
            $childcheck = $check->child_category->pluck('id');
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
        }


        return view('frontEnd.university.university_all', compact('category'))->with('universities', $universities);
    }


    public function countryWiseUniversity(Request $request)
    {


        if ($request->type != null) {
            $universities = [];
            $countrycoming = $request->countries_id ?? '';
            $universitycourse = University::where('countries_id', $request->countries_id)->where('type', $request->type)->get();
            foreach ($universitycourse as $key => $univercity) {
                $universities[$key] = $univercity->user;
            }
        } else {
            $universities = [];
            $countrycoming = $request->countries_id ?? '';
            $universitycourse = University::where('countries_id', $countrycoming)->get();
            foreach ($universitycourse as $key => $univercity) {
                $universities[$key] = $univercity->user;
            }
        }




        return view('frontEnd.university.university_all', compact('countrycoming'))->with('universities', $universities);
    }


    public function universitiesInnerFilter(Request $request)
    {


        $universities = [];
        if ($request->keyword != null) {
            $keyword = $request->keyword;

            $users = User::with(['university' => function ($q) use ($keyword) {
                $q->where('university_name', 'LIKE', '%' . $keyword . '%');
            }])->get();


            foreach ($users as $key => $user) {
                if ($user->university != null) {
                    $universities[$key] = $user;
                }
            }
        } else {

            if ($request->countries_id != null) {
                $query = User::where('countries_id', $request->countries_id);
                //  dd($request->type);



                if ($request->type != '' && $request->type != null) {
                    $tape = $request->type;
                    $query->with(['university' => function ($q) use ($tape) {
                        $q->where('type', '=', $tape);
                    }]);
                }
                //  dd($query->get()->toArray());

                if ($request->course_id != '' && $request->course_id != null) {
                    $course_id = $request->course_id;
                    $query->with(['universityCourse' => function ($q) use ($course_id) {
                        $q->where('course_id', '=', $course_id);
                    }]);
                }
                $rtd = $query->get();
                //    dd($rtd);
                foreach ($rtd as $key => $que) {


                    if (isset($que->university)) {
                        if ($que->university != null && $que->universityCourse != null) {
                            $universities[$key] = $que;
                        }
                    }
                }
            }
        }




        return view('frontEnd.university.university_all', compact('universities'));
    }

    public function countrySelected(Request $request)
    {

        $courses = University::where('countries_id', $request->countryId)->get();

        $output = '<option value="" selected>Select University</option>';
        foreach ($courses as $row) {
            $output .= '<option value="' . $row->user_id . '">' . $row->university_name . '</option>';
        }

        echo $output;
    }
    public function universityWiseConsultant(Request $request)
    {

        $universities = [];
        $universityconsultants = UniversityConsultant::where('university_id', $request->univercity_id)->get();

        foreach ($universityconsultants as $key => $univercity) {

            $consultants = $univercity->userConsultant;

            if ($consultants != null) {

                $universities[$key] = $consultants;
            } else {
                $universities = [];
            }
        }

        return view('frontEnd.consultant.consultant_all')->with('consultants', $universities);
    }

    public function consultantsInnerFilter(Request $request)
    {

        // dd($request->all());
        $consultants = [];
        if ($request->keyword != null) {
            $keyword = $request->keyword;

            $users = User::with(['consultant' => function ($q) use ($keyword) {
                $q->where('company_name', 'LIKE', '%' . $keyword . '%');
            }])->get();


            foreach ($users as $key => $user) {
                if ($user->isConsultant()) {
                    # code...

                    if ($user->consultant != null) {
                        $consultants[$key] = $user;
                    }
                }
            }
            // dd($consultants);
        } else {


            $query = User::where('countries_id', $request->countries_id)->with(['consultant']);


            $rtd = $query->get();
            // dd($rtd->toArray());
            foreach ($rtd as $key => $que) {
                if ($que->consultant != null) {
                    $consultants[$key] = $que;
                }
            }
        }




        return view('frontEnd.consultant.consultant_all', compact('consultants'));
    }
}
