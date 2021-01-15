<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['client_id','consultant_id','country_id','enquiry','booking_date','booking_start_time','booking_end_time','booking_for','status','comments'];

    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }

    public function userConsultant()
    {
        return $this->belongsTo(User::class,'consultant_id');
    }

    public function country()
    {
        return $this->hasOne(Country::class,'countries_id');
    }
}
