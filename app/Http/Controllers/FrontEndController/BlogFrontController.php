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
        return view('frontEnd.blog.blog_detail',compact('detail'));
    }
}
