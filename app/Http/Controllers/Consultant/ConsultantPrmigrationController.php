<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantPrMigrationCountry;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\Booking;
class ConsultantPrmigrationController extends Controller

{
    public function index(){

            $countries=Country::all();
            $cc =auth()->user()->consultantPrMigrationCountry->country_id ?? '';

            $consultantCountries=explode(",",$cc);

            //  dd($consultantCountries);
            return view('consultant.prmigration.prmigration',compact('countries', 'consultantCountries'));
       }

       public function store(Request $request){
        //    dd($request->all());
        $au=auth()->user()->id;
        $consultant = ConsultantPrMigrationCountry::where('user_id',$au)->get()->first();
        $pr = Consultant::where('user_id',auth()->user()->id)->get()->first();
        $pr->pr_service = $request->pr_service;
        $pr->save();
        if($consultant == null)
        {
        // $json=json_encode($request->country);
        $json= collect($request->country)->implode(',');
        // dd($json);
        $prmigration=ConsultantPrMigrationCountry::create([
        'user_id' => $au ,
        'country_id'=> $json,
        ]);
            $countries=Country::all();
            return redirect(compact('countries'))->back()->with('success', 'Profile Updated Succefully.');
        }
        else
        {
            $json=collect($request->country)->implode(',');
            $consultant->country_id = $json;
            $consultant->save();

            return redirect()->back()->with('success', 'Profile Updated Succefully.');
        }
       }

       public function prindex()
       {
         $book = auth()->user()->consultantBooking;
         $bookings = Booking::where('consultant_id',auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        //  dd($bookings);
         return view('consultant.prmigration.prmigration')->with('bookings', $book);
       }

       public function prshow($id)
       {
           $show = Booking::where('id',$id)->first();
       //     $university = [];
       //     $course = [];
       //     $enq = $show->enquiry;
       //     $queries = json_decode($enq,true);

       //     $i = 0;
       //  //    dd($queries);
       //     if(isset($queries))
       //     {
       //          foreach($queries as $query)
       //          {

       //              $university_id[$i] = $query['university'] ?? '';
       //              $course_id[$i] = $query['course'] ?? '';
       //              $university[$i] =  User::where('id',$university_id[$i])->get()->first();
       //              // dd($university);
       //              $course[$i] = Course::where('id',$course_id[$i])->get()->first();
       //              $i++;

       //          }
       //      }


           return view('consultant.prmigration.prmigration_show',compact('show'));
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

}
