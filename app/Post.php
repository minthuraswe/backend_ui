<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'cat_id', 'photo_id', 'post_title', 'post_description',
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

        searchdata();
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function photo(){
        return $this->hasOne('App\Phototitle');
    }
}
