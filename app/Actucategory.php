<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actucategory extends Model
{
    //
    protected $table = 'actucategories';

    public function actus()
    {
    	return $this->belongsToMany('App\Actu');
    }
}
