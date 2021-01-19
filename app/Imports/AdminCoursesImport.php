<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class AdminCoursesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $course = Course::where('name',$row[0])->get()->first();
        $category = Category::where('id',$row[1])->get();
        if($course==NULL && isset($category))
        {
        return new Course([
            'name'    => $row[0],
            'category_id' => $row[1],
            'type' => $row[2],
        ]);
        }

    }
}
