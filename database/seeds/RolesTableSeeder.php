<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            'name' => 'Admin' ,
            'slug' => 'admin' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            'name' => 'Editor' ,
            'slug' => 'editor' ,
            'created_at' => now()
        ]);

    }
}
