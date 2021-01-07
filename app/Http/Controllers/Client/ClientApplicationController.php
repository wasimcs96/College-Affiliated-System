<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;

class ClientApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('created_at','DESC')->get();
    //    dd($applications);

        return view('client.application.my_applications')->with('applications', $applications);

    }

    public function show($id)
    {
        $application = Application::where('id', $id)->get()->first();

        return view('client.application.my_application_show', compact('application'));
    }
}
