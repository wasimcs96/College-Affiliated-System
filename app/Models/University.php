<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'university_name',
        'website',
        'user_id',
        'type'

    ];
}
