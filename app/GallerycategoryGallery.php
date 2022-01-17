<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GallerycategoryGallery extends Pivot
{
    protected $table = 'gallerycategory_gallery';
    public $incrementing = true;
    protected $fillable = ['gallery_id','category_id'];
}
