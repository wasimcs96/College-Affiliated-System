<?php

namespace App\Imports;

use App\Models\UniversityCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

class CoursesImport implements ToModel, WithStartRow
{
    use Importable;
  public $category;


  public function  __construct($category,$type)
  {
     $this->category=$category;
     $this->type=$type;
  }

  public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

            return new UniversityCourse([
            'category_id' =>$this->category,
            'title' => $row[0],
            'type' => $this->type,
            'user_id' => auth()->user()->id,
            'description' => $row[1],
            'fees' => $row[2],
            'duration' => $row[3],
        ]);

    }

}
