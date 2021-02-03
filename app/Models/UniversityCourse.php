<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{

    protected $fillable = [ 'category_id','title','type', 'user_id', 'description', 'fees', 'start_date', 'end_date'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function courseMedia()
    {
        return $this->hasMany(CourseMedia::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}

