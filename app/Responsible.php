<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
        'res_name',
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

    public function member(){
        return $this->belongsTo('App\Member');
    }
}
