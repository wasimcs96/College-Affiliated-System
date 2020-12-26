<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class CourseMedia extends Model
{

    protected $fillable = ['course_id', 'file_type', 'media', 'link', 'status' ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
