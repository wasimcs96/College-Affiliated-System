<?php
namespace App\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Sluggable
{
	public static function bootSluggable()
	{
		static::creating(function ($model) {
            $settings = $model->sluggable();
            if(isset($settings['table']) && !empty($settings['table'])){
                $model->table = $settings['table'];
            }
            $dbcolumn = isset($settings['dbfield']) ? $settings['dbfield'] : 'slug';
            $string = !empty($model[$dbcolumn]) ? $model[$dbcolumn] : $model[$settings['source']];
            $model->$dbcolumn = $model->generateSlug($model, $dbcolumn, $string);
		});
	}

	abstract public function sluggable(): array;

	public function generateSlug($model, $dbcolumn,  $title)
    {
        $slugtype = $model->sluggable();
        $replacement = isset($slugtype['replacement']) ? $slugtype['replacement'] : "-";
        $slug = Str::slug($title, $replacement);
        if(isset($slugtype['str_case'])){
            if($slugtype['str_case'] == 'upper'){
                $slug = strtoupper($slug);
            }else if($slugtype['str_case'] == 'lower'){
                $slug = strtolower($slug);
            }else if($slugtype['str_case'] == 'default'){
                $slug = $slug;
            }
        }
        $i = 1;
        while ($this->isAliasExist($model, $dbcolumn, $slug)) {
            $slug = $slug . $replacement . ++$i;
        }
        return $slug;
    }


    protected function isAliasExist($model, $dbcolumn, $slug)
    {
         $query = DB::table($model->table)->where($dbcolumn , '=', $slug);
         if($model->id){
            $query->where('id', '<>', $model->id);
         }
        $cnt =  $query->count();
        return $cnt > 0 ? true : false;
    }

}

