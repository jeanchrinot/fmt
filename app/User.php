<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','phone','birthday','gender','province','phone','email', 'password','department','type','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function words()
    {
        return $this->hasMany('App\Studentword');
    }

    public function positions()
    {
        return $this->belongsToMany('App\Position','position_user','user_id','position_id')->using('App\PositionUser')->withTimestamps();
    }
    public function deputies()
    {
        return $this->hasMany('App\Deputy');
    }
    public function getFullNameAttribute()
    {
        return ucfirst("{$this->name} {$this->surname}");
    }
}
