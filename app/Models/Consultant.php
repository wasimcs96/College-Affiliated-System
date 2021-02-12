<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\ConsultantAvailableSlots;
use App\Models\UniversityConsultant;
use App\Models\UniversityConsultantClient;
class Consultant extends Model
{
    use softDeletes;
    protected $fillable = [
        'user_id',
        'company_name',
        'website',
        'about_me',
        'working_week_days',
        'start_time',
        'end_time',
        'student_visa_service',
        'pr_service',
        'cover_image'

    ];
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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

    public function application()
    {
        return $this->hasMany(Application::class,'consultant_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
