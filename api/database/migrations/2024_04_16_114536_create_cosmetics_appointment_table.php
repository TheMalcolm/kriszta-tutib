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
            $table->foreignId('customer_id');
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('treatment_type');
            $table->string('dogsize');
            $table->string('animaltype');
            $table->dateTime('appointment_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
