<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phototitle extends Model
{
    protected $fillable = [
        'photo_name', 'image', 'photo_for_what',
    ];

    public function member(){
        return $this->belongsTo('App\Member');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }
}
