<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UniversityConsultantClient extends Model
{
    protected $fillable = ['client_id', 'university_id', 'consultant_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function universityClient()
    {
        return $this->belongsTo(User::class,'university_id');
    }

    public function consultantClient()
    {
        return $this->belongsTo(User::class,'university_id');
    }
}
