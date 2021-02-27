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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ConsultantFrontController extends Controller
{


    public function index_all()
    {
        $universities = User::where('status',1)->get();
        return view('frontEnd.consultant.consultant_all')->with('consultants', User::where('status',1)->get());
    }

    public function index_single($id)
    {
        $consultant = User::find($id);

        $consultantUniversity = UniversityConsultant::where('consultant_id', $consultant->id)->get();

        return view('frontEnd.consultant.consultant_detail', compact('consultantUniversity'))->with('consultant', $consultant);
    }

    public function book(Request $request)
    {
        // dd($request->all());

        $universityid = $request->get('universityid');
        $consultantid = $request->get('consultantid');

        $consultant = User::find($consultantid);
        // dd($consultant);
        return view('frontEnd.consultant.book', compact('universityid', 'consultant'))->with('countries', Country::all());
    }

    function slots(Request $request)
    {

        $datanew = [];

        $dat = date('m-d-Y');

        $select = $request->get('select');
        $value = $request->get('value');

        $consultantid = $request->get('consultantid');
        $dt = strtotime($value);

        $vr = date('w', $dt);
        $check = date('Y-m-d', $dt);
        //  dd($check);
        $bookings = Booking::where('booking_date', $check)->where('status','!=',3)->get();
        if ($bookings->count() > 0) {


        foreach ($bookings as $key => $booking) {

            $datanew[] = "'.$booking->booking_start_time.'-'.$booking->booking_end_time.'";
        }
    }

        $data = ConsultantAvailableSlots::where('user_id', $consultantid)->where('week_day', $vr)->get();


        $output = '';
        foreach ($data as $row) {

            $time = "'.$row->start_slot_time.'-'.$row->end_slot_time.'";
            if (in_array($time, $datanew)) {
                $message = "disabled='disabled'";
            } else {
                $message = "";
            }

            $output .= '<option ' . $message . ' value="' . $row->start_slot_time . '-' . $row->end_slot_time . '">' . $row->start_slot_time . '-' . $row->end_slot_time . '</option>';
        }
        echo $output;
    }

    function fetch_Course(Request $request)
    {
        // dd($request->all());
        $fetch = User::where('id', $request->universityid)->where('status',1)->first();

        $courses =  $fetch->universityCourse;
        $output = '<option value="" selected>Choose Course</option>';
        foreach ($courses as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->title . '</option>';
        }
        echo $output;
    }


    public function book_store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'start_time' => 'required',
            'booking_date' => 'required',
            'banner_images' => 'required',

        ]);


        $time = explode("-", $request->start_time);
        $start_time = $time[0];
        $end_time = $time[1];
        // dd($time[1]);
        // dd($request->all());
        // dd($request->uid);
        $bookind_date = strtotime($request->booking_date);
        $book_date = date('Y-m-d',$bookind_date);
        $json = json_encode($request->banner_images);
        $consultantBooking = Booking::create([
            'booking_start_time' => $start_time,
            'booking_end_time' => $end_time,
            'client_id' => $request->client_id,
            'consultant_id' => $request->cid,
            'enquiry' => $json,
            'booking_date' =>  $book_date,
            'status' => 0,
            'booking_for' => 0,
        ]);
          $consultant = User::where('id',$request->cid)->first();
          $id=$consultantBooking->id;
        // // Important Code
        //     $replacement['CONSULTANT_NAME'] = $consultant->first_name.' '.$consultant->last_name;
        //     $replacement['STUDENT_NAME'] = auth()->user()->first_name.' '.auth()->user()->last_name;
        //     $replacement['ADDRESS'] = $consultant->address_1;
        //     $replacement['SERVICE_NAME'] = 'Student Booking';
        //     $replacement['BOOKING_LINK'] = 'http://kamercio.com/campusInterest/public/client/bookings/show/'.$id;
        //     $data = ['template'=>'booking','hooksVars' => $replacement];
        //     mail::to(auth()->user()->email)->send(new \App\Mail\ManuMailer($data));

        return redirect()->route('client.dashboard')->with('success', 'Your Booking has been Submitted Successfully');
    }

    public function fetch(Request $request)
    {
        $universities = User::where('countries_id', $request->universitycountry)->get();
        // dd($countryuniversity->all());
        // $universities = User::where('countries_id',$request->countryid)->get();
        //   dd( $universities->get()->toArray());
        $output = '';
        foreach ($universities as $university) {
            if ($university->isUniversity()) {

                $profile = $university->profile_image;

                $output .= '<div class="card-img">
              <a href="' . route('university_detail', ['id' => $university->id]) . '" class="d-block">
                  <img src="' . asset($profile) . '" alt="hotel-img">

              </a>
              <span class="badge">Featured </span>
          </div>
          <div class="card-body">
              <h3 class="card-title"><a href="' . route('university_detail', ['id' => $university->id]) . '">' . $university->first_name . '</a></h3>
              <p class="card-meta">' . $university->last_name . '</p>
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
                  <a href="' . route('university_detail', ['id' => $university->id]) . '" class="theme-btn theme-btn-small">Book Now</a>
              </div>
          </div>';
            }
        }
        echo $output;
    }

    public function addUniversity(Request $request)
    {
// dd($request->all());
$consultant = User::find(auth()->user()->id);
$consultant->add_university = 1;
$consultant->save();
$universities = $request->university_id;
foreach($universities as $key=>$university)
{
UniversityConsultant::create([
'university_id' => $university,
'consultant_id' => auth()->user()->id,
'status' => 1,
]);
}
return response('success');
// return redirect()->back()->with('success','University Selected Successfully');
    }

    public function skipUniversity(Request $request)
    {
// dd($request->all());
$consultant = User::find(auth()->user()->id);
$consultant->add_university = 1;
$consultant->save();


return response('success');
// return redirect()->back()->with('success','University Selected Successfully');
    }

}
