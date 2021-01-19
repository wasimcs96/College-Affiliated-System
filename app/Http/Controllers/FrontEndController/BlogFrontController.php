<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogFrontController extends Controller
{
    public function index()
    {
        return view('frontEnd.blog.blog_all');
    }

    public function detail($id)
    {
        $detail=Blog::where('id',$id)->get()->first();

        $next_id=Blog::where('id','>',$detail->id)->min('id');
        $prev_id=Blog::where('id','<',$detail->id)->max('id');

        $next=Blog::find($next_id);
        $prev=Blog::find($prev_id);
        // dd($prev);


        return view('frontEnd.blog.blog_detail',compact('detail','prev','next'));
    }
}
