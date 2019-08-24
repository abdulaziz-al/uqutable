<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('class');
            $table->boolean('case')->default(false);
            //---------------foreign key of user id for doctor-------------//            
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('users');
            //-----------------------------------------------------------//
            $table->integer('group')->default('1');
            $table->integer('number')->nullable();
            $table->string('time');

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
        Schema::dropIfExists('courses');
    }
}
