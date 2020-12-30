<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationFollowsUp extends Model
{
    protected $fillable = ['application_id','note','date'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
