<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'uni_name',
    ];

    public function Members(){
        return $this->hasMany('App\Member');
    }
}
