<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Config;
// use Illuminate\Support\Str;

class AdminAboutController extends Controller
{

   public function index()
   {
       return view('admin.general.about');
   }
   public function store(Request $request)
   {
    //    dd($request->all)
    //    dd($request->all());
//     if($request->hasFile('image')){
//     $image=$request->image;
//        $profile_image_new_name = time().$image->getClientOriginalName();
//        $image->move(Config::get('define.image.page_banner'),$profile_image_new_name);
//        $banner= Config::get('define.image.page_banner').'/'.$profile_image_new_name;
//    };
   $store=Page::where('page_type',$request->page_type)->get()->first();
if($store == null){
        Page::create([
            'title'=>$request->title,
            'page_type'=>0,
            // 'slug'=>Str::slug($request->short_description),
            'description'=>$request->description,
            'short_description'=>$request->short_description,
            'sub_title'=>$request->sub_title,
            'status'=>$request->type,
            'banner'=>$banner
        ]);

        return redirect()->route('admin.general.about')->with('success','About us Submitted successfully');
    }
    else{
        // if($request->hasFile('image')){
        //     $image=$request->image;
        //        $profile_image_new_name = time().$image->getClientOriginalName();
        //        $image->move($profile_image_new_name);
        //        $store->banner=Config::get('define.image.page_banner').'/'.$profile_image_new_name;
        //    };

        $store->title = $request->title;
        $store ->page_type = 0;
        // $store ->slug = Str::slug($request->title);
        $store ->description = $request->description;
        $store ->short_description = $request->short_description;
        $store ->sub_title = $request->sub_title;
        $store ->status = 1;
        $store->save();
        // $store ->banner = $banner;
        return redirect()->route('admin.general.about')->with('success','About us Submitted successfully');
    }
   }

}
