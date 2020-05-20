<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'mem_name','mem_email','mem_age','mem_phone','mem_address','mem_description',
        'res_id','uni_id','photo_id',
    ];

    public function responsible(){
        return $this->hasOne('App\Responsible');
    }
    
    public function university(){
        return $this->belongsTo('App\University');
    }

    public function phototitle(){
        return $this->hasOne('App\Phototitle');
    }
}
