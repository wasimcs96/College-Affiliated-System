<?php

namespace App\Models;
use App\Models\CourseMedia;
use App\Models\UniversityCourse;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['category_id', 'name', 'type'];

    public function courseMedia()
    {
        return $this->hasMany(CourseMedia::class);
    }

    public function university()
    {
        return $this->hasMany(UniversityCourse::class);
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
