<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/18/2018
 * Time: 2:04 PM
 */

namespace App\Services\Models;

use Eloquent;

class Category extends Eloquent
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function news()
    {
        //return $this->hasMany('Backpack\NewsCRUD\app\Models\Article');
    }

    public function scopeFirstLevelItems($query)
    {
        return $query->where('depth', '1')
            ->orWhere('depth', null)
            ->orderBy('lft', 'ASC');
    }

}