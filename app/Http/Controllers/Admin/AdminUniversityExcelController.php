<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UniversityImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminUniversityExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request)
    {
        Excel::import(new UniversityImport(),request()->file('file'));
        return redirect()->back()->with('success','University Uploaded Successfully');
    }

    public function view()
    {
        return view('admin.users.user.university_import');
    }
}
