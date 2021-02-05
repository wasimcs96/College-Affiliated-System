<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationChat extends Model
{
    protected $fillable = ['sender','receiver','application_id','message','status','send_by','seen'];
}
