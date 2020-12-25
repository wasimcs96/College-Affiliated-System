<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationAppliedUniversity extends Model
{
    protected $fillable = ['university_id','consultant_id','documents', 'course_id', 'application_id','country_id', 'note','status','document'];
}
