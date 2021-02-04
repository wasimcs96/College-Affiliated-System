<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;

class LoanFrontController extends Controller

{
    public function index()
    {
        return view('frontEnd.loan.loan');
    }
}
