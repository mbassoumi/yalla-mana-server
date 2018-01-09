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
                'api_token' => '123123',
                'email' => 'mbbassoumi@gmail.com',
                'status' => 'active',
                'type' => 'admin',
                'created_at' => '2017-10-19',
            ],
        ]);
    }
}
