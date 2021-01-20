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
        return $this->hasMany(User::class,'countries_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class,'countries_id');
    }

}
