<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'teppei',
                'email' => 'teppei@com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'hayato',
                'email' => 'hayato@com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
