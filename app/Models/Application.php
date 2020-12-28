<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['booking_id','client_id','consultant_id','note','status','documents'];

    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function applicationAppliedUniversity()
    {
        return $this->hasMany(ApplicationAppliedUniversity::class);
    }

    public function applicationDocument()
    {
        return $this->hasMany(ApplicationDocument::class);
    }
}
