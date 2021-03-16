<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
use Json;
use Config;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;
use App\Models\ApplicationAppliedUniversity;
use App\Models\University;
use App\Models\UniversityCourse;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ApplicationDocument;
use App\Models\UniversityConsultant;

class ConsultantBookingController extends Controller
{
   public function index()
   {
    //  $book = auth()->user()->consultantBooking;
     $book = Booking::where('consultant_id',auth()->user()->id)->orderByDesc('updated_at')->get();
    //  $bookings = Booking::orderBy('booking_date', 'DESC')->get();
    //  dd($bookings);
    // dd(auth()->user()->id);
     return view('consultant.booking.bookings')->with('bookings', $book);
   }

   public function show($id)
   {
       $show = Booking::where('id',$id)->first();
       $university = [];
       $course = [];
       $enq = $show->enquiry;
       $queries = json_decode($enq,true);

       $i = 0;
    //    dd($queries);
       if(isset($queries))
       {
            foreach($queries as $query)
            {

                $university_id[$i] = $query['university'] ?? '';
                $course_id[$i] = $query['course'] ?? '';
                $university[$i] =  User::where('id',$university_id[$i])->get()->first();
                $course[$i] = UniversityCourse::where('id',$course_id[$i])->get()->first();
                $i++;

            }
        }
       return view('consultant.booking.booking_show',compact('show','university','course'));
   }

   public function accept(Request $request)

   {
// dd($request->all());
        $booking = Booking::find($request->booking_id);
    //    dd($booking);

        $booking->status = 1;
        $booking->save();
        return response('success');

//      return view('consultant.booking.booking_show');
   }

   public function decline(Request $request)

   {
// dd($request->all());
        $booking = Booking::find($request->booking_id);
    //    dd($booking);

        $booking->status = 3;
        $booking->save();
        return response('success');

//      return view('consultant.booking.booking_show');
   }

public function application($id)
{
    $book = Booking::where('id',$id)->get()->first();
    $courses = UniversityCourse::all();
    $countries = Country::all();
    return view('consultant.booking.booking_application',compact('book','courses','countries'));
}


public function applicationStore(Request $request){
    //  dd($request->all());
    // $clientExists = Application::where('client_id',$request->client_id)->where('status',0)->first();

    $bookingStatus = Booking::where('id',$request->booking_id)->first();
    $bookingStatus->status = 2;
    $bookingStatus->comments = $request->note;
    $bookingStatus->save();
    // if($clientExists==null){
    $jsonApplication = $request->document;
    $jsonApplicationStore = json_encode($jsonApplication);
    $store=Application::create([
        'booking_id' => $request->booking_id,
        'client_id' => $request->client_id,
        'consultant_id' => $request->consultant_id,
        'note' => $request->note,
        'status' => 0,
        'documents' => $jsonApplicationStore,
        // 'documents'=> $json,
    ]);
    $store->save();
     $i = 0;
    $jsonUniversity = $request->documents;
    $jsonUniversityStore=json_encode($jsonUniversity);
    foreach($request->university as $key => $univers)
    {
        $storeUniversity = ApplicationAppliedUniversity::create([
        'university_id' => $univers,
        'course_id' => $request->course[$key],
        'application_id' => $store->id,
        'country_id' => $request->country[$key],
        // 'documents' =>$jsonApplicationStore,
        ]);
        // $university_name[$i] = $univers->university->university_name;
// dd($univers);
    }
    $documentes = collect($request->documents);
// dd(collect($request->documents));
        foreach($documentes as $doc)
        {
            $applicationDocument = ApplicationDocument::create([
                'application_id' => $store->id,
            ]);
            // dd($document);
            //    $documentSave = $value;
           $doc_new_name = time().$doc->getClientOriginalName();
           $doc->move(Config::get('define.image.document'),$doc_new_name);

           $applicationDocument->file = Config::get('define.image.document').'/'.$doc_new_name;
           $applicationDocument->save();
        }

        $userEmail = User::where('id',$request->client_id)->first();
        $email = $userEmail->email;
        $aid = $store->id;
        // Important Code
            $replacement['APPLICATION_LINK'] = 'https://campusinterest.com/client/applications/show/'.$aid;
            $data = ['template'=>'application','hooksVars' => $replacement];
            mail::to($email)->send(new \App\Mail\ManuMailer($data));
        return redirect()->route('consultant.application')->with('success','Application Created Successfully');
    // }
    // else
    // {
    //     return redirect()->route('consultant.application')->with('warning','Application Already Created Check the Following List');
    // }
}

    function fetchCourse(Request $request)
    {
        // dd($request->all());
        $fetch=User::where('id',$request->universityid)->first();
        $courses =  $fetch->universityCourse;
        $output='<option value="" selected>Select Course Name</option>';
        foreach($courses as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->title.'</option>';
        }
        echo $output;
    }

    function fetchUniversity(Request $request)
    {
        // dd($request->all());
        $fetch=Country::where('countries_id',$request->countryid)->first();
        // dd($fetch);
        $universities = User::where('countries_id',$request->countryid)->get();
        //   dd( $universities->get()->toArray());
        $output='<option value="" selected>Select University Name</option>';
        if($universities->count()>0){
            foreach($universities as $university)
            {
                $check=UniversityConsultant::where('university_id',$university->id)->where('consultant_id',auth()->user()->id)->first();
                if ($check) {
            if($university->isUniversity())
                {

                $output .= '<option value="'.$university->id.'">'.$university->first_name.'</option>';

                }
            }
        }
    }else{
        $output='<option value="" selected>University Unavailable</option>';
    }
        echo $output;
    }


    function checkCourse(Request $request)
    {
        // dd($request->all());
        $applications=Application::where('client_id',$request->client_id)->get();
        // dd($applications);
        if($applications->count()>0)
        {
            foreach($applications as $application)
            {
                // dd($application->id);
                $checks = DB::table('application_applied_universities')->where('application_id',$application->id)->where('university_id',$request->university)->where('course_id',$request->course)->where('is_closed',0)->count();
            }
        }

        $output='';
           if($checks>0)
           {
               $output .= '<span style="color: red;">This Course is running in a different Application</span>' ;
           }
        //    dd($checks);
           echo $output;
    }

        // dd($output);

}

