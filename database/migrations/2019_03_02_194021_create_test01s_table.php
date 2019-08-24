<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTest01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test01s', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('course_no');
            $table->string('course_name');
            $table->string('hours');
            $table->string('activity');
            $table->string('group');
            $table->string('headquarters');
            $table->string('mix');
            $table->string('registered');
            $table->string('time');
            $table->string('doctor');
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
        Schema::dropIfExists('test01s');
    }
}
