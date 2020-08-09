<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class VideocategoryVideo extends Pivot
{
    protected $table = 'videocategory_video';
    public $incrementing = true;
    protected $fillable = ['video_id','category_id'];
}
