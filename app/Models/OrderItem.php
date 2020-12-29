<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table="orders_items";
    protected $fillable=['order_id','item_title']; 
}
