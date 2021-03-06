<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
        return view('admin.general.contact.contact');
    }

    public function show($id)
    {
        $show=Contact::find($id);
        return view('admin.general.contact.contact_show',compact('show'));
    }
}
