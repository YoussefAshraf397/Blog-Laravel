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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Youssef Admin' ,
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => now()

        ]);
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Youssef Editor' ,
            'username' => 'editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('password'),
            'created_at' => now()

        ]);
    }
}
