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
        $this->validate($request,[
            // 'images.*' => 'dimensions:min_width=100,min_height=100,max_width=1024,max_height=640',
            // 'link' => 'required|url',
             ]);
        // dd(collect($request->images));
    $images=collect($request->images);
    // dd(auth()->user());
    $id = auth()->user()->university->id;

     foreach($images as $image){
        $name= time().$image->getClientOriginalName();
           $type=0;
               $st= $image->move('uploads/media',$name);
       $newname='uploads/media/'.$name;

        UniversityMedia::create( [

            'university_id'=>auth()->user()->university->id,
            'media'=>  $newname,

            'file_type' => $type
            //you can put other insertion here
        ]);
     }
if ($request->link != null) {
    UniversityMedia::create( [

        'university_id'=>auth()->user()->university->id,
         'link'=>$request->link,
        'file_type' => 2
        //you can put other insertion here
    ]);
}



    return redirect()->route('university.media')->with('Success','Media Uploaded successfully');
}


public function destroy($id){

    UniversityMedia::find($id)->delete($id);
    // $university = UniversityMedia::where('id',$request->media_id)->get()->first();
    // dd($university->toArray());
    // $university->delete();

    // return response()->json([
    //     'success' => 'image deleted successfully!'
    // ]);
//     $university->save();
// return response('success');
 return redirect()->back()->with ('success','Image deleted Successfully');
}


    }


