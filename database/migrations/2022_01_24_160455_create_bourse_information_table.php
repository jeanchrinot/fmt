<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBourseInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bourse_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("image");
            $table->boolean("status")->default(true);
            $table->string("slug");
            $table->string("title");
            $table->text("truncate");
            $table->longText("text");
            $table->unsignedInteger("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bourse_information');
    }
}
