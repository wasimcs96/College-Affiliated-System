<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{

    protected $fillable = [ 'course_id', 'user_id', 'description', 'fees', 'start_date', 'end_date', 'fax_number', 'term_conditions', 'privacy_policy' ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function courseMedia()
    {
        return $this->hasMany(CourseMedia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

