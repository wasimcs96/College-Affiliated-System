<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class CourseMedia extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
