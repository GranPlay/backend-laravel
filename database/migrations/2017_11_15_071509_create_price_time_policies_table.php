<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTimePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_time_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pricetimename');
            $table->string('pricetimedesc');
            $table->string('pricetimeslot');
            // $table->integer('court_id')->unsigned();
            $table->timestamps();

            // $table->foreign('court_id')->references('id')->on('courts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_time_policies');
    }
}
