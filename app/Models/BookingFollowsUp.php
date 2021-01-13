<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingFollowsUp extends Model
{
    protected $fillable = ['booking_id','note','date'];
    protected $table = 'booking_follows_ups';

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }
}
