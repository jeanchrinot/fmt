<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{	
	protected $table = 'videos';
	protected $fillable = ['title','video','featured'];

    public function categories()
    {
    	return $this->belongsToMany('App\Gallerycategory','videocategory_video','video_id','category_id')->using('App\VideocategoryVideo')->withTimestamps();
    }
}
