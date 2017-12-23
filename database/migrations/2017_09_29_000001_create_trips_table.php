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
            $table->string('name');
            $table->json('start_point');
            $table->json('end_point');
            $table->date('date');
            $table->time('start_time');
            $table->json('attributes')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->unsignedInteger('created_by')->index();
            $table->unsignedInteger('updated_by')->index();
            $table->unsignedInteger('driver_id')->nullable();
            $table->double('price')->nullable();
            $table->enum('status', ['offered', 'requested'])->default('offered');
            $table->nullableTimestamps();
            $table->softDeletes();



            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('users');

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
