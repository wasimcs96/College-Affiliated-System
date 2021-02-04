<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Support\Str;

class ContactFrontController extends Controller
{
    public function index()
    {
        return view('frontEnd.contact.contact');
    }

    public function store(Request $request)
    {
        // $this->validate()
        // dd($request->all());
        Contact::create([
            'name'=>$request->user_name,
            'message'=>$request->message,
            'email'=>$request->email,
            'slug'=> Str::slug($request->user_name),

        ]);
        return view('frontEnd.contact.contact')->with('success','Your Message have been sent Successfully');
    }
}
