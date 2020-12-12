<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultantAvailableSlots extends Model
{
    protected $fillable = [
        'consultant_id',
        'week_day',
        'start_slot_time',
        'end_slot_time',
        'status',

    ];
}
