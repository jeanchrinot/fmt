<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PositionUser extends Pivot
{
    protected $table = 'position_user';
    public $incrementing = true;
    protected $fillable = ['user_id','position_id'];
}
