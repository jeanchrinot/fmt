<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallerycategory extends Model
{
    protected $table = 'gallerycategories';
    protected $fillable = ['name','slug'];

    public function galleries()
    {
    	return $this->belongsToMany('App\Gallery');
    }

    public function videos()
    {
    	return $this->belongsToMany('App\Video');
    }
}
