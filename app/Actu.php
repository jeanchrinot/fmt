<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actu extends Model
{
    //
    protected $table = 'actus';

    public function categories(){
    	return $this->belongsToMany('App\Actucategory','actucategory_actus','actu_id','category_id')->using('App\ActucategoryActu')->withTimestamps();
    }
}
