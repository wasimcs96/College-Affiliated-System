<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;
use App\Models\Package;
use App\Models\User;
use App\Models\Country;

class AdminUsersController extends Controller
{
    public function index($id)
    {
        // dd($id);
        if($id==1)
        {
           return view('admin.users.user.index')->with('users', User::all())->with('id',1);
        }
        if($id==2)
        {
            // dd($id);
           return view('admin.users.user.index')->with('users', User::all())->with('id',2);
        }
        if($id==3)
        {
           return view('admin.users.user.index')->with('users', User::all())->with('id',3);
        }
    }
    public function show($id)
    {
        // dd($request->all());
        $user = User::where('id',$id)->first();
        return view('admin.users.user.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.user.edit')->with('user', $user)->with('countries',Country::all());
    }

    public function update(Request $request, User $id)
    {
        // $id = Package::find($id);
        $id->update($request->all());
        return redirect()->route('admin.users',['id' => $request->parameter_id])->with('success', 'User updated Succefully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('danger', 'User Deleted Successfully.');
    }


}



