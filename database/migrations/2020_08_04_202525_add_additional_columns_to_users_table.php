<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->date('birthday')->after('surname');
            $table->tinyInteger('gender')->after('birthday');
            $table->string('province')->after('gender');
            $table->string('phone',40)->after('province');
            $table->string('department',250)->after('email');
            $table->tinyInteger('type')->default(0)->after('department');
            $table->string('image',250)->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['surname','birthday','gender','province','phone','department','type','image']);
        });
    }
}
