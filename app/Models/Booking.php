<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
}
