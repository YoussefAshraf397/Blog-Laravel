<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Frame Work',
            'slug' => 'frame_work' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Coding',
            'slug' => 'coding' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Testing',
            'slug' => 'testing' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Laravel',
            'slug' => 'laravel' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Back End',
            'slug' => 'back_end' ,
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Front End',
            'slug' => 'front_end' ,
            'created_at' => now()
        ]);
    }
}
