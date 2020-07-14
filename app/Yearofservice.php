<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearofservice extends Model
{
    protected $fillable = [
        'start_year', 'end_year',
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
