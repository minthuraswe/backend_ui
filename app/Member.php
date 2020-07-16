<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'mem_name','mem_email','mem_age','mem_phone','mem_address','mem_description',
        'mem_position','mem_university','mem_photo', 'year_id', 'mem_link'
    ];

    protected static function boot(){
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

        searchdata();
    }

    public function yearofservices(){
        return $this->hasMany('App\Yearofservice', 'start_year');
    }
}
