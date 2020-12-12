<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use App\Models\UniversityMedia;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UniversityMediaController extends Controller
{

    public function imagestore(Request $request)
    {
    $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('image',$name);
            $images[]=$name;
        }
    }
    /*Insert your data*/

    UniversityMedia::insert( [
        'image'=>  implode("|",$images),

        //you can put other insertion here
    ]);


    return redirect('back');

    }

}
