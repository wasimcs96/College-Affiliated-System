<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UniversityConsultant;
class Consultant extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'website',
        'working_week_days',
        'start_time',
        'end_time',
        'student_visa_service',
        'pr_service'

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function consultantUniversity()
    {
        return $this->hasMany(UniversityConsultant::class);
    }
}
