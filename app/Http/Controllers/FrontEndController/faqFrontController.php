<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class faqFrontController extends Controller
{
    public function index()
    {
        return view('frontEnd.faq.faq');
    }
}
