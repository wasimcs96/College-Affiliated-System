<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ConsultantAvailableSlots;
use App\Models\UniversityConsultant;
use App\Models\UniversityConsultantClient;
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
        return $this->belongsTo(User::class,'id');
    }

    public function consultantUniversity()
    {
        return $this->hasMany(UniversityConsultant::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function consultantUniversityClient()
    {
        return $this->hasMany(UniversityConsultantClient::class,'consultant_id');
    }

    public function consultantSlots()
    {
        return $this->hasMany(ConsultantAvailableSlots::class,'consultant_id');
    }
}
