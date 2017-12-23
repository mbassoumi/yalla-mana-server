<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->default('');
            $table->string('phone')->unique();
            $table->string('api_token', 60)->nullable()->unique();
            $table->string('photo', 500)->nullable();
            $table->enum('status', [ 'active', 'suspended'])->default('active');
            $table->enum('type', [ 'admin', 'driver', 'rider'])->default('rider');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
