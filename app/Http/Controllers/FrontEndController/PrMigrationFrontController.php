<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class PrMigrationFrontController extends Controller
{
    public function index()
    {
        return view('frontEnd.prmigration.prmigration')->with('consultants',User::all());;
    }
}
