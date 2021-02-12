<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Consultant;
class UniversityConsultant extends Model
{

    use softDeletes;
    protected $fillable=["university_id","consultant_id","status"];

    protected $dates = ['deleted_at'];

    public function user()
    {
    return $this->belongsTo(User::class);

    }

    public function userUniversity()
    {
        return $this->belongsTo(User::class,'university_id');
    }

    public function userConsultant()
    {
        return $this->belongsTo(User::class,'consultant_id');
    }
}
