<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoryNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_id')->unsined()->nullable();
            $table->bigInteger('category_id')->unsined()->nullable();
            $table->timestamps();
        });

        Schema::table('news_category_news',function (Blueprint $table){
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('news_categories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_category_news');
    }
}
