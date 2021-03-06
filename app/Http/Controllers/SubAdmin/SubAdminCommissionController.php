<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConsultantDues;

class SubAdminCommissionController extends Controller
{
    public function index($id)
    {
        if($id==1)
        {
            $coms=ConsultantDues::where('due_amount_type', 0)->get();
            return view('subadmin.commission.index')->with('coms',$coms)->with('id',$id);
        }
        if($id==2)
        {
            $coms=ConsultantDues::where('due_amount_type', 1)->get();
            return view('subadmin.commission.index')->with('coms',$coms)->with('id',$id);
        }

    }
    public function edit($id)
    {
        $com=ConsultantDues::find($id);
        return view('subadmin.commission.edit')->with('com',$com);
    }

    public function update(Request $request,$id)
    {
        $com=ConsultantDues::find($id);
        $com->due_amount = $request->due_amount;
        $com->temp_client_count = $request->temp_client_count;
        $com->save();
        return redirect()->route('subadmin.commission',['id' => $request->parameter_id])->with('success', 'Commission updated Succefully.');
    }
}
