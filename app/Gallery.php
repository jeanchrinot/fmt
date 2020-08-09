<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    public function categories()
    {
    	return $this->belongsToMany('App\Gallerycategory', 'gallerycategory_gallery','gallery_id','category_id')->using('App\GallerycategoryGallery')->withTimestamps();
    }
}
