<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['user_id','order_id','banner_image','link','click_count','start_date','time_period','user_type','status','expire_date'];


        public function user()
        {
            return $this->belongsTo(User::class,'user_id');
        }

        public function order()
        {
            return $this->belongsTo(Order::class);
        }

}
