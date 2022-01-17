<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ActucategoryActu extends Pivot
{
    //
    protected $table = 'actucategory_actus';
    public $incrementing = true;
    protected $fillable = ['actu_id','category_id'];
}
