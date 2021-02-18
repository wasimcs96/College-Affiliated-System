<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
class AdminFaqController extends Controller
{
   public function index()
   {
       return view('admin.general.faq');
   }

   public function store(Request $request)
   {
    //    $image=$request->image;
    //    $profile_image_new_name = time().$image->getClientOriginalName();
    //    $image->move(Config::get('define.image.page_banner'),$profile_image_new_name);
    //    $image = Config::get('define.image.page_banner').'/'.$profile_image_new_name;
// dd($request->all());
    Page::create([
        'title'=>$request->title,
        'page_type'=>1,
        'slug'=>Str::slug($request->short_description),
        'description'=>$request->description,
        'short_description'=>$request->short_description,
        // 'sub_title'=>$request->sub_title,
        'status'=>$request->type,
        
    ]);


    return view('admin.general.faq')->with('success','FAQ added  Successfully.');
   }
}
