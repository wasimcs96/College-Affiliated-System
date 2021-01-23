<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailHook extends Model
{
    public function templates()
    {
        return $this->hasMany('Modules\EmailManager\Entities\EmailTemplate');
    }


    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
