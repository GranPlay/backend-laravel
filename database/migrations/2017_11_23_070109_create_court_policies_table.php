<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_policies', function (Blueprint $table) {
            $table->integer('policy_id')->unsigned();
            $table->foreign('policy_id')->references('id')->on('price_time_policies')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('court_id')->unsigned();
            $table->foreign('court_id')->references('id')->on('courts')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('court_policies');
    }
}
