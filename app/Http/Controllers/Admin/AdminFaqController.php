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
        return view('admin.general.faq.faq');
    }
 
    public function list()
 {
  
 
     return view('admin.general.faq.faq_all');
 }
    public function store(Request $request)
    {
 
     Page::create([
         'title'=>$request->title,
         'page_type'=>1,
         // 'slug'=>Str::slug($request->short_description),
         'description'=>$request->description,
         'short_description'=>$request->short_description,
         // 'sub_title'=>$request->sub_title,
         'status'=>$request->type,
         // 'banner'=>$image
     ]);
 
 
     return view('admin.general.faq.faq_all')->with('success','FAQ added  Successfully.');
    }
 
    public function edit($id)
    {
        $faq=Page::find($id);
        
    
        return view('admin.general.faq.faq_edit',compact('faq'));
    }
 
    public function update(Request $request , $id)
    {
 
         $update=Page::find($id);
 
        $update->title = $request->title;
        $update->page_type = 1;
     //    $update->slug=Str::slug($request->short_description);
        $update->description=$request->description;
        $update->short_description=$request->short_description;
        $update->status=$request->type;
        $update->save();
      return view('admin.general.faq.faq_all')->with('Success','FAQ Updated  Successfully.');
    }
 
 public function delete($id)
 {
     $id = Page::find($id);
     $id->delete();
     return view('admin.general.faq.faq_all')->with('Success','FAQ Updated  Successfully.');
 }
 }
 