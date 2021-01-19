<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

protected $fillable=['title','description','slug','short_description','banner','page_type','sub_title'];

}
