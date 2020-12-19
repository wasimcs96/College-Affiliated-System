<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['status'];

    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
}
