<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view ('admin.general.blog.blog_all');
    }

    public function add()
    {
        return view ('admin.general.blog.blog_add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('image')){
        $image=$request->image;
       $profile_image_new_name = time().$image->getClientOriginalName();
       $image->move(Config::get('define.image.blog_image'),$profile_image_new_name);
       $banner = Config::get('define.image.blog_image').'/'.$profile_image_new_name;
        }
        Blog::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'serial_number'=>$request->serial_number,
            'status'=>$request->type,
            'slug'=> Str::slug($request->title),
            'main_image'=>$banner,
            'short_description'=>$request->short_description,
        ]);
        return view ('admin.general.blog.blog_all')->with('success','Blog post added Successfully');
    }

    public function show($id)
    {
        $show= Blog::where('id',$id)->get()->first();
        return view ('admin.general.blog.blog_show',compact('show'));
    }

    public function edit($id)
    {
        $edit= Blog::where('id',$id)->get()->first();
        return view ('admin.general.blog.blog_edit',compact('edit'));
    }

    public function update(Request $request)
    {
        $update = Blog::find($request->blog_id);
        if($request->hasFile('image')){
        $image=$request->image;
        $profile_image_new_name = time().$image->getClientOriginalName();
        $image->move(Config::get('define.image.blog_image'),$profile_image_new_name);
        $banner = Config::get('define.image.blog_image').'/'.$profile_image_new_name;
        $update->main_image =$banner;
    }

        $update->title = $request->title;
        $update->content = $request->content;
        $update->serial_number =$request->serial_number;
        $update->status =$request->type;
        $update->short_description = $request->short_description;
        $update->save();
        return view ('admin.general.blog.blog_all')->with('success','Blog post added Successfully');

    }

    public function delete($id)
    {
        $delete=Blog::find($id);
        $delete->delete();
        return view ('admin.general.blog.blog_all')->with('success','Blog post Deleted Successfully');

    }
}
