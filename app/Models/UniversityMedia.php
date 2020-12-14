<?php

namespace App\Models;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class UniversityMedia extends Model
{
    protected $fillable = [
    'university_id',
    'website',
    'media',
    'link',
    'user_id',
    'file_type'
    ];
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
