<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\CoursesExport;
use App\Imports\CoursesImport;
// use App\Models\Course;
use Maatwebsite\Excel\Facades\Excel;

class UniversityExcelController extends Controller
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
    public function import()
    {
        Excel::import(new CoursesImport,request()->file('file'));

        return redirect()->back()->with('success','Course Uploaded Successfully');
    }
}
