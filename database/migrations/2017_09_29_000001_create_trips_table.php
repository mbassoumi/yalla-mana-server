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
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name');
            $table->json('start_point');
            $table->json('end_point');
            $table->boolean('date');
            $table->time('start_time');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedInteger('created_by')->index();
            $table->unsignedInteger('updated_by')->index();
            $table->nullableTimestamps();
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
        Schema::dropIfExists('trips');
    }
}
