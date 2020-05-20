<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
        'res_name',
    ];

    public function member(){
        return $this->belongsTo('App\Member');
    }
}
