<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBothPhotosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('association_photos', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('description')->after('title')->nullable();
        });

        Schema::table('court_photos', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('description')->after('title')->nullable();
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
