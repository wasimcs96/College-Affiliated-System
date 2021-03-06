<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'university_claim';

    protected $fillable = ['name','email','designation','message','number'];
}
