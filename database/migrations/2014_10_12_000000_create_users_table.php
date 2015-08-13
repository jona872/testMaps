<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('us_name');
            $table->string('us_user');
            $table->string('us_mail')->unique();
            $table->string('password',60);
            $table->string('us_adre');
            $table->double('lat',7,7);//double...
            $table->double('lng',7,3);
            $table->string('us_tele');
            $table->string('photolink');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
