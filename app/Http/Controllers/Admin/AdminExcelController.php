<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Exports\CoursesExport;
use App\Imports\CoursesImport;
use App\Imports\AdminCoursesImport;
use App\Models\Course;

use Maatwebsite\Excel\Facades\Excel;

class AdminExcelController extends Controller
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
    // public function import()
    // {

    //     Excel::import(new AdminCoursesImport,request()->file('file'));
    //         // dd($return);
    //     // if($return==NULL)
    //     // {
    //         // return redirect()->back()->with('danger','Course Already Exists');
    //     // }
    //     // else
    //     // {
    //         return redirect()->back()->with('success','Course Uploaded Successfully');
    //     // }



    // }
    public function import()
    {
        Excel::import(new AdminCoursesImport,request()->file('file'));

        return redirect()->back()->with('success','Course Uploaded Successfully');
    }
}
