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
use Illuminate\Support\Facades\Cookie;
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
            $filtercatgory = $request->category ?? null;
            $filtersub_category = $request->sub_category ?? null;
            $study_level = $request->study_level ?? null;
            $universities = [];
            $childs=[];
            if ($filtersub_category != null && $filtersub_category != '') {
                if(isset($study_level)&& $study_level != ''){
                    $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->where('type',$study_level)->distinct()->get(['user_id']);
                    foreach ($universitycourse as $key => $univercity) {
                        $universities[$key] = $univercity->users;
                    }
                }
                else{
                $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->distinct()->get(['user_id']);              
                foreach ($universitycourse as $key => $univercity) {
                    $universities[$key] = $univercity->users;
                }
            }
               
            
            } 
            else {

                $check = Category::find($filtercatgory);
                $childcheck = $check->child_category->pluck('id');
                $childerens=$check->child_category;
                

                if ($childcheck->count() > 0) {
                    
                    foreach($childerens as $keys=>$child){
                        $childs[$keys]=$child;

                    }
                    
                }


                if ($childcheck->count() > 0) {
                   
                    if(isset($study_level) && $study_level != ''){
                    $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->where('type',$study_level)->distinct()->get();
                    foreach ($universitycourse as $key => $univercity) {
                        $universities[$key] = $univercity->users;
                    }

                    }
                    else
                    {
                     
                        $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->distinct()->get();
                        foreach ($universitycourse as $key => $univercity) {
                            $universities[$key] = $univercity->users;
                        }
                    }
                    
                  
                } else {
                    if(isset($study_level) && $study_level != ''){
                    $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->where('type',$study_level)->distinct()->get();
                    foreach ($universitycourse as $key => $univercity) {
                        $universities[$key] = $univercity->users;
                    }   
                }
                    else
                    {
                        $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->distinct()->get();
                        foreach ($universitycourse as $key => $univercity) {
                            $universities[$key] = $univercity->users;
                        }
                    }
                   
                }
            }
        
            if (count($universities)>0) {
                $universities=array_unique($universities);
            }
           
           
            return view('frontEnd.university.university_all', compact('filtercatgory','childs','filtersub_category','study_level'))->with('universities', $universities);
        }


    public function countryWiseUniversity(Request $request)
    {
        $typecoming=$request->type ?? null;
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

       
        if (count($universities)>0) {
            $universities=array_unique($universities);
        }
        $page=1;
        

        return view('frontEnd.university.university_all', compact('countrycoming','page','typecoming'))->with('universities', $universities);
    }


    public function universitiesInnerFilter(Request $request)
    {
        
        $universities = [];
        $childs=[];
        $query = User::where('status', 1);


       $countrycoming = $request->countries_id ?? '';
       $typecoming = $request->type ?? null ;

       if ($request->countries_id != null) {
        $query =  $query->where('countries_id', '=',$request->countries_id);
       }

       if ($request->type != '' && $request->type != null) {
        $tape = $request->type;
        if ($request->ielts_rating != '' && $request->ielts_rating != null) {
            $ielts_rating = $request->ielts_rating;
            $query->with(['university' => function ($q) use ($tape,$ielts_rating) {
                $q->where('type', '=', $tape)->where('iltes', '=', $ielts_rating);
            }]);
        }
        else{
            $query->with(['university' => function ($q) use ($tape) {
                $q->where('type', '=', $tape);
            }]);
        }
       
       }

       if ($request->ielts_rating != '' && $request->ielts_rating != null) {
        if ($request->type != '' && $request->type != null) {
            $tape = $request->type;
            $ielts_rating = $request->ielts_rating;
            $query->with(['university' => function ($q) use ($ielts_rating,$tape) {
                $q->where('iltes', '=', $ielts_rating)->where('type', '=', $tape);
            }]);
        }else{
        $ielts_rating = $request->ielts_rating;
        $query->with(['university' => function ($q) use ($ielts_rating) {
            $q->where('iltes', '=', $ielts_rating);
        }]);
    }
       }

       if ($request->filtercatgory != '' && $request->filtercatgory != null) {
        $tape = $request->filtercatgory;
        $check = Category::find($tape);
        $childcheck = $check->child_category->pluck('id');
        $childerens=$check->child_category;
        if ($childcheck->count() > 0) {
            foreach($childerens as $keys=>$child){
                $childs[$keys]=$child;
            }   
        }
        $query->with(['universityCourse' => function ($q) use ($childcheck) {
            $q->whereIn('category_id',$childcheck);
        }]);
       }

       if ($request->filtersub_category != '' && $request->filtersub_category != null) {
        $subtape = $request->filtersub_category;
        $query->with(['universityCourse' => function ($q) use ($subtape) {
            $q->where('category_id', '=', $subtape);
        }]);
       }

       if($request->study_level != null && $request->study_level != ''){
       $st=$request->study_level;
        $query->with(['universityCourse' => function ($q) use ($st) {
            $q->where('type', '=', $st);
        }]);
            }


       if ($request->rating != null) {
        $query =  $query->where('rating', '=',$request->rating);
       }



       $rtd = $query->get();

       foreach ($rtd as $key => $que) {


           if (isset($que->university)) {
               if ($que->university != null && count($que->universityCourse) > 0) {
                   $universities[$key] = $que;
               }
           }
       }
// dd($universities);

    //         if ($request->countries_id != null) {
    //             $query = User::where('countries_id', $request->countries_id);

    //             if ($request->type != '' && $request->type != null) {
    //                 $tape = $request->type;
    //                 $query->with(['university' => function ($q) use ($tape) {
    //                     $q->where('type', '=', $tape);
    //                 }]);
    //             }

    //             $rtd = $query->get();

    //             foreach ($rtd as $key => $que) {


    //                 if (isset($que->university)) {
    //                     if ($que->university != null) {
    //                         $universities[$key] = $que;
    //                     }
    //                 }
    //             }
    //         }
    //         else{
    //             $tape = $request->type;
    //             $query = User:: with(['university' => function ($q) use ($tape) {
    //                 $q->where('type', '=', $tape);
    //             }]);
    //             $rtd = $query->get();

    //             foreach ($rtd as $key => $que) {


    //                 if (isset($que->university)) {
    //                     if ($que->university != null) {
    //                         $universities[$key] = $que;
    //                     }
    //                 }
    //             }
    //         }
     

    $filtercatgory = $request->filtercatgory ?? '';
    $filtersub_category = $request->filtersub_category ?? '';
    $study_level = $request->study_level ?? null;
    $rating = $request->rating ?? '' ;
    $ielts_rating = $request->ielts_rating ?? '';
// dd($request->study_level);
    

    // if ($filtersub_category != null && $filtersub_category != '') {
    //     if(isset($study_level)&& $study_level != ''){
    //         $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->where('type',$study_level)->distinct()->get(['user_id']);
    //     }
    //     else{
    //     $universitycourse = UniversityCourse::where('category_id', $filtersub_category)->distinct()->get(['user_id']);              
    // }
    
    //     foreach ($universitycourse as $key => $univercity) {
    //         $universities[$key] = $univercity->users;
    //     }
    
    // } 
    // else {
    //     if(isset($filtercatgory) && $filtercatgory != null){
    //     $check = Category::find($filtercatgory);
    //     $childcheck = $check->child_category->pluck('id');
    //     $childerens=$check->child_category;
    //     // dd($childerens);

    //     if ($childcheck->count() > 0) {
    //         foreach($childerens as $keys=>$child){
    //             $childs[$keys]=$child;

    //         }
    //     }


    //     if ($childcheck->count() > 0) {
    //         if(isset($study_level) && $study_level != ''){
    //         $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->where('type',$study_level)->distinct()->get();
    //         // dd($universitycourse);

    //         }
    //         else
    //         {
    //             $universitycourse = UniversityCourse::whereIn('category_id', $childcheck)->distinct()->get();
    //         }
    //         foreach ($universitycourse as $key => $univercity) {
    //             $universities[$key] = $univercity->users;
    //         }
    //     } else {
    //         if(isset($study_level) && $study_level != ''){
    //         $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->where('type',$study_level)->distinct()->get();
    //         }
    //         else
    //         {
    //             $universitycourse = UniversityCourse::where('category_id',  $filtercatgory)->distinct()->get();
    //         }
    //         foreach ($universitycourse as $key => $univercity) {
    //             $universities[$key] = $univercity->users;
    //         }
    //     }
    //   }
    // }

    if (count($universities)>0) {
        $universities=array_unique($universities);
    }
  
    return view('frontEnd.university.university_all', compact('universities','filtercatgory','childs','filtersub_category','study_level','countrycoming','typecoming','rating','ielts_rating'));
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
         $curloc=json_decode($_COOKIE['curloc']);

         $ata=[];
         $googleAddress=$request->googleAddress;
     if ($googleAddress != null && $googleAddress != '') {
          $formattedAddr = str_replace(' ','+',$googleAddress);
          $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyC1jKOFLhfQoZD3xJISSPnSW9-4SyYPpjY&address='.$formattedAddr.'&sensor=false');
          $output = json_decode($geocodeFromAddr);
          //Get latitude and longitute from json data
          $ata['latitude']  = $output->results[0]->geometry->location->lat;
          $ata['longitude'] = $output->results[0]->geometry->location->lng;
         }
     else{
          $ata['latitude']  =  $curloc->lat;
          $ata['longitude'] =$curloc->lng;
         }
         $radius=50;

    if ($request->service == 1) {
        $query = User::where('status',1)->where('countries_id', $request->countries_id)->pluck('id');
        $universityConsultant=UniversityConsultant::whereIn('university_id',$query)->pluck('consultant_id');

        $consultants=User::whereIn('id',$universityConsultant)->get();

        foreach ($consultants as $key => $que) {
            $R = 3958.8; // Radius of the Earth in miles
         
            $rlat1 = floatval($ata['latitude']) * (pi()/180); // Convert degrees to radians
            $rlat2 = floatval($que->latitude) * (pi()/180);
            $difflat = $rlat2-$rlat1; // Radian difference (latitudes)
            $difflon = (floatval($que->longitude)-floatval($ata['longitude'])) * (pi()/180); // Radian difference (longitudes)
            
            $d = 2 * $R * asin(sqrt(sin($difflat/2)*sin($difflat/2)+cos($rlat1)*cos($rlat2)*sin($difflon/2)*sin($difflon/2)));
            // dd($d);
            if(floatval($radius) >= $d){
                $universities[$key] = $que;
            }
        }
       
    }
    else{
        $consultants=DB::table("consultant_pr_migration_countries")
        ->whereRaw("find_in_set('$request->countries_id',country_id)")
        ->pluck('user_id');
       if (count($consultants) > 0) {
        foreach ($consultants as $key => $value) {
            $us= User::find($value);
            $R = 3958.8; // Radius of the Earth in miles
         
            $rlat11 = floatval($ata['latitude']) * (pi()/180); // Convert degrees to radians
            $rlat22 = floatval($us->latitude) * (pi()/180);
            $difflat = $rlat22-$rlat11; // Radian difference (latitudes)
            $difflon = (floatval($us->longitude)-floatval($ata['longitude'])) * (pi()/180); // Radian difference (longitudes)
            
            $d2 = 2 * $R * asin(sqrt(sin($difflat/2)*sin($difflat/2)+cos($rlat11)*cos($rlat22)*sin($difflon/2)*sin($difflon/2)));
            if ($us->consultant->pr_service == 1 && floatval($radius) >= $d2) {
            $universities[$key]= $us;
            }
        }
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
