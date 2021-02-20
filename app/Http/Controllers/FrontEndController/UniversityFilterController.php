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
            if($courses->count()>0){
                    $output = '<option value="" selected>Select Sub Discipline</option>';
            
                    foreach ($courses as $row) {
                        $output .= '<option value="' . $row->id . '" >' . $row->title . '</option>';
                    }
            
                    echo $output;
                }else{
        $output = '<option value="" selected>No Data Available</option>';
        echo $output;


    }
    }
        public function courseWiseUniversity(Request $request)
        {

            // dd($request->all());
            $filtercatgory = $request->category ?? '';
            $filtersub_category = $request->sub_category ?? '';
            $study_level = $request->study_level ?? '';
// dd($filtercatgory);

            $universities = [];
            $childs=[];
            if ($filtersub_category != null && $filtersub_category != '') {
                if(isset($study_level)&& $study_level != ''){
                    $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->where('type',$study_level)->distinct()->get(['user_id']);
                }
                else{
                $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->distinct()->get(['user_id']);              
            }
                foreach ($universitycourse as $key => $univercity) {
                    $universities[$key] = $univercity->users;
                }
            
            } 
            else {

                $check = Category::find($filtercatgory);
                $childcheck = $check->child_category->pluck('id');
                $childerens=$check->child_category;
                // dd($childerens);

                if ($childcheck->count() > 0) {
                    foreach($childerens as $keys=>$child){
                        $childs[$keys]=$child;

                    }
                }


                if ($childcheck->count() > 0) {
                    if(isset($study_level) && $study_level != ''){
                    $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->where('type',$study_level)->distinct()->get();
                    // dd($universitycourse);

                    }
                    else
                    {
                        $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->distinct()->get();
                    }
                    foreach ($universitycourse as $key => $univercity) {
                        $universities[$key] = $univercity->users;
                    }
                } else {
                    if(isset($study_level) && $study_level != ''){
                    $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->where('type',$study_level)->distinct()->get();
                    }
                    else
                    {
                        $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->distinct()->get();
                    }
                    foreach ($universitycourse as $key => $univercity) {
                        $universities[$key] = $univercity->users;
                    }
                }
            }


            return view('frontEnd.university.university_all', compact('filtercatgory','childs','filtersub_category','study_level'))->with('universities', $universities);
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

        // dd($universities);



        return view('frontEnd.university.university_all', compact('countrycoming'))->with('universities', $universities);
    }


    public function universitiesInnerFilter(Request $request)
    {

        //  dd($request->countries_id);
        $universities = [];
        // if ($request->keyword != null) {
        //     $keyword = $request->keyword;

        //     $users = User::with(['university' => function ($q) use ($keyword) {
        //         $q->where('university_name', 'LIKE', '%' . $keyword . '%');
        //     }])->get();


        //     foreach ($users as $key => $user) {
        //         if ($user->university != null) {
        //             $universities[$key] = $user;
        //         }
        //     }
        // } else {

            if ($request->countries_id != null) {
                $query = User::where('countries_id', $request->countries_id);

                if ($request->type != '' && $request->type != null) {
                    $tape = $request->type;
                    $query->with(['university' => function ($q) use ($tape) {
                        $q->where('type', '=', $tape);
                    }]);
                }

                $rtd = $query->get();

                foreach ($rtd as $key => $que) {


                    if (isset($que->university)) {
                        if ($que->university != null) {
                            $universities[$key] = $que;
                        }
                    }
                }
            }
            else{
                $tape = $request->type;
                $query = User:: with(['university' => function ($q) use ($tape) {
                    $q->where('type', '=', $tape);
                }]);
                $rtd = $query->get();

                foreach ($rtd as $key => $que) {


                    if (isset($que->university)) {
                        if ($que->university != null) {
                            $universities[$key] = $que;
                        }
                    }
                }
            }
        // }


    // dd($request->all());
    $filtercatgory = $request->filtercatgory ?? '';
    $filtersub_category = $request->filtersub_category ?? '';
    $study_level = $request->study_level ?? '';
    $rating = $request->rating ?? '' ;
    $ielts_rating = $request->ielts_rating ?? '';
// dd($filtercatgory);

    $universities = [];
    $childs=[];
    if ($filtersub_category != null && $filtersub_category != '') {
        if(isset($study_level)&& $study_level != ''){
            $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->where('type',$study_level)->distinct()->get(['user_id']);
        }
        else{
        $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->distinct()->get(['user_id']);              
    }
    
        foreach ($universitycourse as $key => $univercity) {
            $universities[$key] = $univercity->users;
        }
    
    } 
    else {
        if(isset($filtercatgory) && $filtercatgory != null){
        $check = Category::find($filtercatgory);
        $childcheck = $check->child_category->pluck('id');
        $childerens=$check->child_category;
        // dd($childerens);

        if ($childcheck->count() > 0) {
            foreach($childerens as $keys=>$child){
                $childs[$keys]=$child;

            }
        }


        if ($childcheck->count() > 0) {
            if(isset($study_level) && $study_level != ''){
            $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->where('type',$study_level)->distinct()->get();
            // dd($universitycourse);

            }
            else
            {
                $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->distinct()->get();
            }
            foreach ($universitycourse as $key => $univercity) {
                $universities[$key] = $univercity->users;
            }
        } else {
            if(isset($study_level) && $study_level != ''){
            $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->where('type',$study_level)->distinct()->get();
            }
            else
            {
                $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->distinct()->get();
            }
            foreach ($universitycourse as $key => $univercity) {
                $universities[$key] = $univercity->users;
            }
        }
      }
    }


    return view('frontEnd.university.university_all', compact('filtercatgory','childs','filtersub_category','study_level'))->with('universities', $universities);

        // return view('frontEnd.university.university_all', compact('universities'));
    }

    public function countrySelected(Request $request)
    {

        $courses = University::where('countries_id', $request->countryId)->get();
if($courses->count()>0){
        $output = '<option value="" selected>Select University</option>';
        foreach ($courses as $row) {
            $output .= '<option value="' . $row->user_id . '">' . $row->university_name . '</option>';
        }

        echo $output;
    }else{
        $output = '<option> No Data available</option>';
        echo $output;

    }
    }
    public function universityWiseConsultant(Request $request)
    {

        $universities = [];
        if ($request->univercity_id || $request->univercity_id != '' || $request->univercity_id != null) {
            $universityconsultants = UniversityConsultant::where('university_id', $request->univercity_id)->get();

            foreach ($universityconsultants as $key => $univercity) {

                $consultants = $univercity->userConsultant;

                if ($consultants != null) {

                    $universities[$key] = $consultants;
                } else {
                    $universities = [];
                }
            }
        } else {
            $query = User::where('countries_id', $request->countries_id)->where('status',1)->with(['consultant'])->get();

            foreach ($query as $key => $que) {

                $universities[$key] = $que;
            }
        }



        return view('frontEnd.consultant.consultant_all')->with('consultants', $universities);
    }

    public function consultantsInnerFilter(Request $request)
    {


        $consultants = [];
        if ($request->keyword != null) {
            $keyword = $request->keyword;

            $users = User::with(['consultant' => function ($q) use ($keyword) {
                $q->where('company_name', 'LIKE', '%' . $keyword . '%');
            }])->get();


            foreach ($users as $key => $user) {
                if ($user->isConsultant()) {
                    if ($user->consultant != null) {
                        $consultants[$key] = $user;
                    }
                }
            }
        } else {


            $query = User::where('countries_id', $request->countries_id)->where('status',1)->with(['consultant'])->get();

            foreach ($query as $key => $que) {

                $consultants[$key] = $que;
            }
        }



        return view('frontEnd.consultant.consultant_all', compact('consultants'));
    }
}
