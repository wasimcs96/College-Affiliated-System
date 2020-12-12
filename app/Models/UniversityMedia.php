<?php

namespace App\Models;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class UniversityMedia extends Model
{
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
