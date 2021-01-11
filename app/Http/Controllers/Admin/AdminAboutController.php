<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class AdminAboutController extends Controller
{

   public function index()
   {
       return view('admin.general.about');
   }
   public function store(Request $request)
   {
    Page::create([
        'title'=>$request->title,
        'description'=>$request->content,
    ]);
        return redirect('admin.general.about')->with('success');
   }

}
