<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActucategoryActusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actucategory_actus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('actu_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('actucategory_actus',function (Blueprint $table){
            $table->foreign('actu_id')->references('id')->on('actus')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('actucategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actucategory_actus');
    }
}
