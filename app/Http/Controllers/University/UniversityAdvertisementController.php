<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Carbon;

class UniversityAdvertisementController extends Controller
{
    public function index()
    {
        return view('university.advertisement.advertisement');
    }

    public function add()
    {

        return view('university.advertisement.advertisement_add');
    }

    public function store(Request $request)
    {
     $expire=$request->expire_date;
     $new=Carbon::now()->addMonths($expire);
     $dt= $new->format('Y-m-d');


     if($request->hasFile('image'))
     {
         $ad_image = $request->image;
         $ad_image_new_name = time().$ad_image->getClientOriginalName();
         $ad_image->move('uploads/banner',$ad_image_new_name);
         $newname='uploads/banner/'.$ad_image_new_name;
     }
     Advertisement::create([

         'user_id'=>auth()->user()->id,
         'banner_image'=>  $newname,
         'user_type'=>1,
         'status'=>0,
         'expire_date'=> $dt,
     ]);

        return redirect('university.advertisement.advertisement')->with('success','Advertisement updated successfully');
    }

}