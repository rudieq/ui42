<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MunicipalitiesTableChangesForImportData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('municipalities', function (Blueprint $table) {
            //new columns
            $table->integer('external_id');
            $table->string('address_streetName')->nullable();
            $table->string('address_buildingNumber')->nullable();
            $table->string('address_postcode')->nullable();
            $table->string('address_city')->nullable();
            $table->string('phone_prefix')->nullable();
            //drop old address column
            $table->dropColumn('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('municipalities', function (Blueprint $table) {
            //drop new columns
            $table->dropColumn('external_id');
            $table->dropColumn('address_streetName');
            $table->dropColumn('address_buildingNumber');
            $table->dropColumn('address_postcode');
            $table->dropColumn('address_city');
            $table->dropColumn('phone_prefix');
            //re-create old address column
            $table->string('address')->nullable();
        });        
    }
}
