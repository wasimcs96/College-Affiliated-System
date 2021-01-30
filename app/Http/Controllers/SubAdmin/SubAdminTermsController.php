<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Str;
class SubAdminTermsController extends Controller
{

    public function index()
    {
        return view('admin.general.terms');
    }
    public function store(Request $request)
    {
     //    dd($request->all)
     //    dd($request->all());
    //  if($request->hasFile('image')){
    //  $image=$request->image;
    //     $profile_image_new_name = time().$image->getClientOriginalName();
    //     $image->move(Config::get('define.image.page_banner'),$profile_image_new_name);
    //     $banner= Config::get('define.image.page_banner').'/'.$profile_image_new_name;
    // };
    $store=Page::where('page_type',$request->page_type)->get()->first();
 if($store == null){
         Page::create([
             'title'=>$request->title,
             'page_type'=>2,
             'slug'=>2,
             'description'=>$request->description,
             'short_description'=>$request->short_description,
             'sub_title'=>$request->sub_title,
             'status'=>1,

         ]);

         return redirect()->route('admin.general.terms')->with('success','Terms & Condition Submitted successfully');
     }
     else{
        //  if($request->hasFile('image')){
        //      $image=$request->image;
        //         $profile_image_new_name = time().$image->getClientOriginalName();
        //         $image->move(Config::get('define.image.page_banner'),$profile_image_new_name);
        //         $store->banner=Config::get('define.image.page_banner').'/'.$profile_image_new_name;
        //     };

         $store->title = $request->title;
         $store ->page_type = 2;
         $store ->slug = 2;
         $store ->description = $request->description;
         $store ->short_description = $request->short_description;
         $store ->sub_title = $request->sub_title;
         $store ->status = 1;
         $store->save();
         // $store ->banner = $banner;
         return redirect()->route('admin.general.terms')->with('success','Terms & Condition Submitted successfully');
     }
    }

}
