<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallerycategory extends Model
{
    protected $table = 'gallerycategories';
    protected $fillable = ['name','slug'];

    public function galleries()
    {
    	return $this->belongsToMany('App\Gallery', 'gallerycategory_gallery','gallery_id','category_id')->using('App\GallerycategoryGallery')->withTimestamps();
    }

    public function videos()
    {
    	return $this->belongsToMany('App\Video','videocategory_video','video_id','category_id')->using('App\VideocategoryVideo')->withTimestamps();
    }
}
