<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pick_up_location_id');
          $table->integer('drop_off_location_id');
          $table->integer('category_id');
          $table->string('name');
          $table->string('lastname');
          $table->string('address');
          $table->string('email');
          $table->string('cell_phone');
          $table->dateTime('pick_up_date');
          $table->dateTime('drop_off_date');
          $table->string('total_cost');
          $table->boolean('paid');
          $table->dateTime('paid_at');
          $table->string('discount');
          $table->boolean('canceled');
          $table->dateTime('canceled_at');
          $table->string('refound_percentage');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
