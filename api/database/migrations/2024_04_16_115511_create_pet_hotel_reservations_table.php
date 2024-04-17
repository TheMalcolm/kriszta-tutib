<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetHotelReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_hotel_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('email');
            $table->string('phone');
            $table->date('stay_from');
            $table->date('stay_till');
            $table->json('pets');
            $table->float('total');
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
        Schema::dropIfExists('pet_hotel_reservations');
    }
}
