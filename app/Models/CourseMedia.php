<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class CourseMedia extends Model
{

    protected $fillable = [ 'university_course_id','course_id', 'file_type', 'media', 'link', 'status' ];
    protected $table = 'university_course_media';
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
