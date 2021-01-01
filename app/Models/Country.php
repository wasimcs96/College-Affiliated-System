<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
       public function consultantPrMigration()
    {
        return $this->hasMany(ConsultantPrMigrationCountry::class);
    }

}
