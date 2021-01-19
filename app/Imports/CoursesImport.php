<?php

namespace App\Imports;

use App\Models\UniversityCourse;
use Maatwebsite\Excel\Concerns\ToModel;

class CoursesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Course([
        //     'id'     => $row[0],
        //     'name'    => $row[1],
        //     'category_id' => $row[2],
        //     'type' => $row[3],
        // ]);

        return new UniversityCourse([
            // 'id' => $row[0],
            'course_id' => $row[0],
            'user_id' => auth()->user()->id,
            'description' => $row[1],
            'fees' => $row[2],
            'start_date' => date("Y-m-d",strtotime($row[3])),
            'end_date' => date("Y-m-d",strtotime($row[4])),
        ]);
    }
}
