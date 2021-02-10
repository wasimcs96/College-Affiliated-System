<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UniversityMedia;
use App\Models\UniversityCourse;
use App\Models\UniversityConsultantClient;


class University extends Model
{
    protected $fillable = [
        'university_name',
        'website',
        'countries_id',
        'user_id',
        'type',
        'default_documents',
        'about_me',
        'average_fees',
        'cover_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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
    public function universityConsultantClient()
    {
        return $this->hasMany(UniversityConsultantClient::class,'university_id');
    }

}
