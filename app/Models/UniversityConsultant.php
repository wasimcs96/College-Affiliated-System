<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Consultant;
class UniversityConsultant extends Model
{
    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
