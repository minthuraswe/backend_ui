<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'uni_name',
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

    public function members(){
        return $this->hasMany('App\Member');
    }
}
