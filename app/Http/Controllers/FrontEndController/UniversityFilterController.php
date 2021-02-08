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
        $output = '<div class="select-contain w-auto">
        <div class="dropdown bootstrap-select select-contain-select"><select id="selectcourse" name="sub_category" class="select-contain-select" style="height: 52px;" tabindex="-98">
            <option value="" selected="">Select Sub Category</option>
        </select><button type="button" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-4" aria-haspopup="listbox" aria-expanded="false" data-id="selectcourse" title="Select Sub Category"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Select Sub Category</div></div> </div></button><div class="dropdown-menu "><div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off" placeholder="Search" role="combobox" aria-label="Search" aria-controls="bs-select-4" aria-autocomplete="list"></div><div class="inner show" role="listbox" id="bs-select-4" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
    </div>';
        foreach ($courses as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->title . '</option>';
        }
        $output .='</select></div>';
        echo $output;
    }else{
        $output = '<option value="" selected>No Data Available</option>';
        echo $output;


    }
    }
    public function courseWiseUniversity(Request $request)
    {


        $category = $request->category ?? '';
        $sub_category = $request->sub_category ?? '';



        $universities = [];
        $childs=[];
        if ($sub_category != null && $sub_category != '') {
            $universitycourse = UniversityCourse::where('category_id', $sub_category)->distinct()->get(['user_id']);

            foreach ($universitycourse as $key => $univercity) {
                $universities[$key] = $univercity->users;
            }
        } else {


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
        }


        return view('frontEnd.university.university_all', compact('category','childs'))->with('universities', $universities);
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
        }




        return view('frontEnd.university.university_all', compact('universities'));
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
            $query = User::where('countries_id', $request->countries_id)->with(['consultant'])->get();

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


            $query = User::where('countries_id', $request->countries_id)->with(['consultant'])->get();

            foreach ($query as $key => $que) {

                $consultants[$key] = $que;
            }
        }



        return view('frontEnd.consultant.consultant_all', compact('consultants'));
    }
}
