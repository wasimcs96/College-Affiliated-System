<?php

namespace App\Imports;

use App\Models\User;
use App\Models\University;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UniversityImport implements ToModel, WithStartRow
{

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
        $email = User::where('email',$row[2])->first();
        $data = [];
        if($email==NULL)
        {
            $user=User::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'email' => $row[2],
                'mobile' => $row[4],
                'password' => Hash::make($row[5]),
                'countries_id'=>$row[6],
            ])->assignRole('university');
           $university =  University::create([
                'user_id'=>$user->id,
                'countries_id'=>$row[6],
                'university_name'=>$row[3],
            ]);
           $data['user'] = $user;
           $data['university'] = $university;

        }

        return $data;

    }
}
