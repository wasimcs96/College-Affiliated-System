<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Loan;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Claim;
class LoanFrontController extends Controller

{
    public function index()
    {
        $loans = Loan::where('status', '=', 1)->get();
        // dd($loans);
        return view('frontEnd.loan.loan', compact('loans'));
    }

    public function loanEnquiry(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'type' => 'required'
        ]);

      if ($request->type == 2) {
        $enquiry =  Claim::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' =>'Title:'.$request->universityname.',  Message:'.$request->message,
            'type' => $request->type,
               'designation' => $request->designation,
               'number'=>$request->mobile,
        ]);
      }
      else{
        $enquiry =  Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'type' => $request->type
        ]);
      }

      

       

        return redirect()->back();
    }
}
