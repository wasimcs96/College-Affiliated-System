<?php

namespace App\Http\Controllers\FrontEndController;

use App\Models\User;
use App\Models\Consultant;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ConsultantFrontController extends Controller
{


    public function index_all()
    {
        return view('frontEnd.consultant.consultant_all')->with('consultants',Consultant::all());
    }

    public function index_single($id)
    {
        $consultant = Consultant::find($id);
        return view('frontEnd.consultant.consultant_detail')->with('consultant', $consultant);
    }

    public function book($id)
    {
        $consultant = Consultant::find($id);
        return view('frontEnd.consultant.book')->with('consultant', $consultant)->with('countries',Country::all());

    }

}
