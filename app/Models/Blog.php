<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['title','main_image','slug','short_description','content','serial_number','status'];

}
