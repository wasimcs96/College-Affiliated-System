<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Loan;
use Symfony\Component\HttpFoundation\Request;

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

       $enquiry =  Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'type' => $request->type
        ]);
// dd($enquiry);
        $enquiry->save();

        return redirect()->route('loan');
    }
}