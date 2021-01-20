<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
       public function consultantPrMigration()
    {
        return $this->hasMany(ConsultantPrMigrationCountry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class,'countries_id');
    }

}
