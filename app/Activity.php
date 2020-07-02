<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'cat_id', 'act_image', 'act_name', 'act_memory',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            flash();
        });

        static::updated(function () {
            flash();
        });

        static::deleted(function () {
            flash();
        });

        searchdata();
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
