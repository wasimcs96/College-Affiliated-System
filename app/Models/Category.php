<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{




    protected $fillable = ['parent_id', 'title', 'slug', 'status','banner'];



     public function parent_category() {
         return $this->belongsTo(Category::class, 'parent_id', 'id');
    }


    public function child_category() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
   }


    public function courses(){
        return $this->hasMany(Course::class);
    }
//     /**
//      * Scope a query to only include active users.
//      *
//      * @param \Illuminate\Database\Eloquent\Builder $query
//      * @return \Illuminate\Database\Eloquent\Builder
//      */
//     public function scopeStatus($query, $status = null)
//     {
//         if ($status === '0' || $status == 1) {
//             $query->where('status', $status);
//         }
//         return $query;
//     }

//     /**
//      * Scope a query to only include filtered users.
//      *
//      * @param \Illuminate\Database\Eloquent\Builder $query
//      * @return \Illuminate\Database\Eloquent\Builder
//      */
//     public function scopeFilter($query, $keyword)
//     {
//         if (!empty($keyword)) {
//             $query->where(function ($query) use ($keyword) {
//                 $query->where('title', 'LIKE', '%' . $keyword . '%');
//                 $query->orWhere('slug', 'LIKE', '%' . $keyword . '%');
//                 $query->orWhere('meta_description', 'LIKE', '%' . $keyword . '%');
//             });
//         }
//         return $query;
//     }

//     /**
//      * Scope a query to only include search category products.
//      *
//      * @param \Illuminate\Database\Eloquent\Builder $query
//      * @return \Illuminate\Database\Eloquent\Builder
//      */
//     public function scopeCategoryWise($query, $category_id)
//     {
//         if (!empty($category_id)) {
//             $rootIds = \Modules\CategoryManager\Entities\Category::descendantsOf($category_id)->where('status', '=', 1)->pluck('id')->toArray();
//             $rootIds[] = $category_id;
//             $query->whereIn('id', $rootIds);
//         }
//         return $query;
//     }
}
