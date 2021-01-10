<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['user_id','order_id','banner_image','user_type','status','expire_date'];


        public function user()
        {
            return $this->hasMany(User::class);
        }

        public function order()
        {
            return $this->belongsTo(Order::class);
        }

}
