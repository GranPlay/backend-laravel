<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWinLose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scores', function (Blueprint $table) {

            $table->integer('won')->unsigned()->nullable()->after('court_id');
            $table->integer('lost')->unsigned()->nullable()->after('won');
            $table->integer('drawn')->unsigned()->nullable()->after('lost');
            $table->integer('abandoned')->unsigned()->nullable()->after('drawn');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scores', function (Blueprint $table) {
            //
        });
    }
}
