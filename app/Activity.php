<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'cat_id', 'photo_id', 'act_name', 'act_memory',
    ];

    public function photo(){
        return $this->hasOne('App\Phototitle');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
