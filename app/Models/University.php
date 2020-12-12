<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UniversityMedia;
use App\Models\UniversityCourse;

class University extends Model
{
    protected $fillable = [
        'university_name',
        'website',
        'user_id',
        'type'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function universityMedia()
    {
        return $this->hasMany(UniversityMedia::class);
    }
    public function universityCourse()
    {
        return $this->hasMany(UniversityCourse::class);
    }
    public function universityConsultant()
    {
        return $this->hasMany(UniversityConsultant::class);
    }
}