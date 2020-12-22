<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = ['title', 'package_type', 'description', 'package_time', 'amount', 'status'];
}
