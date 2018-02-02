<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->string('weburl')->nullable();
          $table->string('fbpageurl')->nullable();
          $table->string('streetline1');
          $table->string('streetline2')->nullable();
          $table->string('neighbourhood');
          $table->string('state');
          $table->string('city');
          $table->string('country');
          $table->string('longitude');
          $table->string('latitude');
          $table->string('postalcode');
          $table->string('associationtype');
          $table->integer('max_time_singlematches')->unsigned();
          $table->integer('max_time_doublematches')->unsigned();
          $table->integer('max_time_invite_confirmation')->unsigned();
          $table->integer('owner_id')->unsigned();
          $table->timestamps();
          $table->foreign('owner_id')->references('id')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associations');
    }
}
