<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['provider', 'interest_rate', 'tenure', 'processing_fees', 'status'];
}
