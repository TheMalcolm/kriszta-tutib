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
            $table->foreignId('customer_id');
            $table->date('stay_from');
            $table->date('stay_till');
            $table->float('total');
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
        Schema::dropIfExists('pet_hotel_reservations');
    }
}
