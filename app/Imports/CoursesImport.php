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

class CoursesImport implements ToModel, WithStartRow, WithValidation, WithHeadingRow
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

    // public function rules(): array
    // {
    //     return [


    //          // Can also use callback validation rules
    //          '0' => function($attribute, $value, $onFailure) {
    //               if ($value == '') {
    //                    $onFailure('row 0 is blank');
    //               }
    //           }

    //     ];
    // }



    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // if($row[0]=='' || $row[1]=='' || $row[2]=='' || $row[3]=='')
        // {
        //     if($row[3]=='')
        //     {
        //         dd($row[0]);
        //     }
        // }
        // $course = UniversityCourse::where('title',$row[1])->where('user_id',auth()->user()->id)->get()->first();
        // $adminCourse= Course::where('id',$row[0])->get()->first();
        $start_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]))->format('Y-m-d');
        $end_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]))->format('Y-m-d');
        // dd($start_date,$end_date);
        // if($course==NULL)
        // {
            // dd($this->category);
            return new UniversityCourse([
            // 'id' => $row[0],
            'category_id' =>$this->category,
            'title' => $row[0],
            'type' => $this->type,
            'user_id' => auth()->user()->id,
            'description' => $row[1],
            'fees' => $row[2],
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);



    //     foreach ($import->failures() as $failure) {
    //         // $failure->row(); // row that went wrong
    //         // $failure->attribute(); // either heading key (if using heading row concern) or column index
    //         // $failure->errors(); // Actual error messages from Laravel validator
    //         $failure->values(); // The values of the row that has failed.
    //    }
        // }
        // if($adminCourse)
        // {
        // }

    }

    // public function rules(): array
    // {
    //     return [
    //         '0' => 'required',
    //         '*.0' => 'required',
    //         '1' => 'required',
    //         '*.1' => 'required',
    //         '2' => 'required',
    //         '*.2' => 'required',
    //         '3' => 'required',
    //         '*.3' => 'required',
    //         '4' => 'required',
    //         '*.4' => 'required',
    //     ];
    // }

    // /**
    //  * @param Failure ...$failures
    //  */
    // public function onFailure(Failure ...$failures)
    // {
    //     Log::stack(['import-failure-logs'])->info(json_encode($failures));
    // }

    // public function rules(): array
    // {
    //     return [
    //         '0' => 'required',
    //         '*.0' => 'required',
    //         '1' => 'required',
    //         '*.1' => 'required',
    //         '2' => 'required',
    //         '*.2' => 'required',
    //         '3' => 'required',
    //         '*.3' => 'required',
    //         '4' => 'required',
    //         '*.4' => 'required',
    //         'maximum' => 'gte:*.minimum',
    //     ];
    // }
}
