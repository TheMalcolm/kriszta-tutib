<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticsAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetics_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('email');
            $table->string('phone');
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('treatment_type');
            $table->json('options');
            $table->dateTime('appointment_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cosmetics_appointments');
    }
}
