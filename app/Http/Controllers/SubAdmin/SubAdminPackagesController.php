<?php

namespace App\Http\Controllers\SubAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;
use App\Models\Package;


class SubAdminPackagesController extends Controller
{
    public function index()
    {
        return view('subadmin.packages.index')->with('packages', Package::all());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */

    public function show($id)
    {

        $package = Package::where('id',$id)->first();
        // dd($package);
        return view('subadmin.packages.show')->with('package', $package);
    }

    public function create()
    {
        return view('subadmin.packages.create');
    }


    public function add()
    {

        return view('subadmin.packages.add');
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'package_type' => 'required',
            'description' => 'required',
            'package_time' => 'required',
            'amount' => 'required'
        ]);

        $package = Package::create($request->all());
        $package->save();
        return redirect()->route('subadmin.packages')->with('success', 'Package created Succefully.');
    }

     /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */

    public function edit(Package $id)
    {
        $package = Package::orderBy('updated_at', 'DESC')->get();
        return view('subadmin.packages.edit', compact('package'))->with('packages', $id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Package $id)
    {
        // $id = Package::find($id);
        $id->update($request->all());
        return redirect()->route('subadmin.packages')->with('success', 'Package updated Succefully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = Package::find($id);
        $id->delete();

        return redirect()->route('subadmin.packages')->with('success', 'Package Removed Succefully.');
    }


}



