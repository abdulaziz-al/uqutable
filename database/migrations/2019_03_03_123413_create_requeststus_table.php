<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequeststusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requeststus', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            //---------------foreign key of user id for studtent-------------//
            $table->integer('stu_id')->unsigned();
            $table->foreign('stu_id')->references('id')->on('users');
            //---------------foreign key of course id for title and more-------------//
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('test01s');
            //---------------Resopn from doctor and then admin-------------//
            $table->text('request');
            //---------------Resopn from doctor and then admin-------------//
            $table->string('respon_dr')->nullable();
            $table->string('respon_admin')->nullable();

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
        Schema::dropIfExists('requeststus');
    }
}
