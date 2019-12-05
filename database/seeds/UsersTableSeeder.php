<?php

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Éderson Sandre',
            'email' => 'ederson.sandre@gmail.com',
            'password' => bcrypt('phpconference'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Cliente 01',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('phpconference'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
