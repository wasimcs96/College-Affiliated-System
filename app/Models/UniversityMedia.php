<?php

namespace App\Models;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class UniversityMedia extends Model
{
    protected $fillable = [
    'university_name',
    'website',
    'user_id',
    'type'
    ];
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
