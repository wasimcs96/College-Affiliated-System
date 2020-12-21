<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['booking_id','client_id','consultant_id','note','status','document'];

}
