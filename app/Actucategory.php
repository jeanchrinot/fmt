<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actucategory extends Model
{
    //
    protected $table = 'actucategories';
    protected $fillable = ['name','slug'];

    public function actus()
    {
    	return $this->belongsToMany('App\Actu');
    }
}
