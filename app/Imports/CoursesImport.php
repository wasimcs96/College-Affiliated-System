<?php

namespace App\Imports;

use App\Models\UniversityCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class CoursesImport implements ToModel
{
  public $category;


  public function  __construct($category)
  {
     $this->category=$category;
  }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $course = UniversityCourse::where('title',$row[1])->where('user_id',auth()->user()->id)->get()->first();
        // $adminCourse= Course::where('id',$row[0])->get()->first();
        $start_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]))->format('Y-m-d');
        $end_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]))->format('Y-m-d');
        // dd($start_date,$end_date);
        // if($course==NULL)
        // {
            // dd($this->category);
            return new UniversityCourse([
            // 'id' => $row[0],
            'category_id' =>$this->category,
            'title' => $row[0],
            'type' => $row[1],
            'user_id' => auth()->user()->id,
            'description' => $row[2],
            'fees' => $row[3],
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
        // }
        // if($adminCourse)
        // {
        // }
    }
}
