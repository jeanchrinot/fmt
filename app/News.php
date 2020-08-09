<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';

    public function categories(){
    	return $this->belongsToMany('App\NewsCategory','news_category_news','news_id','category_id')->using('App\NewsCategoryNews')->withTimestamps();
    }
}
