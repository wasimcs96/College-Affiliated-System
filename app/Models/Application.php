<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use softDeletes;
    protected $fillable = ['booking_id','client_id','consultant_id','note','status','documents'];

    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class,'consultant_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function applicationAppliedUniversity()
    {
        return $this->hasMany(ApplicationAppliedUniversity::class,'application_id');
    }

    public function applicationDocument()
    {
        return $this->hasMany(ApplicationDocument::class);
    }

    public function userConsultant()
    {
        return $this->belongsTo(User::class,'consultant_id');
    }
}
