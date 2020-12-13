<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UniversityConsultant;
class Consultant extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function consultantUniversity()
    {
        return $this->hasMany(UniversityConsultant::class);
    }
}
