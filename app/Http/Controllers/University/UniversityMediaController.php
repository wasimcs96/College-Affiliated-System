<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use App\Models\UniversityMedia;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\University;
use Sessions;
use Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UniversityMediaController extends Controller
{

    public function mediastore(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'images.*' => 'dimensions:min_width=446,min_height=258',
            // 'link' => 'required|url',
             ]);
        // dd(collect($request->images));
    $images=collect($request->images);
    // dd(auth()->user());
    $id = auth()->user()->university->id;

     foreach($images as $image){
        $name= time().$image->getClientOriginalName();
           $type=0;
               $st= $image->move(Config::get('define.image.media'),$name);
       $newname= Config::get('define.image.media').'/'.$name;

        UniversityMedia::create( [

            'user_id'=>auth()->user()->id,
            'media'=>  $newname,

            'file_type' => $type
            //you can put other insertion here
        ]);
     }
if ($request->link != null) {
    UniversityMedia::create( [

        'user_id'=>auth()->user()->id,
         'link'=>$request->link,
        'file_type' => 2
        //you can put other insertion here
    ]);
}
// dd($request->video);
    if ($request->video != null) {
        $video = $request->video;
        $name= time().$video->getClientOriginalName();
        $st= $video->move(Config::get('define.video.video'),$name);
        $newname2 = Config::get('define.video.video').'/'.$name;
        UniversityMedia::create([
            'user_id'=>auth()->user()->id,
            'media'=>$newname2,
            'file_type' => 1
            //you can put other insertion here
        ]);
    }




    return redirect()->route('university.media')->with('success','Media Uploaded successfully');
}


public function destroy(Request $request){
// dd($id);
$id=$request->media_id;
    UniversityMedia::find($id)->delete($id);
    // $university = UniversityMedia::where('id',$request->media_id)->get()->first();
    // dd($university->toArray());
    // $university->delete();

    return response()->json([
        'success' => 'image deleted successfully!'
    ]);
    // $university->save();
// return response('success');
//  return redirect()->back()->with ('success','Image deleted Successfully');
}


    }

    // User::find($id)->delete($id);

    // return response()->json([
    //     'success' => 'Record deleted successfully!'
    // ]);

