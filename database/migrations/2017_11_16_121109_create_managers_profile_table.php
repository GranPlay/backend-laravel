<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gmaetype');
            $table->integer('won')->unsigned()->nullable();
            $table->integer('lost')->unsigned()->nullable();
            $table->integer('drawn')->unsigned()->nullable();
            $table->integer('abandoned')->unsigned()->nullable();
            $table->integer('managers_id')->unsigned();
            $table->foreign('managers_id')->references('id')->on('managers');
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
        Schema::dropIfExists('managers_profile');
    }
}
