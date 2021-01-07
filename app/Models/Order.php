<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable=['user_id','payment_type','amount','transaction_id','status'];

   public function User()
   {
       return $this->belongsTo(User::class);
    }

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function consultant()
    {
       return $this->belongsTo(Consultant::class);
    }
}
