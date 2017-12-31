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
            $table->string('email')->default('')->nullable();
            $table->string('phone',250)->unique();
            $table->string('api_token', 60)->nullable()->unique();
            $table->string('photo', 500)->default("https://storage.googleapis.com/yalla-mana.appspot.com/unknown_user.jpg");
            $table->enum('status', [ 'active', 'suspended'])->default('active');
            $table->enum('type', [ 'admin', 'driver', 'rider'])->default('rider');
            $table->enum('gender', [ 'male', 'female']);
            $table->string('driver_licence')->nullable();
            $table->json('attributes')->nullable();
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
