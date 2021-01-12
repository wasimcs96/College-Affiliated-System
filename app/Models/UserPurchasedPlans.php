<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPurchasedPlans extends Model
{
    protected $fillable = [
        'order_id',
        'start_date',
        'end_date',];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

}
