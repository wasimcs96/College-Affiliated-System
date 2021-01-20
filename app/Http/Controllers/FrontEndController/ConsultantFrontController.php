<?php

namespace App\Http\Controllers\FrontEndController;

use App\Models\User;
use App\Models\Consultant;
use App\Models\UniversityConsultant;
use App\Models\University;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ConsultantAvailableSlots;
use App\Models\UniversityCourse;
use Sessions;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ConsultantFrontController extends Controller
{


    public function index_all()
    {
        $universities=User::all();
        return view('frontEnd.consultant.consultant_all')->with('consultants',User::all());
    }

    public function index_single($id)
    {
        $consultant = User::find($id);

        $consultantUniversity = UniversityConsultant::where('consultant_id',$consultant->id)->paginate(1);

        return view('frontEnd.consultant.consultant_detail',compact('consultantUniversity'))->with('consultant', $consultant);
    }

    public function book(Request $request)
    {
        // dd($request->all());

        $universityid = $request->get('universityid');
        $consultantid = $request->get('consultantid');

        $consultant = User::find($consultantid);
// dd($consultant);
        return view('frontEnd.consultant.book',compact('universityid','consultant'))->with('countries',Country::all());

    }

    function slots(Request $request)
    {
        // dd($request->all());


        $dat=date('m-d-Y');

        $select = $request->get('select');
        $value = $request->get('value');

        $consultantid = $request->get('consultantid');
        $dt=strtotime($value);

            $vr=date('w',$dt);

            $data = ConsultantAvailableSlots::where('user_id',$consultantid)->where('week_day',$vr)->get();


            $output='';
            foreach($data as $row)
            {

             $output .= '<option value="'.$row->start_slot_time.'-'.$row->end_slot_time.'">'.$row->start_slot_time.'-'.$row->end_slot_time.'</option>';
            }
            echo $output;


    }

    function fetch_Course(Request $request)
    {
        $fetch=User::where('id',$request->universityid)->first();
        $courses =  $fetch->universityCourse;


        $output='';
        foreach($courses as $row)
        {
         $output .= '<option value="'.$row->Course->id.'">'.$row->Course->name.'</option>';
        }
        echo $output;
        // dd();
    }


    public function book_store(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
        'start_time'=>'required',
        'booking_date'=>'required',
        'banner_images' => 'required',

         ]);


        $time = explode("-" ,$request->start_time);
        $start_time = $time[0];
        $end_time = $time[1];
        // dd($time[1]);
        // dd($request->all());
        // dd($request->uid);
        $bookind_date=strtotime($request->booking_date);
        $bookind_date= date('Y-m-d');
// dd($bookind_date);
        $json = json_encode($request->banner_images);
        // dd($json);
        $consultantBooking = Booking::create([
            'booking_start_time'=>$start_time,
            'booking_end_time'=>$end_time,
            'client_id'=>$request->client_id,
            'consultant_id'=>$request->cid,
            'enquiry'=>$json,
            'booking_date'=>$bookind_date,
            // 'comments'=>$request->comment,
            'status'=>0,
            'booking_for'=>0,
            ]);
            return redirect()->route('client.dashboard')->with('success','Your Application have been Submitted Successfully');

    }

    public function fetch(Request $request)
    {
        $universities=User::where('countries_id',$request->universitycountry)->get();
        // dd($countryuniversity->all());
        // $universities = User::where('countries_id',$request->countryid)->get();
        //   dd( $universities->get()->toArray());
        $output='';
        foreach($universities as $university)
        {
        if($university->isUniversity())
            {

                $profile=$university->profile_image;

              $output .='<div class="card-img">
              <a href="'.route('university_detail',['id'=>$university->id]).'" class="d-block">
                  <img src="'.asset($profile).'" alt="hotel-img">

              </a>
              <span class="badge">Featured </span>
          </div>
          <div class="card-body">
              <h3 class="card-title"><a href="'.route('university_detail',['id'=>$university->id]).'">'.$university->first_name.'</a></h3>
              <p class="card-meta">'.$university->last_name.'</p>
              <div class="card-rating d-flex align-items-center pt-1">
                  <span class="rating__text">University star</span>
                  <span class="ratings d-flex align-items-center mx-2">
                      <i class="la la-star"></i>
                      <i class="la la-star"></i>
                      <i class="la la-star"></i>
                      <i class="la la-star"></i>
                      <i class="la la-star"></i>
                  </span>
                  <span class="rating__text">5 of 5</span>
              </div>
              <div class="card-price d-flex align-items-center justify-content-between">
                  <p>

                  </p>
                  <a href="'.route('university_detail',['id'=>$university->id]).'" class="theme-btn theme-btn-small">Book Now</a>
              </div>
          </div>';

            }
        }
        echo $output;
    }

}
