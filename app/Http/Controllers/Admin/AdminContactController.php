<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        return view('admin.general.contact.contact');
    }
}
