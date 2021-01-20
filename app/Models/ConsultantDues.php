<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultantDues extends Model
{
    protected $fillable = ['counsultant_id','due_amount','paid_amount','total_client_count','temp_client_id','due_amount_type'];
}
