<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


use Illuminate\Routing\Controller as BaseController;

class MessengerController extends BaseController
{
    public function chat(){
        return view('messenger.chat')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function fetchData(Request $request){

    }


    public function sendMessage(Request $request){


    }


}
