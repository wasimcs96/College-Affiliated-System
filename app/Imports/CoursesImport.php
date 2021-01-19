<?php

namespace App\Imports;

use App\Models\UniversityCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class CoursesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $course = UniversityCourse::where('course_id',$row[0])->where('user_id',auth()->user()->id)->get()->first();
        // $adminCourse= Course::where('id',$row[0])->get()->first();
        $start_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]))->format('Y-m-d');
        $end_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]))->format('Y-m-d');
        // dd($start_date,$end_date);
        if($course==NULL)
        {
            return new UniversityCourse([
            // 'id' => $row[0],
            'course_id' => $row[0],
            'user_id' => auth()->user()->id,
            'description' => $row[1],
            'fees' => $row[2],
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
        }
        if($adminCourse)
        {

        }
    }
}
