<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from_city_id');
            $table->unsignedInteger('to_city_id');
            $table->unsignedInteger('seats_number')->nullable();
            $table->dateTime('date');
            $table->double('price');
            $table->json('attributes')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->enum('status', ['offered', 'requested']);
            $table->unsignedInteger('created_by')->index();
            $table->unsignedInteger('updated_by')->index();
            $table->nullableTimestamps();
            $table->softDeletes();



            $table->foreign('from_city_id')->references('id')->on('cities');
            $table->foreign('to_city_id')->references('id')->on('cities');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
