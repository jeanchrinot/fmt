<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentword extends Model
{
	protected $fillable = ['user_id','words','featured'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
