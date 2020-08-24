<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deputy extends Model
{
    protected $table = 'deputies';
    protected $fillable = ['user_id','province'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
