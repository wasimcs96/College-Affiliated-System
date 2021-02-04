<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loan;

class AdminLoanController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        $loans = Loan::orderBy('updated_at', 'DESC')->get();
        return view('admin.general.loan.index', compact('loans'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('admin.general.loan.add');
    }

     /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */

     public function store(Request $request)
     {
         $this->validate($request, [
            'provider' => 'required',
            'interest_rate' => 'required',
            // 'tenure' => 'required',
            'processing_fees' => 'required',
            'status' => 'required'
         ]);

         Loan::create([
            'provider' => $request->provider,
            'interest_rate' => $request->interest_rate,
            'tenure' => $request->tenure,
            'processing_fees' => $request->processing_fees,
            'status'  =>  $request->status
         ]);

        return redirect()->route('admin.general.loan')->with('success', 'Loan has been created Successfully');
     }


      /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $loan = Loan::where('id', $id)->first();
        return view('admin.general.loan.show', compact('loan'));
    }

     /**
     * Show the form for editing the specified resource.
     * @return Response
     */

     public function edit(Loan $id)
     {
        //  dd($id);
        $loan = Loan::where('id', $id->id)->first();
// dd($loan);
        return view('admin.general.loan.edit', compact('loan'));

     }

     /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */

     public function update(Request $request, $id)
     {
        $update= Loan::find($id);
        $update->provider = $request->provider;
        $update->interest_rate = $request->interest_rate;
        $update->tenure = $request->tenure;
        $update->processing_fees = $request->processing_fees;
        $update->status = $request->status;
        $update->save();

        return redirect()->route('admin.general.loan')->with('success', 'Loan has been updated Successfully');

     }

      /**
     * Remove the specified resource from storage.
     * @return Response
     */

     public function destroy($id)
     {
        $id = Loan::find($id);
        $id->delete();

        return redirect()->route('admin.general.loan')->with('success', 'Loan has been deleted Successfully');
     }
}
