<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_hotel_reservation_id');
            $table->string('name');
            $table->string('type');
            $table->text('comments')->nullable();
            $table->boolean('cosmetics')->default(false);
            $table->boolean('physiotherapy')->default(false);
            $table->boolean('extraLongWalking')->default(false);
            $table->timestamps();

            $table->foreign('pet_hotel_reservation_id')->references('id')->on('pet_hotel_reservations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
