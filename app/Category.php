<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cat_name',
    ];

    public static function boot(){
        parent::boot();

        static::created(function(){
            flash();
        });

        static::updated(function(){
            flash();
        });

        static::deleted(function(){
            flash();
        });
    }
    
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function activities(){
        return $this->hasMany('App\Activity');
    }
}
