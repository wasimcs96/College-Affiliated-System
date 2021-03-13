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
    public function import(Request $request)
    {
        // dd($request->all());
        $category = $request->category_id;
        $type = $request->type;
        Excel::import(new CoursesImport($category,$type),request()->file('file'));

        return redirect()->route('university.courses')->with('success','Course Uploaded Successfully');
    }
}
