<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use App\Models\UniversityMedia;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\University;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UniversityMediaController extends Controller
{

    public function mediastore(Request $request)
    {
    $images=array();
    if($files=$request->file('media')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('media',$name);
            $images[]=$name;
        }
    }
    /*Insert your data*/
    $id = Auth()->user()->university->id;
             $user = University::find($id);

    UniversityMedia::insert( [

        'university_id'=>$user->id,
        'media'=>  implode("|",$images),
        'link'=> $request->link,
        //you can put other insertion here
    ]);


    return redirect()->route('university.profile')->with('Success','Media Uploaded successfully');
}


    }

