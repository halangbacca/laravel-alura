<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = ['name', 'cover_path'];
    // One to Many
    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    public static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name', 'asc');
        });
    }


}
