<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NewsCategoryNews extends Pivot
{
    //
    protected $table = 'news_category_news';
    public $incrementing = true;
    protected $fillable = ['news_id','category_id'];
}
