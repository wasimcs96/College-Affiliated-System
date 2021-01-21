<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultantDues extends Model
{
    protected $fillable = ['consultant_id','due_amount','paid_amount','total_client_count','temp_client_count','due_amount_type'];
}
