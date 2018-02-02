<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gmaetype');
            $table->integer('won')->unsigned()->nullable();
            $table->integer('lost')->unsigned()->nullable();
            $table->integer('drawn')->unsigned()->nullable();
            $table->integer('abandoned')->unsigned()->nullable();
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');
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
        Schema::dropIfExists('owners_profile');
    }
}
