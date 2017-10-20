<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'phone' => '0598569530',
                'api_token' => str_random(60),
                'status' => 'active',
                'type' => 'admin',
                'created_at' => '2017-10-19',
            ],
        ]);
    }
}
