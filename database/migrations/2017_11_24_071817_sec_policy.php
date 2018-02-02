<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SecPolicy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('permission')->default(0);

            $table->integer('manager_id')->unsigned();
            $table->foreign('manager_id')
                  ->references('id')->on('managers')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('header_id')->unsigned();
            $table->foreign('header_id')
                  ->references('id')->on('policy_headers')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
