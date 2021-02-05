<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationAppliedUniversity extends Model
{
    protected $fillable = ['university_id','consultant_id','documents', 'course_id', 'application_id','country_id', 'note','status','document','fees','scholarship'];

    public function university()
    {
        return $this->belongsTo(University::class,'university_id');
    }

    public function userUniversity()
    {
        return $this->belongsTo(User::class,'university_id');
    }

    // public function course()
    // {
    //     return $this->belongsTo(Course::class,'course_id');
    // }

    public function course()
    {
        return $this->belongsTo(UniversityCourse::class,'course_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }


}
