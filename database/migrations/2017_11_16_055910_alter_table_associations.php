<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAssociations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->string('phone1')->after('postalcode');
            $table->string('phone2')->nullable()->after('phone1');
            $table->string('phone3')->nullable()->after('phone2');
            $table->string('association_role')->default('cnpj')->after('name');
            $table->integer('guests_allowed')->unsigned()->default(0)->after('max_time_invite_confirmation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('associations', function (Blueprint $table) {
            //
        });
    }
}
