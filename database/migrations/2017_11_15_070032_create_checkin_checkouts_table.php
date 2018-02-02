<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('checkin_status')->default(FALSE);
            $table->string('checkin');
            $table->boolean('checkout_status')->default(FALSE);
            $table->string('checkout');
            $table->integer('player_id')->unsigned();
            $table->timestamps();
            $table->foreign('player_id')->references('id')->on('players');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkin_checkouts');
    }
}
