<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultantPrMigrationCountry extends Model
{
    protected $fillable = ['user_id','country_id',];

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }

}
