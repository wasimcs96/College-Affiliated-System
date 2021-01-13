<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
use Json;
use Config;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Application;
use App\Models\ApplicationAppliedUniversity;
use App\Models\University;
use App\Models\Course;
use App\Models\User;
use App\Models\Country;
use App\Models\ApplicationDocument;


class ConsultantBookingController extends Controller
{
   public function index()
   {
     $book = auth()->user()->consultantBooking;
    //  $bookings = Booking::orderBy('booking_date', 'DESC')->get();
    //  dd($bookings);
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
                // dd($university);
                $course[$i] = Course::where('id',$course_id[$i])->get()->first();
                $i++;

            }
        }

    //    $university0 =  University::where('id',$university_id[0])->get()->first();
    //    $university1 =  University::where('id',$university_id[1])->get()->first();
    //    $university2 =  University::where('id',$university_id[2])->get()->first();

    //    $course0 = Course::where('id',$course_id[0])->get()->first();
    //    $course1 = Course::where('id',$course_id[1])->get()->first();
    //    $course2 = Course::where('id',$course_id[2])->get()->first();
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

public function application($id)
{
    $book = Booking::where('id',$id)->get()->first();
    $courses = Course::all();
    $countries = Country::all();
    return view('consultant.booking.booking_application',compact('book','courses','countries'));
}


public function applicationStore(Request $request){
    // dd($request->document);
    $clientExists = Application::where('client_id',$request->client_id)->first();
    if($clientExists==null){
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
    // $i = 0;
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

        return redirect()->route('consultant.application')->with('success','Application Created Successfully');
    }
    else
    {
        return redirect()->route('consultant.application')->with('warning','Application Already Created Check the Following List');
    }
}

    function fetchCourse(Request $request)
    {
        // dd($request->all());
        $fetch=User::where('id',$request->universityid)->first();
        $courses =  $fetch->universityCourse;
        $output='<option value="" selected>Course Name</option>';
        foreach($courses as $row)
        {
         $output .= '<option value="'.$row->Course->id.'">'.$row->Course->name.'</option>';
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
        $output='<option value="" selected>University Name</option>';
        foreach($universities as $university)
        {
        if($university->isUniversity())
            {

              $output .= '<option value="'.$university->id.'">'.$university->first_name.'</option>';

            }
        }
        // dd($output);
        echo $output;
    }

}
