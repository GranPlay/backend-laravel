<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gmaetype');
            $table->integer('won')->unsigned()->nullable();
            $table->integer('lost')->unsigned()->nullable();
            $table->integer('drawn')->unsigned()->nullable();
            $table->integer('abandoned')->unsigned()->nullable();
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');
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
        Schema::dropIfExists('players_profile');
    }
}
