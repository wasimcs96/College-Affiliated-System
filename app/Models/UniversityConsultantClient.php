<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UniversityConsultantClient extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function universityClient()
    {
        return $this->belongsTo(User::class,'university_id');
    }

    public function consultantClient()
    {
        return $this->belongsTo(User::class,'university_id');
    }
}
