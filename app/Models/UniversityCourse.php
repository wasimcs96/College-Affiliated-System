<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
