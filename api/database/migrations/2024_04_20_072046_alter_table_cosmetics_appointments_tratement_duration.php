<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCosmeticsAppointmentsTratementDuration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cosmetics_appointments', function (Blueprint $table) {
            $table->integer('treatment_duration')->after('treatment_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cosmetics_appointments', function (Blueprint $table) {
            $table->dropColumn(['treatment_duration']);
        });
    }
}
